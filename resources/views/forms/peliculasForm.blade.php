@extends('layouts.app')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Películas</h4>
        <p class="text-muted page-title-alt">Película / Agregar Película</p>
    </div>
</div>

<div>
    <div class="card-box">
        <div class="row">
            <div class="col-12">
                <div class="p-20">

                    <form class="form-horizontal" role="form" method="post" action="{{ route('peliculas.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="titulo">Titulo</label>
                            <div class="col-10">
                                <input type="text" name="titulo" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="categoria_id">Categoría</label>
                            <div class="col-4">
                                <select class="form-control" name="categoria_id" style="height: 37px;">
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-2 col-form-label" for="genero_id" style="text-align: center;">Género</label>
                            <div class="col-4">
                                <select class="form-control" name="genero_id" style="height: 37px;">
                                    @foreach($generos as $genero)
                                        <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="copias">N° Copias</label>
                            <div class="col-2">
                                <select class="form-control" name="copias" style="height: 37px;">
                                    <option value="1">Una</option>
                                    <option value="2">Dos</option>
                                    <option value="3">Tres</option>
                                    <option value="4">Cuatro</option>
                                    <option value="5">Cinco</option>
                                </select>
                            </div>
                            <label class="col-2 col-form-label" for="precio_venta" style="text-align: center;">Precio venta</label>
                            <div class="col-2">
                                <input type="text" name="precio_venta" class="form-control">
                            </div>
                            <label class="col-2 col-form-label" for="precio_renta" style="text-align: center;">Precio renta</label>
                            <div class="col-2">
                                <input type="text" name="precio_renta" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="descripcion">Descripción</label>
                            <div class="col-10">
                                <textarea name="descripcion" class="form-control"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default waves-effect waves-light pull-right">Agregar película</button>

                    </form>

                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end card-box -->
</div>
@endsection
