<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Netflics - Login</title>

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
                    <h4 class="text-center"><strong class="text-custom">Netflics</strong></h4>
                </div>

                <div class="p-20">
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-12">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <div class="checkbox checkbox-primary">
                                    <input name="remember" id="checkbox-signup" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="checkbox-signup">
                                        Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-12">
                                <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                                        type="submit">Entrar
                                </button>
                            </div>
                        </div>

                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-12">
                                <a href="{{ route('password.request') }}" class="text-dark">
                                    <i class="fa fa-lock m-r-5"></i>
                                    ¿ Olvidaste tu contraseña ?
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>¿ Aún no tienes cuenta ? <a href="{{ route('register') }}" class="text-primary m-l-5"><b>Registrate</b></a>
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
</html>