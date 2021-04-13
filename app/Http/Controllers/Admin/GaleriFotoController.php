<?php

namespace App\Http\Controllers\Admin;


use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Image;
use Illuminate\Support\Facades\Storage;

class GaleriFotoController extends Controller
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
    public function index($album_id, Request $request)
    {
        $album = Album::find($album_id);

        if ($request->ajax()) {
            $data = Foto::where('album_id', $album_id)->latest()->paginate(10);

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
                'total' => $data->toArray()['total'],
                'html' => view('admin.galeri.foto.incl.data_foto', compact('data'))->render(),
            ]);
        }

        return view('admin.galeri.foto.form', compact('album'));
    }

    public function tambah(Request $request)
    {
        if($request->hasfile('files'))
        {
            foreach($request->file('files') as $f)
            {
                $name= $f->getClientOriginalName();
                $path = Storage::disk('umum')->put('galeri/foto/'.$request->album_id, $f);
                $file = array(
                    'album_id' => $request->album_id,
                    'path' => 'uploads/'.$path,
                );
                Foto::insert($file);
            }
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function hapus(Request $request)
    {
        // dd($request->all());
        $foto = Foto::find($request->id);
        $cek = Storage::disk('public')->exists($foto->path);
        if($cek)
        {
            Storage::disk('public')->delete($foto->path);
        }
        $hapus_db = Foto::destroy($foto->id);
        if($hapus_db)
        {
            return response()->json([
                'fail' => false,
            ]);
        }
    }
}
