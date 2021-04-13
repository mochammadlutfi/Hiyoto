<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;
use App\Helpers\GeneralHelp;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PostController extends Controller
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
            // dd($request->keyword);

            $keyword = $request->keyword === '' ? '' : $request->keyword;

            $data = Post::with('category')
            ->whereTranslationLike('title', '%'.$keyword.'%')
            ->where('category_id', 'like', '%' . $request->category . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(1);

            return response()->json($data);
        }
        return view('admin.post.index');

    }

    public function tambah()
    {
        return view('admin.post.form');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'title' => 'required',
            'en_title' => 'required',
            'kategori' => 'required',
        ];

        $pesan = [
            'title.required' => 'Judul Berita Wajib Diisi!',
            'en_title.required' => 'News Title Must Be Filled!',
            'kategori.required' => 'Kategori Berita Wajib Diisi!'
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

                $data = new Post();
                if(!empty($request->featured_img))
                {
                    $folderPath = 'post/thumbnail/';
                    $imageName = $folderPath . uniqid() . '.jpg';
                    list($baseType, $image) = explode(';', $request->featured_img);
                    list(, $image) = explode(',', $image);
                    $image = base64_decode($image);
                    $p = Storage::disk('umum')->put($imageName, $image);
                    $data->featured_img = 'uploads/'.$imageName;
                }

                $data->category_id = $request->kategori;
                $data->seo_keyword = $request->seo_keyword;
                $data->seo_description = $request->seo_description;
                $data->seo_tags = $request->seo_tags;
                $data->status = $request->status;
                $data->save();

                libxml_use_internal_errors(true);
                $dom = new \domdocument();
                $dom->loadHtml($request->description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getElementsByTagName('img');

                foreach ($images as $count => $image) {
                    $src = $image->getAttribute('src');
                    if (preg_match('/data:image/', $src)) {
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimeType = $groups['mime'];
                        $path = '/post/images/' . uniqid('', true) . '.' . $mimeType;
                        Storage::disk('umum')->put($path, file_get_contents($src));
                        $image->removeAttribute('src');
                        $image->setAttribute('src', Storage::disk('umum')->url($path));
                    }
                }

                libxml_use_internal_errors(true);
                $dom = new \domdocument();
                $dom->loadHtml($request->description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

                $deskripsi = $dom->savehtml();

                libxml_use_internal_errors(true);
                $en_dom = new \domdocument();
                $en_dom->loadHtml($request->en_description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

                $en_deskripsi = $en_dom->savehtml();
                $data->translateOrNew('id')->title = $request->input('title');
                $data->translateOrNew('id')->description = $deskripsi;
                $data->translateOrNew('en')->title = $request->input('en_title');
                $data->translateOrNew('en')->description = $en_deskripsi;
                $data->save();
                // Post::create($post);

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

    public function edit($id)
    {
        $data = Post::find($id);
        
        return view('admin.post.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'kategori' => 'required',
        ];

        $pesan = [
            'judul.required' => 'Judul Berita Wajib Diisi!',
            'kategori.required' => 'Kategori Berita Wajib Diisi!'
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
                $data = Post::find($request->post_id);
                // dd($request->all());
                if(!empty($request->featured_img))
                {
                    $cek = Storage::disk('public')->exists($data->featured_img);
                    if($cek)
                    {
                        Storage::disk('public')->delete($data->featured_img);
                    }
                    $folderPath = 'post/thumbnail/';
                    $imageName = $folderPath . uniqid() . '.jpg';
                    list($baseType, $image) = explode(';', $request->featured_img);
                    list(, $image) = explode(',', $image);
                    $image = base64_decode($image);
                    $p = Storage::disk('umum')->put($imageName, $image);
                    $data->featured_img = 'uploads/'.$imageName;
                }

                libxml_use_internal_errors(true);
                $dom = new \domdocument();
                $dom->loadHtml($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getElementsByTagName('img');
                foreach ($images as $count => $image) {
                    $src = $image->getAttribute('src');
                    if (preg_match('/data:image/', $src)) {
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimeType = $groups['mime'];
                        $path = '/uploads/post/images/' . uniqid('', true) . '.' . $mimeType;
                        Storage::disk('umum')->put($path, file_get_contents($src));
                        $image->removeAttribute('src');
                        $image->setAttribute('src', Storage::disk('umum')->url($path));
                    }
                }
                $deskripsi = $dom->savehtml();

                $data->judul = $request->judul;
                $data->deskripsi = $deskripsi;
                $data->kategori_id = $request->kategori;
                $data->seo_keyword = $request->seo_keyword;
                $data->seo_description = $request->seo_description;
                $data->seo_tags = $request->seo_tags;
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

    public function hapusFile(Request $request)
    {
        $file_name = str_replace(url('/').'/', '', $request->src);
        $cek = Storage::disk('public')->exists($file_name);
        if($cek)
        {
            $hapus = Storage::disk('public')->delete($file_name);
        }
        $post = Post::find($request->post_id);

        libxml_use_internal_errors(true);
        $dom = new \domdocument();
        $dom->loadHtml($request->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $path = '/post/images/' . uniqid('', true) . '.' . $mimeType;
                Storage::disk('umum')->put($path, file_get_contents($src));
                $image->removeAttribute('src');
                $image->setAttribute('src', Storage::disk('umum')->url($path));
            }
        }
        $post->deskripsi = $dom->savehtml();
        $post->save();

        return response()->json([
            'fail' => false,
        ]);
    }
}
