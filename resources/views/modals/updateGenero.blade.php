<form action="" method="post" id="formUpdate">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="patch">
    <div class="modal fade" id="updateGenero" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mt-0">Género</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label for="nombre" class="control-label">Nombre</label>
                            <input class="form-control" name="nombre" id="nombre" placeholder="" type="text">
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