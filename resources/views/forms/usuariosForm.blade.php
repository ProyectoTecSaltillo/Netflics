@extends('layouts.app')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Usuarios</h4>
        <p class="text-muted page-title-alt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
</div>

<div>
    <div class="card-box">
        <div class="row">
            <div class="col-12">
                <div class="p-20">

                    <form class="form-horizontal" role="form" method="post" action="{{ route('users.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Rol de usuario</label>
                            <div class="col-10">
                                <select class="form-control" name="rol" style="height: 37px;">
                                    @foreach($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="nombres">Nombres</label>
                            <div class="col-10">
                                <input type="text" name="nombres" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="email">Email</label>
                            <div class="col-10">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="paterno">Paterno</label>
                            <div class="col-4">
                                <input type="text" name="paterno" class="form-control">
                            </div>
                            <label class="col-2 col-form-label" for="materno" style="text-align: center;">Materno</label>
                            <div class="col-4">
                                <input type="text" name="materno" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="telefono">Teléfono</label>
                            <div class="col-10">
                                <input type="text" name="telefono" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="direccion">Dirección</label>
                            <div class="col-10">
                                <input type="text" name="direccion" class="form-control">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default waves-effect waves-light pull-right">Agregar usuario</button>

                    </form>

                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end card-box -->
</div>
@endsection
