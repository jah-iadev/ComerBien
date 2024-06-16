
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('comentario') }}</label>
    <div>
        {{ Form::text('comentario', $comentario->comentario, ['class' => 'form-control' .
        ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
        {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">comentario <b>comentario</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('restaurante_id') }}</label>
    <div>
        {{ Form::text('restaurante_id', $comentario->restaurante_id, ['class' => 'form-control' .
        ($errors->has('restaurante_id') ? ' is-invalid' : ''), 'placeholder' => 'Restaurante Id']) }}
        {!! $errors->first('restaurante_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">comentario <b>restaurante_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('usuario_id') }}</label>
    <div>
        {{ Form::text('usuario_id', $comentario->usuario_id, ['class' => 'form-control' .
        ($errors->has('usuario_id') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Id']) }}
        {!! $errors->first('usuario_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">comentario <b>usuario_id</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
