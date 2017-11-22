@extends('layouts.app')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            <a href="{{ route('ventas.create') }}" type="button" class="btn btn-white btn-custom waves-effect waves-light">
                <span class="btn-label">
                    <i class="fa fa-plus"></i>
                </span>Agregar venta
            </a>
        </div>

        <h4 class="page-title">Ventas</h4>
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
                            <th style="width: 140px;">Vendido</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @php setlocale(LC_MONETARY, 'en_US.UTF-8'); @endphp
                        @foreach ($ventas as $venta)
                            <tr>
                                <td> {{ $venta->user->nombreCompleto }} </td>
                                <td> {{ $venta->empleado->nombreCompleto }} </td>
                                <td> {{ $venta->inventario->pelicula->titulo }} </td>
                                <td> {{ money_format('%.2n', $venta->inventario->pelicula->precio_venta) }} </td>
                                <td> {{ $venta->created_at->diffForHumans() }} </td>
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
</div>
@endsection
