<ul class="nav-main">
    <li>
        <a class="{{ Request::is('admin/beranda') ? 'active' : null }}" href="{{ route('admin.beranda') }}">
            <i class="si si-cup"></i>
            <span class="sidebar-mini-hide">Beranda</span>
        </a>
    </li>
    <li class="{{ Request::is('admin/berita/*', 'admin/berita') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-flag"></i>
            <span class="sidebar-mini-hide">Berita</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/berita/tambah') ? 'active' : null}}"
                    href="{{ route('admin.post.tambah') }}">Tambah Berita Baru</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/berita') ? 'active' : null}}"
                    href="{{ route('admin.post') }}">Kelola Berita</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/berita/kategori') ? 'active' : null}}"
                    href="{{ route('admin.postCategory') }}">Kategori</a>
            </li>
        </ul>
    </li>
    <li class="{{ Request::is('admin/page', 'admin/page/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-docs"></i>
            <span class="sidebar-mini-hide">Halaman</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/page/tambah') ? 'active' : null }}" href="{{ route('admin.page.tambah') }}">Tambah Halaman Baru</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/page', 'admin/page/*') ? 'active' : null}}"
                    href="{{ route('admin.pages') }}">Kelola Halaman</a>
            </li>
        </ul>
    </li>
    <li class="{{ Request::is('admin/produk', 'admin/produk/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-basket-loaded"></i>
            <span class="sidebar-mini-hide">Produk</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/produk/tambah') ? 'active' : null }}" 
                href="{{ route('admin.product.add') }}">Tambah Produk Baru</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/produk') ? 'active' : null}}"
                    href="{{ route('admin.product') }}">Daftar Produk</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/produk/kategori') ? 'active' : null}}"
                    href="{{ route('admin.productCategory') }}">Kategori</a>
            </li>
        </ul>
    </li>
    
    <li class="{{ Request::is('admin/kantor-cabang', 'admin/kantor-cabang/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="fa fa-building"></i>
            <span class="sidebar-mini-hide">Kantor Cabang</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/kantor-cabang/tambah') ? 'active' : null }}" 
                href="{{ route('admin.branch.add') }}">Tambah Kantor Cabang</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/kantor-cabang') ? 'active' : null}}"
                    href="{{ route('admin.branch') }}">Daftar Kantor Cabang</a>
            </li>
        </ul>
    </li>

    <li class="{{ Request::is('admin/toko-retail', 'admin/toko-retail/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="fa fa-store"></i>
            <span class="sidebar-mini-hide">Toko Retail</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/toko-retail/tambah') ? 'active' : null }}" 
                href="{{ route('admin.store.add') }}">Tambah Toko Retail</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/toko-retail') ? 'active' : null}}"
                    href="{{ route('admin.store') }}">Daftar Toko Retail</a>
            </li>
        </ul>
    </li>

    <li class="{{ Request::is('admin/pengguna', 'admin/pengguna/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-user"></i>
            <span class="sidebar-mini-hide">Pengguna</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/pengguna/tambah') ? 'active' : null }}" 
                href="{{ route('admin.user.add') }}">Tambah Pengguna</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/pengguna') ? 'active' : null}}"
                    href="{{ route('admin.user') }}">Daftar Pengguna</a>
            </li>
        </ul>
    </li>

    <li>
        <a class="{{ Request::is('admin/pengaturan/*', 'admin/pengaturan') ? 'open' : null }}" href="{{ route('admin.pengaturan.umum') }}">
            <i class="fa fa-cogs"></i><span class="sidebar-mini-hide">Pengaturan</span>
        </a>
    </li>

    <li>
        <a class="{{ Request::is('admin/contact/*', 'admin/contact') ? 'open' : null }}" href="{{ route('admin.contact') }}">
            <i class="si si-envelope"></i><span class="sidebar-mini-hide">Contact</span>
        </a>
    </li>
</ul>
