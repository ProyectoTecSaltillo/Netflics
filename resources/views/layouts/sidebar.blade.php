@extends('layouts.app')

@section('sidebar')
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Navigation</li>

                <li class="has_sub">
                    <a href="" class="waves-effect">
                    	<i class="ti-home"></i>
                    	<span>Inicio</span>
                   	</a>
                </li>

                <li class="has_sub">
                    <a href="" class="waves-effect">
                    	<i class="ti-movie"></i>
                    	<span>Películas</span>
                   	</a>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection