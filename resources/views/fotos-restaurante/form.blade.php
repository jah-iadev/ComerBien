
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('foto', 'Nombre') }}</label>
    <div>
        {{ Form::file('foto', $fotosRestaurante->foto, ['class' => 'form-control' .
        ($errors->has('foto') ? ' is-invalid' : ''), 'placeholder' => 'Foto']) }}
        {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">fotosRestaurante <b>foto</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('restaurante_id') }}</label>
    <div>
        {{ Form::select('restaurante_id', $restaurantes , ['class' => 'form-control' .
        ($errors->has('restaurante_id') ? ' is-invalid' : ''), 'placeholder' => 'Restaurante Id']) }}
        {!! $errors->first('restaurante_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">fotosRestaurante <b>restaurante_id</b> instruction.</small>
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
