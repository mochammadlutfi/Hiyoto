<?php

namespace App\Http\Controllers\Umum;

use App\Models\Foto;
use App\Models\Album;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;

class GaleriController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function index()
    {

        $galeri = Album::latest()->orderby('created_at')->paginate(3);

        return view('umum.pages.galeri.index', compact('galeri'));
    }

    public function instagram()
    {
        $title = 'Galeri Foto Instagram';
        return view('umum.pages.galeri.instagram', compact('title'));
    }

    public function video()
    {

        $video = Video::where('status', 1)->latest()->get();
        $title = 'Video Kang Jimmy';

        return view('umum.pages.galeri.video', compact('video', 'title'));
    }

    public function detail($slug, Request $request)
    {
        $album = Album::where('slug', $slug)->first();

        $data = Foto::where('album_id', $album->id)->latest()->paginate(10);
        if ($request->ajax()) {
            $data = Foto::where('album_id', $album->id)->latest()->paginate(4);
            return response()->json([
                'total' => $data->toArray()['total'],
                'html' => view('umum.pages.galeri.data_foto', compact('data'))->render(),
            ]);
            // return response()->json($data);
        }
        $title = $album->nama;
        return view('umum.pages.galeri.detail', compact('album', 'title', 'data'));
    }

    public function watch($slug)
    {
        $video = Video::where('slug', $slug)->first();
        preg_match_all("#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#", $video->url, $matches);
        $yt_id =  $matches[0][0];
        $title = 'Nonton '.$video->judul;
        return view('umum.pages.galeri.watch', compact('video', 'title', 'yt_id'));
    }


}
