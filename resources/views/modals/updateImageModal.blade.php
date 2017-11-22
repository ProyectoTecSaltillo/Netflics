<form action="{{ route('imagen', Auth::user()->id) }}" method="post">
    {{ csrf_field() }}
    <!-- <input type="hidden" name="_method" value="patch"> -->
    <div class="modal fade" id="perfilFoto" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Selecciona una imagen</label>
                                <input name="foto" class="form-control" type="file" required> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Actualizar imagen</button>
                </div>
            </div>
        </div>
    </div>
</form>