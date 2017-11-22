<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Netflics - Reset Pwd</title>

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
            <div class=" card-box">
                <div class="panel-heading">
                    <h4 class="text-center"> Reset Password </h4>
                </div>

                <div class="p-20">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="text-center">
                        {{ csrf_field() }}

                        <div class="alert alert-info alert-dismissable">
                            Ingresa tu <b>email</b> y te enviaremos un correo con las instrucciones!
                        </div>

                        <div class="form-group m-b-0 {{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" value="{{ $email or old('email') }}" placeholder="Email" required>

                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-pink w-sm waves-effect waves-light">
                                        Enviar
                                    </button> 
                                </span>
                            </div>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    
                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-12">
                                <a href="{{ route('login') }}" class="text-dark">
                                    <i class="fa fa-arrow-left m-r-5"></i>
                                    Regresar
                                </a>
                            </div>
                        </div>                
    
                    </form>

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