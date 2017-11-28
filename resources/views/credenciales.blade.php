@extends('layouts.app')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Credenciales</h4>
        <p class="text-muted page-title-alt">Menú / Credenciales</p>
    </div>
</div>

<div class="card-box table-responsive">
    <!-- <h4 class="m-t-0 header-title"><b>Default Example</b></h4>
    <p class="text-muted font-13 m-b-30">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    </p> -->

    <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                    
                    <thead>
                        <tr role="row">
                        	<th style="width: 200px;">Cliente</th>
                            <th style="width: 150px;">Fecha de contrato</th>
                            <th style="width: 150px;">Fecha de vencimiento</th>
                            <th style="width: 50px;">Renovar suscripción</th>
                            <th style="width: 50px;">Terminar suscripción</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @foreach ($credenciales as $credencial)
                            <tr>
                            	<td> {{ $credencial->user->nombreCompleto }} </td>
                                <td> {{ $credencial->created_at->diffForHumans() }} </td>
                                <td> {{ $credencial->fechaVencimiento($credencial->fin_vigencia) }} </td>
                                @if($credencial->fechaVencimiento($credencial->fin_vigencia) == 'Vencida')
                                    <td align="center">
                                        <button class="btn btn-icon waves-effect waves-light btn-inverse update"
                                            data-toggle="modal" data-target="#updateCredencial" data-url="{{ route('credenciales.update', $credencial->id) }}">
                                            <i class="fa fa-check-circle-o"></i>
                                        </button>
                                    </td>
                                    <td align="center"> Vencida </td>
                                @else
                                    <td align="center"> Vigente </td>
                                    <td align="center">
                                        <button class="btn btn-icon waves-effect waves-light btn-danger delete" data-title="¿ Seguro que deseas cancelarla ?"
                                            data-toggle="modal" data-target="#deleteConfirm" data-url="{{ route('credenciales.destroy', $credencial->id) }}">
                                            <i class="fa fa-remove"></i>
                                        </button>
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
                <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Mostrando {{ $credenciales->count() }} de 10 registros</div>
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
    @include('modals.updateCredencial')

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

            $('.update').click(function() {
                var url = $(this).data('url');
                $('#formUpdate').attr('action', url);
            });
        });
    </script>
@endsection