@extends('layouts.app')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            <a href="{{ route('peliculas.create') }}" type="button" class="btn btn-white btn-custom waves-effect waves-light">
                <span class="btn-label">
                    <i class="fa fa-plus"></i>
                </span>Agregar película
            </a>
        </div>

        <h4 class="page-title">Películas</h4>
        <p class="text-muted page-title-alt">Menú / Películas</p>
    </div>
</div>

<div class="card-box table-responsive">
    <!-- <h4 class="m-t-0 header-title"><b>Películas en inventario</b></h4>
    <p class="text-muted font-13 m-b-30">
        En la siguiente tabla se muestran las tablas que se tienen en inventario
    </p> -->

    <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                    
                    <thead>
                        <tr role="row">
                            <th style="width: 300px;">Título</th>
                            <th style="width: 110px;">Precio renta</th>
                            <th style="width: 110px;">Precio venta</th>
                            <th style="width: 50px;">Categoría</th>
                            <th style="width: 50px;">Género</th>
                            <th style="width: 130px">Ver descripción</th>
                            <th style="width: 50px;">Editar</th>
                            <th style="width: 50px;">Eliminar</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @php setlocale(LC_MONETARY, 'en_US.UTF-8'); @endphp
                        @foreach($peliculas as $pelicula)
                            @php
                                $renta = $pelicula->precio_renta;
                                $venta = $pelicula->precio_venta;
                            @endphp
                            <tr>
                                <td>{{ $pelicula->titulo }}</td>
                                <td>@php echo money_format('%.2n', $renta); @endphp</td>
                                <td>@php echo money_format('%.2n', $venta); @endphp</td>
                                <td align="center">{{ $pelicula->categoria->nombre }}</td>
                                <td>{{ $pelicula->genero->nombre }}</td>
                                <td align="center">
                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-inverse see" data-toggle="modal"
                                        data-target="#see" data-descripcion="{{ $pelicula->descripcion }}" data-title="{{ $pelicula->titulo }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td align="center">
                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-primary update" data-toggle="modal"
                                        data-target="#updatePelicula" data-url="{{ route('peliculas.update', $pelicula->id) }}" data-pelicula="{{ $pelicula }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td align="center">
                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-danger delete" data-toggle="modal"
                                        data-target="#deleteConfirm" data-url="{{ route('peliculas.destroy', $pelicula->id) }}">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Mostrando {{ $peliculas->count() }} de 10 registros</div>
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

    @include('modals.deleteConfirmModal')
    @include('modals.updatePelicula')

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
                var pelicula = $(this).data('pelicula');
                $('#formUpdate').attr('action', url);
                $('#titulo').val(pelicula.titulo);
                $('#precio_renta').val(pelicula.precio_renta);
                $('#precio_venta').val(pelicula.precio_venta);
                $('#categoria').val(pelicula.categoria_id);
                $('#genero').val(pelicula.genero_id);
                $('#descripcion2').val(pelicula.descripcion);
            });

            $('.see').click(function() {
                var title = $(this).data('title');
                var descripcion = $(this).data('descripcion');
                $('#title').text(title);
                $('#descripcion').text(descripcion);
            });
        });
    </script>
@endsection