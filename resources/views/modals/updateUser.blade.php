<form action="" method="post" id="formUpdate">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="patch">
    <div class="modal fade" id="updateUser" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mt-0">Información del usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('nombres') ? ' has-error' : '' }}">
                                <label for="field-3" class="control-label">Nombres</label>
                                <input class="form-control" name="nombres" id="nombres" placeholder="" type="text">
                                @if ($errors->has('nombres'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombres') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('paterno') ? ' has-error' : '' }}">
                                <label for="field-1" class="control-label">Paterno</label>
                                <input class="form-control" name="paterno" id="paterno" placeholder="" type="text">
                                @if ($errors->has('paterno'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('paterno') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('materno') ? ' has-error' : '' }}">
                                <label for="field-2" class="control-label">Materno</label>
                                <input class="form-control" name="materno" id="materno" placeholder="" type="text">
                                @if ($errors->has('materno'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('materno') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="field-3" class="control-label">Email</label>
                                <input class="form-control" name="email" id="email" placeholder="" type="email">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label for="field-4" class="control-label">Teléfono</label>
                                <input class="form-control" name="telefono" id="telefono" placeholder="" type="text">
                                @if ($errors->has('telefono'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('direccion') ? ' has-error' : '' }}">
                                <label for="field-5" class="control-label">Dirección</label>
                                <input class="form-control" name="direccion" id="direccion" placeholder="" type="text">
                                @if ($errors->has('direccion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                                @endif
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