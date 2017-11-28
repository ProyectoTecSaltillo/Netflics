@extends('layouts.app')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Géneros</h4>
        <p class="text-muted page-title-alt">Género / Agregar Género</p>
    </div>
</div>

<div>
    <div class="card-box">
        <div class="row">
            <div class="col-12">
                <div class="p-20">

                    <form class="form-horizontal" role="form" method="post" action="{{ route('generos.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="nombre">Nombre</label>
                            <div class="col-10">
                                <input type="text" name="nombre" class="form-control">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default waves-effect waves-light pull-right">Agregar genero</button>

                    </form>

                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end card-box -->
</div>
@endsection
