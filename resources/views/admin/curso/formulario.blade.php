<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Nome do Curso') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('curso') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('curso') ? ' is-invalid' : '' }}" name="curso"
                id="input-curso" type="text" placeholder="{{ __('Nome do Curso') }}"
                value="{{ isset($curso) ? $curso->curso : old('curso') }}" required="true"
                aria-required="true" />
            @if ($errors->has('curso'))
                <span id="curso-error" class="error text-danger"
                    for="input-curso">{{ $errors->first('curso') }}</span>
            @endif
        </div>
    </div>
</div>
