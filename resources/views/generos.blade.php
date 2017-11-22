@extends('layouts.app')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
		<div class="btn-group pull-right m-t-15">
            <a href="{{ route('generos.create') }}" type="button" class="btn btn-white btn-custom waves-effect waves-light">
                <span class="btn-label">
                    <i class="fa fa-plus"></i>
                </span>Agregar género
            </a>
        </div>

        <h4 class="page-title">Géneros</h4>
        <p class="text-muted page-title-alt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
</div>

<div class="row">
	@foreach ($generos as $genero)
	    <div class="col-md-6 col-lg-6 col-xl-3">
	        <div class="widget-bg-color-icon card-box fadeInDown animated">
	        	<a href="#" class="pull-right delete" data-toggle="modal" data-target="#deleteConfirm" data-url="{{ route('generos.destroy', $genero->id) }}">
	        		<i class="fa fa-remove"></i>
	        	</a>
	        	<a href="#" class="update" style="margin-left: 90px;" data-toggle="modal" data-target="#updateGenero" data-url="{{ route('generos.update', $genero->id) }}" data-name="{{ $genero->nombre }}">
	        		<i class="fa fa-edit"></i>
	        	</a>
	            <div class="bg-icon bg-icon-info pull-left">
	                <i class="md {{ $genero->icono }} text-info"></i>
	            </div>
	            <div class="text-right">
	                <h3 class=""><b class="counter">{{ $genero->nombre }}</b></h3>
	                <!-- <p class="text-muted mb-0">{{ $genero->nombre }}</p> -->
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>
	@endforeach
</div>

@include('modals.deleteConfirmModal')
@include('modals.updateGenero')

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                var url = $(this).data('url');
                $('#formDelete').attr('action', url);
            });

            $('.update').click(function() {
                var url = $(this).data('url');
                var nombre = $(this).data('name');
                $('#formUpdate').attr('action', url);
                $('#nombre').val(nombre);
            });
        });
    </script>
@endsection