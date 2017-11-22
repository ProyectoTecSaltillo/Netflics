<form action="" method="post" id="formDelete">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="delete">
    <div class="modal fade" id="deleteConfirm" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mt-0" id="title">¿ Seguro que deseas eliminar ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</form>