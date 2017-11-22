@extends('layouts.app')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Rentas</h4>
        <p class="text-muted page-title-alt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
</div>

<div>
    <div class="card-box">
        <div class="row">
            <div class="col-12">
                <div class="p-20">

                    <form class="form-horizontal" role="form" method="post" action="{{ route('rentas.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Nombre del cliente</label>
                            <div class="col-10">
                                <select class="form-control" name="cliente" style="height: 37px;">
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->nombreCompleto }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Película</label>
                            <div class="col-10">
                                <select class="form-control" name="pelicula" id="pelicula" style="height: 37px;">
                                    @foreach($peliculas as $pelicula)
                                        <option value="{{ $pelicula->id }}">{{ $pelicula->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">N° copia</label>
                            <div class="col-10">
                                <select class="form-control" name="copia" id="copia" style="height: 37px;">
                                </select>
                            </div>
                        </div>

                        <button type="submit" id="agregar" class="btn btn-default waves-effect waves-light pull-right">Agregar renta</button>

                    </form>

                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end card-box -->
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            llenarCopiasSelect();

            $('#pelicula').change(function() {
                llenarCopiasSelect();
            });
        });

        function llenarCopiasSelect() {
            var pelicula_id = $('#pelicula option:selected').val();
            $.ajax({
                method: "GET",
                url: "{{URL::to('/')}}/obtenerCopias/" + pelicula_id,
                success: function(result){
                    // console.log(JSON.stringify(result, null, 4));
                    var options = $("#copia");
                    options.empty();
                    if (result.length != 0) {
                        $.each(result, function() {
                            options.append($("<option />").val(this.id).text(this.id));
                        });
                        $('#agregar').attr('disabled', false);
                    } else {
                        toastr.warning('No hay copias disponibles de la película seleccionada');
                        $('#agregar').attr('disabled', true);
                    }
                }
            });
        }
    </script>
@endsection