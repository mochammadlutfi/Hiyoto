<?php

/* ----------------------- Admin Routes START -------------------------------- */

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::namespace('Auth')->group(function(){

        //Login Routes
        Route::get('/','LoginController@showLoginForm');
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        // Route::get('/register','RegisterController@showRegistrationForm')->name('register');
        // Route::post('/register','RegisterController@register');

        // //Forgot Password Routes
        // Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        // Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        // //Reset Password Routes
        // Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        // Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // // Email Verification Route(s)
        // Route::get('email/verify','VerificationController@show')->name('verification.notice');
        // Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
        // Route::get('email/resend','VerificationController@resend')->name('verification.resend');

    });

    Route::get('/beranda','BerandaController@index')->name('beranda');

    Route::prefix('kunjungan')->name('kunjungan.')->group(function(){

        Route::get('/riwayat','KunjunganController@riwayat')->name('riwayat');
        Route::get('/detail/{id}','KunjunganController@detail')->name('detail');
        Route::get('/jadwal','KunjunganController@jadwal')->name('jadwal');

        Route::prefix('pengajuan')->group(function(){
            Route::get('/','PengajuanKunjunganController@index')->name('pengajuan');
            Route::get('/terima/{id}','PengajuanKunjunganController@terima')->name('pengajuan_terima');
            Route::post('/tolak','PengajuanKunjunganController@tolak')->name('pengajuan_tolak');
        });

    });

    Route::group(['prefix' => 'pengelola'], function () {
        Route::get('/','AdminController@index')->name('pengelola');
        Route::get('/tambah','AdminController@tambah')->name('pengelola.tambah');
        Route::post('/simpan','AdminController@simpan')->name('pengelola.simpan');
        Route::get('/edit/{id}','AdminController@edit')->name('pengelola.edit');
        Route::post('/update','AdminController@update')->name('pengelola.update');
        Route::get('/hapus/{id}','AdminController@hapus')->name('pengelola.hapus');
    });

    Route::group(['prefix' => 'pengguna'], function () {
        Route::get('/','UserController@index')->name('user');
        Route::get('/tambah','UserController@add')->name('user.add');
        Route::post('/simpan','UserController@save')->name('user.save');
        Route::get('/edit/{id}','UserController@edit')->name('user.edit');
        Route::post('/update','UserController@update')->name('user.update');
        Route::get('/delete/{id}','UserController@delete')->name('user.delete');

        Route::group(['prefix' => 'role'], function(){
            Route::get('/', 'UserRoleController@index')->name('userRole');
            Route::get('/tambah', 'UserRoleController@tambah')->name('userRole.tambah');
            Route::post('/simpan','UserRoleController@simpan')->name('userRole.simpan');
            Route::get('/edit/{id}','UserRoleController@edit')->name('userRole.edit');
            Route::post('/update','UserRoleController@update')->name('userRole.update');
            Route::get('/hapus/{id}','UserRoleController@hapus')->name('userRole.hapus');
            Route::post('/json','UserRoleController@json')->name('userRole.json');
        });
    });

    Route::group(['prefix' => 'berita'], function(){
        Route::get('/', 'PostController@index')->name('post');
        Route::get('/cek_slug', 'PostController@cek_slug')->name('post.cek_slug');
        Route::get('/tambah', 'PostController@tambah')->name('post.tambah');
        Route::post('/simpan','PostController@simpan')->name('post.simpan');
        Route::get('/edit/{id}','PostController@edit')->name('post.edit');
        Route::post('/update','PostController@update')->name('post.update');
        Route::get('/hapus/{id}','PostController@hapus')->name('post.hapus');
        Route::post('/hapusFile','PostController@hapusFile')->name('post.hapusFile');

        Route::group(['prefix' => 'kategori'], function(){
            Route::get('/', 'PostCategoryController@index')->name('postCategory');
            Route::post('/simpan','PostCategoryController@simpan')->name('postCategory.insert');
            Route::get('/edit/{id}','PostCategoryController@edit')->name('postCategory.edit');
            Route::post('/update','PostCategoryController@update')->name('postCategory.update');
            Route::get('/hapus/{id}','PostCategoryController@delete')->name('postCategory.delete');
            Route::post('/json','PostCategoryController@json')->name('postCategory.json');
        });

    });

    Route::group(['prefix' => 'page'], function(){
        Route::get('/', 'PageController@index')->name('pages');
        Route::get('/tambah', 'PageController@tambah')->name('page.tambah');
        Route::post('/simpan','PageController@simpan')->name('page.simpan');
        Route::get('/edit/{id}','PageController@edit')->name('page.edit');
        Route::post('/update','PageController@update')->name('page.update');
        Route::get('/hapus/{id}','PageController@hapus')->name('page.hapus');
    });

    Route::group(['prefix' => 'produk'], function(){
        Route::get('/', 'ProductController@index')->name('product');
        Route::get('/tambah', 'ProductController@tambah')->name('product.add');
        Route::post('/simpan','ProductController@simpan')->name('product.save');
        Route::get('/edit/{id}','ProductController@edit')->name('product.edit');
        Route::post('/update','ProductController@update')->name('product.update');
        Route::get('/hapus/{id}','ProductController@hapus')->name('product.hapus');

        Route::group(['prefix' => 'kategori'], function(){
            Route::get('/', 'ProductCategoryController@index')->name('productCategory');
            Route::post('/simpan','ProductCategoryController@save')->name('productCategory.save');
            Route::get('/edit/{id}','ProductCategoryController@edit')->name('productCategory.edit');
            Route::post('/update','ProductCategoryController@update')->name('productCategory.update');
            Route::get('/hapus/{id}','ProductCategoryController@hapus')->name('productCategory.hapus');
            Route::post('/json','ProductCategoryController@json')->name('productCategory.json');
            Route::get('/tree','ProductCategoryController@tree')->name('productCategory.tree');
            Route::post('/sub', 'ProductCategoryController@sub')->name('productCategory.sub');
        });
    });

    Route::group(['prefix' => 'kantor-cabang'], function(){
        Route::get('/', 'BranchController@index')->name('branch');
        Route::get('/tambah','BranchController@add')->name('branch.add');
        Route::post('/simpan','BranchController@save')->name('branch.save');
        Route::get('/edit/{id}','BranchController@edit')->name('branch.edit');
        Route::post('/update','BranchController@update')->name('branch.update');
        Route::get('/delete/{id}','BranchController@delete')->name('branch.delete');
    });

    Route::group(['prefix' => 'toko-retail'], function(){
        Route::get('/', 'RetailStoreController@index')->name('store');
        Route::get('/tambah','RetailStoreController@add')->name('store.add');
        Route::post('/simpan','RetailStoreController@save')->name('store.save');
        Route::get('/edit/{id}','RetailStoreController@edit')->name('store.edit');
        Route::post('/update','RetailStoreController@update')->name('store.update');
        Route::get('/delete/{id}','RetailStoreController@delete')->name('store.delete');
    });

    Route::group(['prefix' => 'pengaturan'], function () {
        Route::get('/','PengaturanController@umum')->name('pengaturan');
        Route::match(['get', 'post'], '/umum', 'PengaturanController@umum')->name('pengaturan.umum');
        Route::match(['get', 'post'], '/kontak', 'PengaturanController@kontak')->name('pengaturan.kontak');
        Route::match(['get', 'post'], '/social-media', 'PengaturanController@sosmed')->name('pengaturan.sosmed');
        Route::match(['get', 'post'], '/smtp', 'PengaturanController@smtp')->name('pengaturan.smtp');
    });

    Route::group(['prefix' => 'contact'], function(){
        Route::get('/', 'ContactController@index')->name('contact');
        Route::get('/detail/{id}', 'ContactController@detail')->name('contact.detail');
    });

});

/* ----------------------- Admin Routes END -------------------------------- */
