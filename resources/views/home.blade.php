@extends('layouts.app')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Inicio</h4>
        <p class="text-muted page-title-alt">{{ Auth::user()->nombres }}, bienvenido al panel de administración del videoclub Netflics!!</p>
    </div>
</div>

<div class="row">

    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div class="bg-icon bg-icon-pink pull-left">
                <i class="md md-account-child text-pink"></i>
            </div>
            <div class="text-right">
                <h3 class=""><b class="counter">{{ $total['usuarios'] }}</b></h3>
                <p class="text-muted mb-0">Total Usuarios</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="md md-credit-card text-info"></i>
            </div>
            <div class="text-right">
                <h3 class=""><b class="counter">{{ $total['rentas'] }}</b></h3>
                <p class="text-muted mb-0">Total Rentas</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div class="bg-icon bg-icon-purple pull-left">
                <i class="md md-attach-money text-purple"></i>
            </div>
            <div class="text-right">
                <h3 class=""><b class="counter">{{ $total['ventas'] }}</b></h3>
                <p class="text-muted mb-0">Total Ventas</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div class="bg-icon bg-icon-success pull-left">
                <i class="md md-movie text-success"></i>
            </div>
            <div class="text-right">
                <h3 class=""><b class="counter">{{ $total['peliculas'] }}</b></h3>
                <p class="text-muted mb-0">Total Películas</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>
@endsection
