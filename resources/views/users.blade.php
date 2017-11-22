@extends('layouts.app')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            <a href="{{ route('users.create') }}" type="button" class="btn btn-white btn-custom waves-effect waves-light">
                <span class="btn-label">
                    <i class="fa fa-plus"></i>
                </span>Agregar usuario
            </a>
        </div>

        <h4 class="page-title">Usuarios</h4>
        <p class="text-muted page-title-alt">Panel de administración de usuarios!!</p>
    </div>
</div>

<div class="card-box table-responsive">
    <h4 class="m-t-0 header-title"><b>Default Example</b></h4>
    <p class="text-muted font-13 m-b-30">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    </p>

    <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                    
                    <thead>
                        <tr role="row">
                            <th style="width: 250px;">Nombre</th>
                            <th style="width: 200px;">Email</th>
                            <th style="width: 100px;">Teléfono</th>
                            <th style="width: 100px;">Rol</th>
                            <th style="width: 50px;">Editar</th>
                            <th style="width: 50px;">Eliminar</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->nombreCompleto }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->telefono ?? '----' }}</td>
                                <td>{{ $user->rol->nombre }}</td>
                                <td align="center">
                                    <button class="btn btn-icon waves-effect waves-light btn-primary update"
                                        data-toggle="modal" data-target="#updateUser" data-url="{{ route('users.update', $user->id) }}" data-user="{{ $user }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                                <td align="center">
                                    <button class="btn btn-icon waves-effect waves-light btn-danger delete"
                                        data-toggle="modal" data-target="#deleteConfirm" data-url="{{ route('users.destroy', $user->id) }}">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        @include('modals.deleteConfirmModal')
        @include('modals.updateUser')

        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Mostrando 10 de {{ $users->count() }} registros</div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="datatable_previous">
                            <a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link black">Previous</a>
                        </li>
                        <li class="paginate_button page-item active">
                            <a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link black">1</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0" class="page-link black">2</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0" class="page-link black">3</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0" class="page-link black">4</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0" class="page-link black">5</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0" class="page-link black">6</a>
                        </li>
                        <li class="paginate_button page-item next" id="datatable_next">
                            <a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0" class="page-link black">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    
    </div>
</div>
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
                var user = $(this).data('user');
                $('#formUpdate').attr('action', url);
                $('#nombres').val(user.nombres);
                $('#paterno').val(user.paterno);
                $('#materno').val(user.materno);
                $('#email').val(user.email);
                $('#telefono').val(user.telefono);
                $('#direccion').val(user.direccion);
            });
        });
    </script>
@endsection