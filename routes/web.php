<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/coba', function () {
    // dd(Session()->get('applocale'));
    // foreach (config('translatable.locales') as $lang => $language)
    // {
    //     if ($lang != app()->getLocale()){
    //         echo $lang .'--'. $language;
    //     }
    // }
    // return redirect()->back();
});
Route::post('/daerahSelect', 'Umum\GeneralController@daerahSelect')->name('daerahSelect');
Route::post('/contact/send','Umum\ContactController@send')->name('contact.send');

Route::
prefix(LaravelLocalization::setLocale())->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->
namespace('Umum')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');

    Route::get(LaravelLocalization::transRoute('front_menu.slug_management_greeting'), [
        'as' => 'about.manajemen', 
        function () { 
            return view("umum.about.manajemen"); 
        }
    ]);

    Route::get(LaravelLocalization::transRoute('front_menu.slug_our_history'), [
        'as' => 'about.history', 
        function () { 
            return view("umum.about.history"); 
        }
    ]);

    Route::get(LaravelLocalization::transRoute('front_menu.slug_vission_mission'), [
        'as' => 'about.visimisi', 
        function () { 
            return view("umum.about.visimisi"); 
        }
    ]);

    Route::get(LaravelLocalization::transRoute('front_menu.slug_our_value'), [
        'as' => 'about.value', 
        function () { 
            return view("umum.about.value"); 
        }
    ]);

    Route::get(LaravelLocalization::transRoute('front_menu.slug_certification'), [
        'as' => 'about.certification', 
        function () { 
            return view("umum.about.certification"); 
        }
    ]);

    Route::get(LaravelLocalization::transRoute('front_menu.slug_our_product'), 'ProductController@index')->name('product');
    Route::get(LaravelLocalization::transRoute('front_menu.product.category'), 'ProductController@category')->name('product.category');
    Route::get(LaravelLocalization::transRoute('front_menu.product.detail'), 'ProductController@detail')->name('product.detail');

    Route::get(LaravelLocalization::transRoute('front_menu.news.slug'), 'PostController@index')->name('posts');
    Route::get(LaravelLocalization::transRoute('front_menu.news.detail'), 'PostController@detail')->name('post.detail');
    Route::get(LaravelLocalization::transRoute('front_menu.news.category'), 'PostController@category')->name('post.category');


    Route::get(LaravelLocalization::transRoute('front_menu.branch.slug'), 'BranchController@index')->name('branch');
    Route::get('branch/data', 'BranchController@data')->name('branch.data');

    
    Route::get(LaravelLocalization::transRoute('front_menu.retail.slug'), 'StoreController@index')->name('store');


    Route::get(LaravelLocalization::transRoute('front_menu.career.slug'), 'CareerController@index')->name('career');
    Route::get('retail/data', 'StoreController@data')->name('store.data');
    
    Route::group(['prefix' => 'news'], function(){
        // Route::get('/', 'PostController@index')->name('posts');
        // Route::get('/{slug}', 'PostController@detail')->name('post.detail');
    });

    Route::get(LaravelLocalization::transRoute('front_menu.project.slug'), 'ProjectController@index')->name('project');

    Route::get(LaravelLocalization::transRoute('front_menu.slug_contact_us'), 'ContactController@index')->name('contact');
});
