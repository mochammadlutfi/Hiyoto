<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use LaravelLocalization;
use App;

use App\Models\Visitor;
use App\Models\Post;
use App\Models\ProductCategory;
class HomeController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $tracker                 = new Visitor();
        $tracker->page_type      = 1;
        $tracker->url            = \Request::url();
        $tracker->source_url     = \url()->previous();
        $tracker->ip             = \Request()->ip();
        $tracker->agent_browser  = UserAgentBrowser(\Request()->header('User-Agent'));
        $tracker->save();

        $posts = Post::where('status', 1)->orderBy('created_at', 'DESC')->limit(3)->get();
        $categories = ProductCategory::where('parent_id', NULL)->get();

        return view('umum.home', compact('posts', 'categories'));
    }


    public function switchLang($lang)
    {
        \LaravelLocalization::setLocale($lang);
        dd(\Request::route()->getName());
        $url = \LaravelLocalization::getLocalizedURL(App::getLocale(), \URL::previous());
        
        return Redirect::to($url);
    }


}
