
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('foto') }}</label>
    <div>
        {{ Form::file('foto', $fotosplato->foto, ['class' => 'form-control' .
        ($errors->has('foto') ? ' is-invalid' : ''), 'placeholder' => 'Foto']) }}
        {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">fotosplato <b>foto</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('Plato') }}</label>
    <div>
        {{ Form::select('plato_id', $platos, ['class' => 'form-control' .
        ($errors->has('plato_id') ? ' is-invalid' : ''), 'placeholder' => 'Plato']) }}
        {!! $errors->first('plato_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">fotosplato <b>plato_id</b> instruction.</small>
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
