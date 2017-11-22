@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-4 col-lg-3">
        <div class="profile-detail card-box">
            <div>
                <a href="" data-toggle="modal" data-target="#perfilFoto">
                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="rounded-circle profile-pic" alt="profile-image"
                    data-toggle="tooltip" data-placement="top" title="<h5>Actualizar foto</h5>" data-html="true">
                </a>

                <p class="text-muted font-13 m-b-30">
                    Miembro desde {{ Auth::user()->created_at->diffForHumans() }}
                </p>

                <hr>

                <h4 class="text-uppercase font-18 font-600">Bio</h4>
                <p class="text-muted font-13 m-b-30">
                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type.
                </p>

                @if (Auth::user()->esAdministrador() || Auth::user()->esEmpleado())
                <hr>

                <ul class="list-inline status-list m-t-20">
                    <li class="list-inline-item">
                        <h3 class="text-primary m-b-5">6</h3>
                        <p class="text-muted">Ventas</p>
                    </li>

                    <li class="list-inline-item">
                        <h3 class="text-success m-b-5">24</h3>
                        <p class="text-muted">Rentas</p>
                    </li>
                </ul>
                @elseif (Auth::user()->esCliente())
                <hr>

                <ul class="list-inline status-list m-t-20">
                    <li class="list-inline-item">
                        <h3 class="text-primary m-b-5">2</h3>
                        <p class="text-muted">Compras</p>
                    </li>

                    <li class="list-inline-item">
                        <h3 class="text-success m-b-5">64</h3>
                        <p class="text-muted">Rentas</p>
                    </li>
                </ul>
                @endif

            </div>

        </div>
    </div>

    @include('modals.updateImageModal')

    <div class="col-md-8 col-lg-9">
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                    <div class="p-20">

                        <form class="form-horizontal" role="form" method="post" action="{{ route('users.update', Auth::user()->id) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="patch">

                            {{-- Form::hidden('_method', 'patch') --}}

                            <div class="form-group row {{ $errors->has('nombres') ? ' has-error' : '' }}">
                                <label class="col-2 col-form-label" for="nombres">Nombres</label>
                                <div class="col-10">
                                    <input type="text" name="nombres" value="{{ Auth::user()->nombres }}" class="form-control">
                                </div>
                                @if ($errors->has('nombres'))
                                <div class="col-2"></div>
                                <span class="help-block col-10">
                                    <strong>{{ $errors->first('nombres') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-2 col-form-label" for="email">Email</label>
                                <div class="col-10">
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" readonly class="form-control">
                                </div>
                                @if ($errors->has('email'))
                                <div class="col-2"></div>
                                <span class="help-block col-10">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-2 col-form-label" for="paterno">Paterno</label>
                                <div class="col-4 {{ $errors->has('paterno') ? ' has-error' : '' }}">
                                    <input type="text" name="paterno" value="{{ Auth::user()->paterno }}" class="form-control">
                                </div>
                                <label class="col-2 col-form-label" for="materno" style="text-align: center;">Materno</label>
                                <div class="col-4 {{ $errors->has('materno') ? ' has-error' : '' }}">
                                    <input type="text" name="materno" value="{{ Auth::user()->materno }}" class="form-control">
                                </div>
                                @if ($errors->has('paterno'))
                                <div class="col-2"></div>
                                <span class="help-block col-10">
                                    <strong>{{ $errors->first('paterno') }}</strong>
                                </span>
                                @endif
                                @if ($errors->has('materno'))
                                <div class="col-8"></div>
                                <span class="help-block col-4">
                                    <strong>{{ $errors->first('materno') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group row {{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label class="col-2 col-form-label" for="telefono">Teléfono</label>
                                <div class="col-10">
                                    <input type="text" name="telefono" value="{{ Auth::user()->telefono }}" class="form-control">
                                </div>
                                @if ($errors->has('telefono'))
                                <div class="col-2"></div>
                                <span class="help-block col-10">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group row {{ $errors->has('direccion') ? ' has-error' : '' }}">
                                <label class="col-2 col-form-label" for="direccion">Dirección</label>
                                <div class="col-10">
                                    <input type="text" name="direccion" value="{{ Auth::user()->direccion }}" class="form-control">
                                </div>
                                @if ($errors->has('direccion'))
                                <div class="col-2"></div>
                                <span class="help-block col-10">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-default waves-effect waves-light pull-right">Actualizar</button>

                        </form>

                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end card-box -->
    </div>
</div>
@endsection