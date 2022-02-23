<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Nacionalidade') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('nacionalidade') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('nacionalidade') ? ' is-invalid' : '' }}" name="nacionalidade"
                id="input-nacionalidade" type="text" placeholder="{{ __('Nacionalidade') }}"
                value="{{ isset($nacionalidade) ? $nacionalidade->nacionalidade : old('Nacionalidade') }}"
                required="true" aria-required="true" />
            @if ($errors->has('nacionalidade'))
                <span id="nacionalidade-error" class="error text-danger"
                    for="input-nacionalidade">{{ $errors->first('nacionalidade') }}</span>
            @endif
        </div>
    </div>
</div>
