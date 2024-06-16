
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre') }}</label>
    <div>
        {{ Form::text('nombre', $plato->nombre, ['class' => 'form-control' .
        ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">plato <b>nombre</b> instruction.</small>
    </div>
</div>
<!--<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('restaurante_id') }}</label>
    <div>
        {{ Form::text('restaurante_id', $plato->restaurante_id, ['class' => 'form-control' .
        ($errors->has('restaurante_id') ? ' is-invalid' : ''), 'placeholder' => 'Restaurante Id']) }}
        {!! $errors->first('restaurante_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">plato <b>restaurante_id</b> instruction.</small>
    </div>
</div>-->

<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('Restaurante') }}</label>
    <div>
        {{ Form::select('restaurante_id', $restaurantes, ['class' => 'form-control' .
        ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Restaurante']) }}
        {!! $errors->first('restaurante_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">plato <b>restaurante_id</b> instruction.</small>
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
