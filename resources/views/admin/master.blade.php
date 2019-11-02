<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/swal.css') }}">
    @yield('css')
    <style>
        .app-header__logo .logo-src {
            background: url('{{ asset("img/logo.png") }}') !important;
            height: 30px;
        }
    </style>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src" style="font-size: 20px">Sunodia</div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        Admin
                                    </div>
                                    {{-- <div class="widget-subheading">
                                        VP People Manager
                                    </div> --}}
                                </div>
                                <div class="widget-content-left ml-3">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="{{ asset('img/man.svg') }}" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ url('/a/ganti-password') }}">Ganti Password</a>
                                            <button type="button" id="btn-logout" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" tabindex="0" class="dropdown-item">Logout</button>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner" style="max-height: calc(100vh - 60px); height: calc(100vh-60px); overflow: auto">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Main</li>
                            <li>
                                <a href="{{ url('a') }}" class="{{ url()->current() == url('/a/dashboard') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-rocket"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('a/registrasi-siswa') }}" class="{{ url()->current() == url('/a/registrasi-siswa') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-rocket"></i> Registrasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('a/highlights') }}" class="{{ url()->current() == url('/a/highlights') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-rocket"></i> Highlights
                                </a>
                            </li>
                            <li class="app-sidebar__heading">Manajemen</li>
                            <li>
                                <a href="{{ url('a/berita') }}">
                                    <i class="metismenu-icon pe-7s-rocket"></i> Berita
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-diamond"></i> Profil Sekolah
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ url('a/visi-misi') }}">
                                            <i class="metismenu-icon"></i> Visi Misi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('a/sejarah') }}">
                                            <i class="metismenu-icon">
                                                </i>Sejarah
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('a/logo') }}">
                                            <i class="metismenu-icon">
                                                </i>Logo
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('a/mars') }}">
                                            <i class="metismenu-icon">
                                                </i>Mars
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('a/galeri') }}">
                                    <i class="metismenu-icon pe-7s-rocket"></i> Galeri
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('a/konfigurasi') }}">
                                    <i class="metismenu-icon pe-7s-rocket"></i> Konfigurasi
                                </a>
                            </li>
                            <li class="app-sidebar__heading">Manajemen Persekolah</li>
                            @foreach([
                                ['TK/KB', 'tk-kb'],
                                ['SD', 'sd'],
                                ['SMP', 'smp'],
                                ['SMA', 'sma']
                            ] as $_)
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-diamond"></i> {{ $_[0] }}
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('a/'.$_[1].'/profil') }}">
                                                <i class="metismenu-icon"></i>Profil
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('a/'.$_[1].'/struktur-organisasi') }}">
                                                <i class="metismenu-icon"></i>Struktur Organisasi
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('a/'.$_[1].'/fasilitas') }}">
                                                <i class="metismenu-icon"></i>Fasilitas
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('a/'.$_[1].'/agenda') }}">
                                                <i class="metismenu-icon"></i>Agenda Sekolah
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('a/'.$_[1].'/berita') }}">
                                                <i class="metismenu-icon"></i>Berita
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('a/'.$_[1].'/prestasi') }}">
                                                <i class="metismenu-icon"></i>Prestasi  
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('a/'.$_[1].'/galeri') }}">
                                                <i class="metismenu-icon"></i>Galeri  
                                            </a>
                                        </li>
                                    </ul>
                                </li>   
                            @endforeach                                
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('content')
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                                Footer Link 1
                                            </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                                Footer Link 2
                                            </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="app-footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                                Footer Link 3
                                            </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <div class="badge badge-success mr-1 ml-0">
                                                <small>NEW</small>
                                            </div>
                                            Footer Link 4
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    @yield('extra')
    <script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    @yield('js')
</body>

</html>