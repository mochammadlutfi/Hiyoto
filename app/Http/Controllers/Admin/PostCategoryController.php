<?php

namespace App\Http\Controllers\Admin;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class PostCategoryController extends Controller
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
     * Menampilkan Index Kategori
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PostCategory::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('total', function($row){
                        return  $row->post()->count();
                })
                ->addColumn('action', function($row){

                    $btn = '<center><div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                <a class="dropdown-item" href="javascript:void(0)" onClick="edit('. $row->id .')">
                                    <i class="si si-note mr-5"></i>Ubah
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" onClick="hapus('. $row->id .')">
                                    <i class="si si-trash mr-5"></i>Hapus
                                </a>
                            </div>
                        </div></center>';

                    return $btn;
                })
                ->rawColumns(['action', 'total'])
                ->make(true);
        }
        return view('admin.post.kategori');

    }

    public function simpan(Request $request)
    {

        $rules = [
            'title' => 'required',
            'en_title' => 'required',
        ];

        $pesan = [
            'title.required' => 'Judul Kategori Wajib Diisi!',
            'en_title.required' => 'Category Title Must Be Filled!',
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

                $data = new PostCategory();
                $data->translateOrNew('id')->title = $request->input('title');
                $data->translateOrNew('en')->title = $request->input('en_title');
                $data->translateOrNew('id')->title = $request->input('description');
                $data->translateOrNew('en')->title = $request->input('en_description');
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
                'pesan' => 'Kategori Baru Berhasil Ditambahkan!'
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
            'title.required' => 'Judul Kategori Wajib Diisi!',
            'en_title.required' => 'Category Title Must Be Filled!',
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
                $data = [
                    'id' => [
                        'title'       => $request->input('title'),
                        'description' => $request->input('description')
                    ],
                    'en' => [
                        'title'       => $request->input('en_title'),
                        'description' => $request->input('en_description')
                    ],
                 ];
                 $category = PostCategory::findOrFail($request->input('id'));
                 $category->update($data);
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
                'pesan' => 'Kategori Berhasil Diperbaharui!'
            ]);
        }
    }

    public function edit($id){
        $data = PostCategory::findOrFail($id);
        return response()->json([
            'id' => $data->id,
            'title' => $data->translate('id')->title,
            'description' => $data->translate('id')->description,
            'en_title' => $data->translate('en')->title,
            'en_description' => $data->translate('en')->description,
        ]);
    }

    public function hapus($id)
    {
        $data = PostCategory::destroy($id);
        if($data){
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function json(Request $request)
    {
        if(!isset($request->searchTerm)){
            $fetchData = PostCategory::orderBy('created_at', 'DESC')->get();
        }else{
            $cari = $request->searchTerm;
            $fetchData = PostCategory::where('title','LIKE',  '%' . $cari .'%')->orderBy('created_at', 'DESC')->get();
        }

        $data = array();
        foreach($fetchData as $row) {
            $data[] = array("id" =>$row->id, "text" => $row->title);
        }

        return response()->json($data);
    }
}
