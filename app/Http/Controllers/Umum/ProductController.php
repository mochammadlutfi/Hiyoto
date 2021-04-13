<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use DB;
use App\Models\Product;
use App\Models\ProductCategory;
use LaravelLocalization;

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
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $products = Product::latest()->get();

        $categories = ProductCategory::where('parent_id', NULL)->get();


        return view('umum.product.index', compact('products', 'categories'));
    }


    public function detail($category, $slug)
    {
        $data = Product::where('slug', $slug)->firstOrFail();
        $categori = ProductCategory::whereTranslation('slug', $category)->firstOrFail();
        
        if ($categori->translate()->where('slug', $category)->first()->locale != LaravelLocalization::getCurrentLocale()) {
            return redirect()->route('product.detail', ['category'=> $categori->translate()->slug, 'slug'=> $data->slug]);
        }

        $data->increment('views', 1);
        $data->save();

        return view('umum.product.detail', compact('data'));
    }


    public function category($category)
    {

        $data = ProductCategory::whereTranslation('slug', $category)->withDepth()->firstOrFail();
        if ($data->translate()->where('slug', $category)->first()->locale != LaravelLocalization::getCurrentLocale()) {
            return redirect()->route('product.category', $data->translate()->slug);
        }

        $categories = ProductCategory::where('parent_id',$data->id)->get();
        $id = ProductCategory::defaultOrder()->descendantsAndSelf($data->id)->pluck('id')->toArray();
        // dd($id);
        $products = Product::
        whereIn('category_id',  $id)->orderBy('views', 'ASC')->
        get();

        return view('umum.product.category', compact('data', 'categories', 'products'));
    }
}
