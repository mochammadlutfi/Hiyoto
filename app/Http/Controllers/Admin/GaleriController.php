<?php

namespace App\Http\Controllers\Admin;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DB;
use Carbon\Carbon;
class GaleriController extends Controller
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
            $data = Album::orderBy('created_at', 'DESC')->paginate(10);

            if($data->toArray()['next_page_url'] == null)
            {
                $next = false;
            }else{
                $next = true;
            }

            if($data->toArray()['prev_page_url'] == null)
            {
                $prev = false;
            }else{
                $prev = true;
            }

            if($data->toArray()['from'] == null)
            {
                $nav = 'Menampilkan Album 0 - 0 Dari 0';
            }else{
                $nav = 'Menampilkan Album '. $data->toArray()['from'] .' - '.$data->toArray()['to'] .' Dari '.$data->toArray()['total'];
            }

            return response()->json([
                'current_page' => $data->toArray()['current_page'],
                'next_page' => $next,
                'prev_page' => $prev,
                'navigasi' => $nav,
                'html' => view('admin.galeri.foto.incl.data', compact('data'))->render(),
            ]);
        }

        return view('admin.galeri.foto.index');
    }


    public function simpan(Request $request)
    {
        // dd($request->all());
        $rules = [
            'nama' => 'required',
            'featured_img' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Album Wajib Diisi!',
            'featured_img.required' => 'Thumbnail Album Wajib Diisi!',
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

                $data = new Album();
                $data->nama = $request->nama;
                $data->deskripsi = $request->deskripsi;


                if(!empty($request->featured_img))
                {
                    $folderPath = 'galeri/thumbnail/';
                    $imageName = $folderPath . uniqid() . '.jpg';
                    list($baseType, $image) = explode(';', $request->featured_img);
                    list(, $image) = explode(',', $image);
                    $image = base64_decode($image);
                    $p = Storage::disk('umum')->put($imageName, $image);
                    $data->foto = 'uploads/'.$imageName;
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
                'id' => $data->id,
            ]);
        }
    }

    public function edit($id){
        $album = Album::find($id);
        return response()->json($album);
    }

    public function update(Request $request)
    {

        $rules = [
            'nama' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Album Wajib Diisi!',
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
                $data = Album::find($request->id);

                if(!empty($request->featured_img))
                {
                    $cek = Storage::disk('public')->exists($data->foto);
                    if($cek)
                    {
                        Storage::disk('public')->delete($data->foto);
                    }

                    $folderPath = 'galeri/thumbnail/';
                    $imageName = $folderPath . uniqid() . '.jpg';
                    list($baseType, $image) = explode(';', $request->featured_img);
                    list(, $image) = explode(',', $image);
                    $image = base64_decode($image);
                    $p = Storage::disk('umum')->put($imageName, $image);
                    $data->foto = 'uploads/'.$imageName;
                }

                $data->nama = $request->nama;
                $data->deskripsi = $request->deskripsi;
                $data->status = $request->status;
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
        DB::beginTransaction();
        try{
            $album = Album::find($id);
            $foto = Foto::where('album_id', $album->id)->get();
            foreach($foto as $f)
            {
                Storage::disk('base')->delete($f->thumbnail);
            }
            $del_album_img = Storage::disk('base')->delete($album->thumbnail);
            Album::destroy($album->id);
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
