<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Morris Chart CSS -->
    <link href="{{ asset('plugins/morris/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{ asset('css/customstyle.css') }}" rel="stylesheet">

    <!-- Toastr Notifications -->
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">

</head>
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{ route('home') }}" class="logo"><span>N<i class="md md-explicit"></i>tflics</span></a>
                        <!-- Image Logo here -->
                        <!--<a href="index.html" class="logo">-->
                        <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                        <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                        <!--</a>-->
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="{imagen}" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow">Bienvenido {{ Auth::user()->nombres }}</h5>
                                </div>

                                <!-- item-->
                                <a href="{{ route('perfil') }}" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-account-circle"></i> <span>Perfil</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <i class="zmdi zmdi-power"></i> <span>Salir</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <li class="text-muted menu-title">Menú</li>

                            <li class="has_sub">
                                <a href="{{ route('home') }}" class="waves-effect">
                                    <i class="fa fa-home"></i>
                                    <span>Inicio</span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="{{ route('users.index') }}" class="waves-effect">
                                    <i class="fa fa-user"></i>
                                    <span>Usuarios</span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="{{ route('peliculas.index') }}" class="waves-effect">
                                    <i class="fa fa-film"></i>
                                    <span>Películas</span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="{{ route('generos.index') }}" class="waves-effect">
                                    <i class="fa fa-ticket"></i>
                                    <span>Géneros</span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="{{ route('categorias.index') }}" class="waves-effect">
                                    <i class="fa fa-ticket"></i>
                                    <span>Categorías</span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="{{ route('inventario') }}" class="waves-effect">
                                    <i class="fa fa-cubes"></i>
                                    <span>Inventario</span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="{{ route('ventas.index') }}" class="waves-effect">
                                    <i class="fa fa-money"></i>
                                    <span>Ventas</span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="{{ route('rentas.index') }}" class="waves-effect">
                                    <i class="fa fa-credit-card"></i>
                                    <span>Rentas</span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="{{ route('credenciales.index') }}" class="waves-effect">
                                    <i class="fa fa-vcard"></i>
                                    <span>Credenciales</span>
                                </a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            @if (Session::has('success'))
                <div style="background-color: red;">{{ Session::get('success') }}</div>
            @endif

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">

                        @yield('content')

                    </div>
                </div>
            </div>

            <footer class="footer text-right">
                © 2016 - 2017. Todos los derechos reservados.
            </footer>

        </div>

    <script>
        var resizefunc = [];
    </script>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/modernizr.min.js') }}"></script>

    <!-- jQuery  -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/detect.js') }}"></script>
    <script src="{{ asset('js/fastclick.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>

    <!-- jQuery  -->
    <script src="{{ asset('plugins/moment/moment.js') }}"></script>


    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('plugins/raphael/raphael-min.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

    <!-- Todojs  -->
    <script src="{{ asset('pages/jquery.todo.js') }}"></script>

    <!-- chatjs  -->
    <script src="{{ asset('pages/jquery.chat.js') }}"></script>

    <script src="{{ ('plugins/peity/jquery.peity.min.js') }}"></script>

    <script src="{{ asset('js/jquery.core.js') }}"></script>
    <script src="{{ asset('js/jquery.app.js') }}"></script>

    <script src="{{ asset('pages/jquery.dashboard_2.js') }}"></script>

    <script src="{{ asset('js/toastr.min.js') }}"></script>

    @yield('scripts')

    @include('includes.toastr')
</body>
</html>
