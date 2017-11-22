<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Netflics - Registro</title>

    <!--Morris Chart CSS -->
    <link href="{{ asset('plugins/morris/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="card-box">
                <div class="panel-heading">
                    <h3 class="text-center"><strong class="text-custom">Netflics</strong> </h3>
                </div>

                <div class="p-20">
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-12">
                                <input class="form-control" name="nombres" type="text" value="{{ old('nombres') }}" placeholder="Nombres" required autofocus>
                            </div>

                            @if ($errors->has('nombres'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombres') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-6">
                                <input class="form-control" name="paterno" type="text" value="{{ old('paterno') }}" placeholder="Apellido paterno" required>
                            </div>

                            @if ($errors->has('paterno'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('paterno') }}</strong>
                                </span>
                            @endif

                            <div class="col-6">
                                <input class="form-control" name="materno" type="text" value="{{ old('materno') }}" placeholder="Apellido materno" required>
                            </div>

                            @if ($errors->has('materno'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('materno') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <input class="form-control" name="email" type="email" value="{{ old('email') }}" placeholder="Email" required>
                            </div>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <input class="form-control" name="password" type="password" value="{{ old('password') }}" placeholder="Password" required>
                            </div>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-12">
                                <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">
                                    Registrate
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <p>
                        ¿ Ya tienes cuenta ?<a href="{{ route('login') }}" class="text-primary m-l-5"><b>Entra!</b></a>
                    </p>
                </div>
            </div>

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

    </body>

<!-- Mirrored from coderthemes.com/ubold/dark/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Oct 2017 04:45:27 GMT -->
</html>