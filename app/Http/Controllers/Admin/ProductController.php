<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;
use App\Helpers\GeneralHelp;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ProductController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Product::with('category')
            ->where('title','LIKE','%'.$request->keyword.'%')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

            return response()->json($data);
        }
        return view('admin.product.index');

    }

    public function tambah()
    {
        $kategori = ProductCategory::where('parent_id', NULL)->get();
        return view('admin.product.form', compact('kategori'));
    }

    public function simpan(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $pesan = [
            'name.required' => 'Nama Produk Wajib Diisi!',
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
                $data = new Product();
                $data->title = $request->name;
                $data->category_id = $request->kategori;
                $data->status = $request->status;
                if(!empty($request->featured_img))
                {

                    $thumbPath = 'product/';
                    $image_parts = explode(";base64,", $request->featured_img);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $thumb = base64_decode($image_parts[1]);
                    $thumbName = $thumbPath . uniqid() .'.'.$image_type;
                    $p = Storage::disk('umum')->put($thumbName, $thumb);
                    $data->image = 'uploads/'.$thumbName;
                }

                if(!empty($request->description)){
                    $data->translateOrNew('id')->description = $this->summernote($request->description);
                }
                if(!empty($request->application)){
                    $data->translateOrNew('id')->application = $this->summernote($request->application);
                }
                if(!empty($request->technical)){
                    $data->translateOrNew('id')->technical = $this->summernote($request->technical);
                }

                if(!empty($request->en_description)){
                    $data->translateOrNew('en')->description = $this->summernote($request->en_description);
                }
                if(!empty($request->en_application)){
                    $data->translateOrNew('en')->application = $this->summernote($request->en_application);
                }
                if(!empty($request->en_technical)){
                    $data->translateOrNew('en')->technical = $this->summernote($request->en_technical);
                }

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

    function summernote($text)
    {
        libxml_use_internal_errors(true);
        $data = new \domdocument();
        $data->loadHtml($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        return $data->savehtml();  
    }

    public function edit($id)
    {
        $data = Product::find($id);
        $kategori = ProductCategory::where('parent_id', null)->get();
        $kategorinya = '';
        // if($data->category->parent_id !== 'null')
        // {
        //     if($data->category->parent->parent){
        //         $kategorinya .= $data->category->parent->parent->title .' > ';
        //     }

        //     if($data->category->parent){
        //         $kategorinya .= $data->category->parent->title .' > ';
        //     }
        // }
        $kategorinya .= $data->category->title;
        $data->kategori_select = $kategorinya;
        // dd($kategorinya);

        return view('admin.product.edit', compact('data', 'kategori'));
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $pesan = [
            'name.required' => 'Nama Produk Wajib Diisi!',
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
                $data = Product::find($request->product_id);
                // $data->title = $request->name;
                // $data->category_id = $request->kategori;
                // $data->status = $request->status;
                
                if(!empty($request->featured_img))
                {
                    $cek = Storage::disk('public')->exists($data->image);
                    if($cek)
                    {
                        Storage::disk('public')->delete($data->image);
                    }

                    $thumbPath = 'product/';
                    $image_parts = explode(";base64,", $request->featured_img);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $thumb = base64_decode($image_parts[1]);
                    $thumbName = $thumbPath . uniqid() .'.'.$image_type;
                    $p = Storage::disk('umum')->put($thumbName, $thumb);
                    $data->image = 'uploads/'.$thumbName;
                }
                

                if(!empty($request->description)){
                    $data->translateOrNew('id')->description = $this->summernote($request->description);
                }
                if(!empty($request->application)){
                    $data->translateOrNew('id')->application = $this->summernote($request->application);
                }
                if(!empty($request->technical)){
                    $data->translateOrNew('id')->technical = $this->summernote($request->technical);
                }

                if(!empty($request->en_description)){
                    $data->translateOrNew('en')->description = $this->summernote($request->en_description);
                }

                if(!empty($request->en_application)){
                    $data->translateOrNew('en')->application = $this->summernote($request->en_application);
                }
                if(!empty($request->en_technical)){
                    $data->translateOrNew('en')->technical = $this->summernote($request->en_technical);
                }

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
    public function hapus($id)
    {
        $post = Post::find($id);
        $cek = Storage::disk('public')->exists($post->featured_img);
        if($cek)
        {
            Storage::disk('public')->delete($post->featured_img);
        }
        $hapus_db = Post::destroy($post->id);
        if($hapus_db)
        {
            return response()->json([
                'fail' => false,
            ]);
        }

    }
}
