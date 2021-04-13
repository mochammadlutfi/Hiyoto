(function () {

    var laroute = (function () {

        var routes = {

            absolute: true,
            rootUrl: 'http://localhost/hiyoto',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/open","name":"debugbar.openhandler","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@handle"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/clockwork\/{id}","name":"debugbar.clockwork","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@clockwork"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/telescope\/{id}","name":"debugbar.telescope","action":"Barryvdh\Debugbar\Controllers\TelescopeController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/stylesheets","name":"debugbar.assets.css","action":"Barryvdh\Debugbar\Controllers\AssetController@css"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/javascript","name":"debugbar.assets.js","action":"Barryvdh\Debugbar\Controllers\AssetController@js"},{"host":null,"methods":["DELETE"],"uri":"_debugbar\/cache\/{key}\/{tags?}","name":"debugbar.cache.delete","action":"Barryvdh\Debugbar\Controllers\CacheController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"arrilot\/load-widget","name":null,"action":"Arrilot\Widgets\Controllers\WidgetController@showWidget"},{"host":null,"methods":["GET","HEAD"],"uri":"midia\/open\/{editor?}","name":"midia.open","action":"Itskodinger\Midia\Controller\MidiaController@open"},{"host":null,"methods":["GET","HEAD"],"uri":"midia\/get\/{limit?}","name":"midia.get","action":"Itskodinger\Midia\Controller\MidiaController@index"},{"host":null,"methods":["DELETE"],"uri":"midia\/{file}\/delete","name":"midia.delete","action":"Itskodinger\Midia\Controller\MidiaController@delete"},{"host":null,"methods":["PUT"],"uri":"midia\/{file}\/rename","name":"midia.rename","action":"Itskodinger\Midia\Controller\MidiaController@rename"},{"host":null,"methods":["POST"],"uri":"midia\/upload","name":"midia.upload","action":"Itskodinger\Midia\Controller\MidiaController@upload"},{"host":null,"methods":["GET","HEAD"],"uri":"media\/{filename}","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin.","action":"App\Http\Controllers\Admin\Auth\LoginController@showLoginForm"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/login","name":"admin.login","action":"App\Http\Controllers\Admin\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"admin\/login","name":"admin.","action":"App\Http\Controllers\Admin\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"admin\/logout","name":"admin.logout","action":"App\Http\Controllers\Admin\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/beranda","name":"admin.beranda","action":"App\Http\Controllers\Admin\BerandaController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kunjungan\/riwayat","name":"admin.kunjungan.riwayat","action":"App\Http\Controllers\Admin\KunjunganController@riwayat"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kunjungan\/detail\/{id}","name":"admin.kunjungan.detail","action":"App\Http\Controllers\Admin\KunjunganController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kunjungan\/jadwal","name":"admin.kunjungan.jadwal","action":"App\Http\Controllers\Admin\KunjunganController@jadwal"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kunjungan\/pengajuan","name":"admin.kunjungan.pengajuan","action":"App\Http\Controllers\Admin\PengajuanKunjunganController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kunjungan\/pengajuan\/terima\/{id}","name":"admin.kunjungan.pengajuan_terima","action":"App\Http\Controllers\Admin\PengajuanKunjunganController@terima"},{"host":null,"methods":["POST"],"uri":"admin\/kunjungan\/pengajuan\/tolak","name":"admin.kunjungan.pengajuan_tolak","action":"App\Http\Controllers\Admin\PengajuanKunjunganController@tolak"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengelola","name":"admin.pengelola","action":"App\Http\Controllers\Admin\AdminController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengelola\/tambah","name":"admin.pengelola.tambah","action":"App\Http\Controllers\Admin\AdminController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/pengelola\/simpan","name":"admin.pengelola.simpan","action":"App\Http\Controllers\Admin\AdminController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengelola\/edit\/{id}","name":"admin.pengelola.edit","action":"App\Http\Controllers\Admin\AdminController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/pengelola\/update","name":"admin.pengelola.update","action":"App\Http\Controllers\Admin\AdminController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengelola\/hapus\/{id}","name":"admin.pengelola.hapus","action":"App\Http\Controllers\Admin\AdminController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengguna","name":"admin.user","action":"App\Http\Controllers\Admin\UserController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengguna\/tambah","name":"admin.user.add","action":"App\Http\Controllers\Admin\UserController@add"},{"host":null,"methods":["POST"],"uri":"admin\/pengguna\/simpan","name":"admin.user.save","action":"App\Http\Controllers\Admin\UserController@save"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengguna\/edit\/{id}","name":"admin.user.edit","action":"App\Http\Controllers\Admin\UserController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/pengguna\/update","name":"admin.user.update","action":"App\Http\Controllers\Admin\UserController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengguna\/delete\/{id}","name":"admin.user.delete","action":"App\Http\Controllers\Admin\UserController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengguna\/role","name":"admin.userRole","action":"App\Http\Controllers\Admin\UserRoleController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengguna\/role\/tambah","name":"admin.userRole.tambah","action":"App\Http\Controllers\Admin\UserRoleController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/pengguna\/role\/simpan","name":"admin.userRole.simpan","action":"App\Http\Controllers\Admin\UserRoleController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengguna\/role\/edit\/{id}","name":"admin.userRole.edit","action":"App\Http\Controllers\Admin\UserRoleController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/pengguna\/role\/update","name":"admin.userRole.update","action":"App\Http\Controllers\Admin\UserRoleController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengguna\/role\/hapus\/{id}","name":"admin.userRole.hapus","action":"App\Http\Controllers\Admin\UserRoleController@hapus"},{"host":null,"methods":["POST"],"uri":"admin\/pengguna\/role\/json","name":"admin.userRole.json","action":"App\Http\Controllers\Admin\UserRoleController@json"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita","name":"admin.post","action":"App\Http\Controllers\Admin\PostController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/cek_slug","name":"admin.post.cek_slug","action":"App\Http\Controllers\Admin\PostController@cek_slug"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/tambah","name":"admin.post.tambah","action":"App\Http\Controllers\Admin\PostController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/berita\/simpan","name":"admin.post.simpan","action":"App\Http\Controllers\Admin\PostController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/edit\/{id}","name":"admin.post.edit","action":"App\Http\Controllers\Admin\PostController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/berita\/update","name":"admin.post.update","action":"App\Http\Controllers\Admin\PostController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/hapus\/{id}","name":"admin.post.hapus","action":"App\Http\Controllers\Admin\PostController@hapus"},{"host":null,"methods":["POST"],"uri":"admin\/berita\/hapusFile","name":"admin.post.hapusFile","action":"App\Http\Controllers\Admin\PostController@hapusFile"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/kategori","name":"admin.postCategory","action":"App\Http\Controllers\Admin\PostCategoryController@index"},{"host":null,"methods":["POST"],"uri":"admin\/berita\/kategori\/simpan","name":"admin.postCategory.insert","action":"App\Http\Controllers\Admin\PostCategoryController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/kategori\/edit\/{id}","name":"admin.postCategory.edit","action":"App\Http\Controllers\Admin\PostCategoryController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/berita\/kategori\/update","name":"admin.postCategory.update","action":"App\Http\Controllers\Admin\PostCategoryController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/berita\/kategori\/hapus\/{id}","name":"admin.postCategory.delete","action":"App\Http\Controllers\Admin\PostCategoryController@delete"},{"host":null,"methods":["POST"],"uri":"admin\/berita\/kategori\/json","name":"admin.postCategory.json","action":"App\Http\Controllers\Admin\PostCategoryController@json"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/page","name":"admin.pages","action":"App\Http\Controllers\Admin\PageController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/page\/tambah","name":"admin.page.tambah","action":"App\Http\Controllers\Admin\PageController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/page\/simpan","name":"admin.page.simpan","action":"App\Http\Controllers\Admin\PageController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/page\/edit\/{id}","name":"admin.page.edit","action":"App\Http\Controllers\Admin\PageController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/page\/update","name":"admin.page.update","action":"App\Http\Controllers\Admin\PageController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/page\/hapus\/{id}","name":"admin.page.hapus","action":"App\Http\Controllers\Admin\PageController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk","name":"admin.product","action":"App\Http\Controllers\Admin\ProductController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/tambah","name":"admin.product.add","action":"App\Http\Controllers\Admin\ProductController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/simpan","name":"admin.product.save","action":"App\Http\Controllers\Admin\ProductController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/edit\/{id}","name":"admin.product.edit","action":"App\Http\Controllers\Admin\ProductController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/update","name":"admin.product.update","action":"App\Http\Controllers\Admin\ProductController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/hapus\/{id}","name":"admin.product.hapus","action":"App\Http\Controllers\Admin\ProductController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/kategori","name":"admin.productCategory","action":"App\Http\Controllers\Admin\ProductCategoryController@index"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/kategori\/simpan","name":"admin.productCategory.save","action":"App\Http\Controllers\Admin\ProductCategoryController@save"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/kategori\/edit\/{id}","name":"admin.productCategory.edit","action":"App\Http\Controllers\Admin\ProductCategoryController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/kategori\/update","name":"admin.productCategory.update","action":"App\Http\Controllers\Admin\ProductCategoryController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/kategori\/hapus\/{id}","name":"admin.productCategory.hapus","action":"App\Http\Controllers\Admin\ProductCategoryController@hapus"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/kategori\/json","name":"admin.productCategory.json","action":"App\Http\Controllers\Admin\ProductCategoryController@json"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/kategori\/tree","name":"admin.productCategory.tree","action":"App\Http\Controllers\Admin\ProductCategoryController@tree"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/kategori\/sub","name":"admin.productCategory.sub","action":"App\Http\Controllers\Admin\ProductCategoryController@sub"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kantor-cabang","name":"admin.branch","action":"App\Http\Controllers\Admin\BranchController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kantor-cabang\/tambah","name":"admin.branch.add","action":"App\Http\Controllers\Admin\BranchController@add"},{"host":null,"methods":["POST"],"uri":"admin\/kantor-cabang\/simpan","name":"admin.branch.save","action":"App\Http\Controllers\Admin\BranchController@save"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kantor-cabang\/edit\/{id}","name":"admin.branch.edit","action":"App\Http\Controllers\Admin\BranchController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/kantor-cabang\/update","name":"admin.branch.update","action":"App\Http\Controllers\Admin\BranchController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kantor-cabang\/delete\/{id}","name":"admin.branch.delete","action":"App\Http\Controllers\Admin\BranchController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/toko-retail","name":"admin.store","action":"App\Http\Controllers\Admin\RetailStoreController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/toko-retail\/tambah","name":"admin.store.add","action":"App\Http\Controllers\Admin\RetailStoreController@add"},{"host":null,"methods":["POST"],"uri":"admin\/toko-retail\/simpan","name":"admin.store.save","action":"App\Http\Controllers\Admin\RetailStoreController@save"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/toko-retail\/edit\/{id}","name":"admin.store.edit","action":"App\Http\Controllers\Admin\RetailStoreController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/toko-retail\/update","name":"admin.store.update","action":"App\Http\Controllers\Admin\RetailStoreController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/toko-retail\/delete\/{id}","name":"admin.store.delete","action":"App\Http\Controllers\Admin\RetailStoreController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/pengaturan","name":"admin.pengaturan","action":"App\Http\Controllers\Admin\PengaturanController@umum"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/pengaturan\/umum","name":"admin.pengaturan.umum","action":"App\Http\Controllers\Admin\PengaturanController@umum"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/pengaturan\/kontak","name":"admin.pengaturan.kontak","action":"App\Http\Controllers\Admin\PengaturanController@kontak"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/pengaturan\/social-media","name":"admin.pengaturan.sosmed","action":"App\Http\Controllers\Admin\PengaturanController@sosmed"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/pengaturan\/smtp","name":"admin.pengaturan.smtp","action":"App\Http\Controllers\Admin\PengaturanController@smtp"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/contact","name":"admin.contact","action":"App\Http\Controllers\Admin\ContactController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/contact\/detail\/{id}","name":"admin.contact.detail","action":"App\Http\Controllers\Admin\ContactController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"coba","name":null,"action":"Closure"},{"host":null,"methods":["POST"],"uri":"daerahSelect","name":"daerahSelect","action":"App\Http\Controllers\Umum\GeneralController@daerahSelect"},{"host":null,"methods":["POST"],"uri":"contact\/send","name":"contact.send","action":"App\Http\Controllers\Umum\ContactController@send"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\Umum\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"tentang-kami\/sambutan-manajemen","name":"about.manajemen","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"tentang-kami\/sejarah-kami","name":"about.history","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"tentang-kami\/visi-dan-misi-kami","name":"about.visimisi","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"tentang-kami\/nilai-kami","name":"about.value","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"tentang-kami\/sertifikasi","name":"about.certification","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"produk","name":"product","action":"App\Http\Controllers\Umum\ProductController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"produk\/{category}","name":"product.category","action":"App\Http\Controllers\Umum\ProductController@category"},{"host":null,"methods":["GET","HEAD"],"uri":"produk\/{category}\/{slug}","name":"product.detail","action":"App\Http\Controllers\Umum\ProductController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"berita","name":"posts","action":"App\Http\Controllers\Umum\PostController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"berita\/{slug}","name":"post.detail","action":"App\Http\Controllers\Umum\PostController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"berita\/kategori\/{slug}","name":"post.category","action":"App\Http\Controllers\Umum\PostController@category"},{"host":null,"methods":["GET","HEAD"],"uri":"jangkauan\/kantor-cabang","name":"branch","action":"App\Http\Controllers\Umum\BranchController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"branch\/data","name":"branch.data","action":"App\Http\Controllers\Umum\BranchController@data"},{"host":null,"methods":["GET","HEAD"],"uri":"jangkauan\/toko-retail","name":"store","action":"App\Http\Controllers\Umum\StoreController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"karir","name":"career","action":"App\Http\Controllers\Umum\CareerController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"retail\/data","name":"store.data","action":"App\Http\Controllers\Umum\StoreController@data"},{"host":null,"methods":["GET","HEAD"],"uri":"proyek","name":"project","action":"App\Http\Controllers\Umum\ProjectController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"hubungi-kami","name":"contact","action":"App\Http\Controllers\Umum\ContactController@index"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

