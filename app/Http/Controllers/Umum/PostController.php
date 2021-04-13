<?php

namespace App\Http\Controllers\Umum;

use App\Models\Post;
use App\Models\Visitor;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Storage;
use LaravelLocalization;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)->orderby('created_at')->paginate(6);
        return view('umum.pages.post.index', compact('posts'));
    }

    public function detail($slug)
    {
        $post = Post::whereTranslation('slug', $slug)->firstOrFail();
        if ($post->translate()->where('slug', $slug)->first()->locale != LaravelLocalization::getCurrentLocale()) {
            return redirect()->route('post.detail', $post->translate()->slug);
        }

        $post->increment('views', 1);
        $post->save();

        $tracker                 = new Visitor();
        $tracker->page_type      = 2;
        $tracker->slug           = $slug;
        $tracker->url            = \Request::url();
        $tracker->source_url     = \url()->previous();
        $tracker->ip             = \Request()->ip();
        $tracker->agent_browser  = UserAgentBrowser(\Request()->header('User-Agent'));
        $tracker->save();
        
        return view('umum.pages.post.detail', compact('post'));
    }

    public function category($slug)
    {
        $category = PostCategory::whereTranslation('slug', $slug)->firstOrFail();
        if ($category->translate()->where('slug', $slug)->first()->locale != LaravelLocalization::getCurrentLocale()) {
            return redirect()->route('post.category', $category->translate()->slug);
        }

        $posts = Post::where('category_id', $category->id)->orderby('created_at')->paginate(6);
        return view('umum.pages.post.category', compact('posts', 'category'));
    }
}
