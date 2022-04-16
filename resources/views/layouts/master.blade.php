<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SiniKopi Jember</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{asset('main.css')}}" rel="stylesheet">
    <link href="{{asset('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/sweetalert/sweetalert.css')}}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow bg-plum-plate header-text-light">
            <div class="app-header__logo">
                <h5 class="text-light">Peramalan Kopi</h5>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
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
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow bg-plum-plate sidebar-text-light">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
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
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="mt-3">
                                <a href="{{url('/')}}">
                                    <i class="metismenu-icon pe-7s-display1"></i>
                                    Dashboard
                                </a>
                            </li>
                            @if (auth()->user()->role->id === 1 || auth()->user()->role->id === 2 )
                            <li class="">
                                <a href="#" aria-expanded="true">
                                    <i class="metismenu-icon pe-7s-culture"></i>
                                    Manajemen Stok
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul class="mm-collapse" style="">
                                    <li>
                                        <a href="{{url('/bahan-baku')}}">
                                            <i class="metismenu-icon"></i>
                                            Stok Bahan Baku
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/stok')}}">
                                            <i class="metismenu-icon">
                                            </i>Riwayat Stok
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            @if (auth()->user()->role->id === 1 || auth()->user()->role->id === 2 )
                            <li class="">
                                <a href="#" aria-expanded="true">
                                    <i class="metismenu-icon pe-7s-menu"></i>
                                    Manajemen Menu
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul class="mm-collapse" style="">
                                    @if (auth()->user()->role->id === 1 )
                                    <li>
                                        <a href="{{url('/menu')}}">
                                            <i class="metismenu-icon"></i>
                                            Daftar Menu
                                        </a>
                                    </li>
                                    @endif
                                    @if (auth()->user()->role->id === 2 )
                                    <li>
                                        <a href="{{url('/resep')}}">
                                            <i class="metismenu-icon">
                                            </i>Daftar Resep
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                            @endif
                            @if (auth()->user()->role->id === 1 || auth()->user()->role->id === 3 )
                            <li class="">
                                <a href="#" aria-expanded="true">
                                    <i class="metismenu-icon pe-7s-cart"></i>
                                    Penjualan
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul class="mm-collapse" style="">
                                    
                                    <li>
                                        <a href="{{url('/penjualan/kasir')}}">
                                            <i class="metismenu-icon"></i>
                                            Kasir
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/penjualan/riwayat')}}">
                                            <i class="metismenu-icon">
                                            </i>Riwayat Penjualan
                                        </a>
                                    </li>
                                    @if (auth()->user()->role->id === 1 )
                                    <li>
                                        <a href="{{url('/penjualan/transaksi')}}">
                                            <i class="metismenu-icon">
                                            </i>Transaksi Masuk
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                            @endif
                            @if (auth()->user()->role->id === 1 || auth()->user()->role->id === 3 )
                                <li class="">
                                    <a href="#" aria-expanded="true">
                                        <i class="metismenu-icon pe-7s-graph1"></i>
                                        Peramalan
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul class="mm-collapse" style="">
                                        @if (auth()->user()->role->id === 1)
                                        <li>
                                            <a href="{{url('/peramalan')}}">
                                                <i class="metismenu-icon"></i>
                                                Buat Permamalan
                                            </a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="{{url('/peramalan/riwayat')}}">
                                                <i class="metismenu-icon">
                                                </i>Riwayat Peramalan
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if (auth()->user()->role->id === 1)
                            <li class="">
                                <a href="{{url('/user')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>
                                    Users
                                </a>
                            </li>
                            @endif
                            <li class="">
                                <a href="{{url('/user/'. auth()->user()->id)}}">
                                    <i class="metismenu-icon pe-7s-user"></i>
                                    Profile
                                </a>
                            </li>
                            <li class="">
                                <a href="{{url('/logout')}}">
                                    <i class="metismenu-icon pe-7s-angle-left-circle"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
    <script type="text/javascript" src="{{asset('assets/sweetalert/sweetalert.min.js')}}"></script>
    @include('sweetalert::alert')
    <script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script>
    <script src="{{asset('assets/datatables/jquery.min.js')}}"></script>
    <script src="{{asset('assets/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/datatables/datatables-demo.js')}}"></script>
    <script src="{{asset('assets/scripts/jquery.maskMoney.min.js')}}"></script>
    @yield('script')
</body>

</html>