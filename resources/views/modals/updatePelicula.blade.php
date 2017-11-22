<div class="modal fade" id="see" role="dialog">
    <div class="modal-dialog" style="width:55%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p id="descripcion"></p>
            </div>
        </div>
    </div>
</div>

<form action="" method="post" id="formUpdate">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="patch">
    <div class="modal fade" id="updatePelicula" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mt-0">Información de la película</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="titulo" class="control-label">Título</label>
                                <input class="form-control" name="titulo" id="titulo" placeholder="" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio_renta" class="control-label">Precio Renta</label>
                                <input class="form-control" name="precio_renta" id="precio_renta" placeholder="" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio_venta" class="control-label">Precio Venta</label>
                                <input class="form-control" name="precio_venta" id="precio_venta" placeholder="" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoria" class="control-label">Categoría</label>
                                <select class="form-control" name="categoria_id" id="categoria" style="height: 37px;">
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="genero" class="control-label">Genero</label>
                                <select class="form-control" name="genero_id" id="genero" style="height: 37px;">
                                    @foreach($generos as $genero)
                                        <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion" class="control-label">Descripción</label>
                                <textarea name="descripcion" id="descripcion2" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>