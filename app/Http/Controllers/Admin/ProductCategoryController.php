<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\ProductCategory;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Storage;
class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        return view('admin.product.category');
    }

    public function save(Request $request)
    {
        $rules = [
            'title' => 'required',
            'en_title' => 'required',
        ];

        $pesan = [
            'title.required' => 'Nama Kategori Wajib Diisi!',
            'en_title.required' => 'Category Name Must Be Filled!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            DB::beginTransaction();
            try{

                    $data = new ProductCategory();
                    $data->parent_id = $request->parent_id;
                    if(!empty($request->thumbnail))
                    {
                        $thumbPath = 'c/thumbnail/';
                        $thumbName = $thumbPath . uniqid() . '.jpg';
                        $image_parts = explode(";base64,", $request->thumbnail);
                        $thumb = base64_decode($image_parts[1]);
                        $p = Storage::disk('umum')->put($thumbName, $thumb);
                        $data->thumbnail = $thumbName;
                    }
                    $data->save();

                $data->translateOrNew('id')->title = $request->input('title');
                $data->translateOrNew('en')->title = $request->input('en_title');
                $data->save();

                ProductCategory::fixTree();
            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $rules = [
            'title' => 'required',
            'en_title' => 'required',
        ];

        $pesan = [
            'title.required' => 'Nama Kategori Wajib Diisi!',
            'en_title.required' => 'Category Name Must Be Filled!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            DB::beginTransaction();
            try{
                $data = ProductCategory::find($request->kategori_id);
                if(!empty($request->thumbnail))
                {
                    $cek = Storage::disk('umum')->exists($data->thumbnail);
                    if($cek)
                    {
                        Storage::disk('umum')->delete($data->thumbnail);
                    }
                    $thumbPath = 'c/thumbnail/';
                    $thumbName = $thumbPath . uniqid() . '.jpg';
                    list($baseType, $thumb) = explode(';', $request->thumbnail);
                    list(, $thumb) = explode(',', $thumb);
                    $thumb = base64_decode($thumb);
                    $p = Storage::disk('umum')->put($thumbName, $thumb);
                    $data->thumbnail = $thumbName;
                }
                $data->translateOrNew('id')->title = $request->input('title');
                $data->translateOrNew('en')->title = $request->input('en_title');
                $data->save();
                
            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function edit($id){
        $data = ProductCategory::find($id);
        $respon = [
            "id" => $data->id,
            "title" => $data->translate('id')->title,
            "en_title" => $data->translate('en')->title,
            "thumbnail" => $data->thumbnail_url,
        ];
        return response()->json($respon);
    }

    public function hapus($id)
    {
        $data = ProductCategory::find($id);
        $cek = Storage::disk('umum')->exists($data->thumbnail);
        if($cek)
        {
            Storage::disk('umum')->delete($data->thumbnail);
        }
        $hapus_db = ProductCategory::destroy($data->id);
        if($hapus_db)
        {
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function tree(Request $request)
    {
        $data = ProductCategory::latest()->get()->toTree();
        $items = $data->map(function ($data) {
            return collect($data->toArray())
                ->only(['id', 'text', 'parent_id', 'children'])
                ->all();
        });
        return response()->json($items);
    
    }

    public function json(Request $request)
    {
        if(!isset($request->searchTerm)){
            $fetchData = Kategori::orderBy('created_at', 'DESC')->get();
          }else{
            $cari = $request->searchTerm;
            $fetchData = Kategori::where('nama','LIKE',  '%' . $cari .'%')->orderBy('created_at', 'DESC')->get();
          }

          $data = array();
          foreach($fetchData as $row) {
            $data[] = array("id" =>$row->id, "text"=>$row->nama);
          }

          return response()->json($data);
    }

    public function sub(Request $request)
    {
        $kategori = ProductCategory::where('parent_id', $request->category_id)->get();
        return response()->json($kategori);
    }

}
