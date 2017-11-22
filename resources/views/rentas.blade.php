@extends('layouts.app')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            <a href="{{ route('rentas.create') }}" type="button" class="btn btn-white btn-custom waves-effect waves-light">
                <span class="btn-label">
                    <i class="fa fa-plus"></i>
                </span>Agregar renta
            </a>
        </div>

        <h4 class="page-title">Rentas</h4>
        <p class="text-muted page-title-alt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
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
                        	<th style="width: 220px;">Cliente</th>
                            <th style="width: 220px;">Empleado</th>
                            <th style="width: 200px;">Película</th>
                            <th style="width: 50px;">Monto</th>
                            <th style="width: 140px;">Rentado</th>
                            <th style="width: 50px;">¿Entregado?</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @php setlocale(LC_MONETARY, 'en_US.UTF-8'); @endphp
                        @foreach ($rentas as $renta)
                            <tr>
                            	<td> {{ $renta->user->nombreCompleto }} </td>
                                <td> {{ $renta->empleado->nombreCompleto }} </td>
                                <td> {{ $renta->inventario->pelicula->titulo }} </td>
                                <td> {{ money_format('%.2n', $renta->inventario->pelicula->precio_renta) }} </td>
                                <td> {{ $renta->created_at->diffForHumans() }} </td>
                                @if($renta->entregado)
                                    <td align="center">
                                        <a class="btn btn-icon" style="cursor: default;">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </td>
                                @else
                                    <td align="center">
                                        <a href="#" class="btn btn-icon waves-effect waves-light btn-primary delete" data-toggle="modal"
                                            data-target="#deleteConfirm" data-url="{{ route('rentas.destroy', $renta->id) }}" data-title="¿ Seguro que desea entregar ?">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Mostrando 10 de 10 registros</div>
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

</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                var url = $(this).data('url');
                $('#formDelete').attr('action', url);
                $('#title').text($(this).data('title'));
            });
        });
    </script>
@endsection