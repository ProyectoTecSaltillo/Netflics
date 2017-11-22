@extends('layouts.app')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Categorias</h4>
        <p class="text-muted page-title-alt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
</div>

<div class="row">
    @foreach ($categorias as $categoria)
    <div class="col-md-6 col-lg-6 col-xl-6">
	    <div class="card m-b-20 card-body text-xs-center">
	        <h4 class="card-title"><strong>{{ $categoria->nombre }}</strong></h4>
	        <p class="card-text">{{ $categoria->descripcion }}</p>
	        <p class="card-text">
	            <small class="text-muted">Ultima actualización {{ $categoria->created_at->diffForHumans() }}</small>
	        </p>
	    </div>
	</div>
	@endforeach
</div>
@endsection
