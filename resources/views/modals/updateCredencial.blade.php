<form action="" method="post" id="formUpdate">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="patch">
    <div class="modal fade" id="updateCredencial" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mt-0">Credencial</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="unidad" class="control-label">Unidad</label>
                            <select class="form-control" name="unidad" style="height: 37px;">
                                <option value="semana">Semana</option>
                                <option value="mes">Mes</option>
                                <option value="año">Año</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cantidad" class="control-label">Cantidad</label>
                            <input class="form-control" name="cantidad" value="1" type="number" min="1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Renovar</button>
                </div>
            </div>
        </div>
    </div>
</form>