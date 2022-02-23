{{-- Nome --}}

{{-- <div class="row">
    <label class="col-sm-2 col-form-label">{{ __('INSIRAAQUISUAVARIAVEL') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('INSIRAAQUISUAVARIAVEL') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('INSIRAAQUISUAVARIAVEL') ? ' is-invalid' : '' }}"
                name="INSIRAAQUISUAVARIAVEL" id="input-INSIRAAQUISUAVARIAVEL" type="text"
                placeholder="{{ __('INSIRAAQUISUAVARIAVEL') }}"
                value="{{ isset($INSIRAAQUISUAVARIAVEL) ? $INSIRAAQUISUAVARIAVEL->INSIRAAQUISUAVARIAVEL : old('INSIRAAQUISUAVARIAVEL') }}"
                required="true" aria-required="true" />
            @if ($errors->has('INSIRAAQUISUAVARIAVEL'))
                <span id="INSIRAAQUISUAVARIAVEL-error" class="error text-danger"
                    for="input-INSIRAAQUISUAVARIAVEL">{{ $errors->first('INSIRAAQUISUAVARIAVEL') }}</span>
            @endif
        </div>
    </div>
</div> --}}

{{-- Data de nascimento --}}

{{-- <div class="row">
    <label class="col-sm-2 col-form-label">{{ __('INSIRAAQUISUAVARIAVEL') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('INSIRAAQUISUAVARIAVEL') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('INSIRAAQUISUAVARIAVEL') ? ' is-invalid' : '' }}"
                name="INSIRAAQUISUAVARIAVEL" id="input-INSIRAAQUISUAVARIAVEL" type="text"
                placeholder="{{ __('INSIRAAQUISUAVARIAVEL') }}"
                value="{{ isset($INSIRAAQUISUAVARIAVEL) ? $INSIRAAQUISUAVARIAVEL->INSIRAAQUISUAVARIAVEL : old('INSIRAAQUISUAVARIAVEL') }}"
                required="true" aria-required="true" />
            @if ($errors->has('INSIRAAQUISUAVARIAVEL'))
                <span id="INSIRAAQUISUAVARIAVEL-error" class="error text-danger"
                    for="input-INSIRAAQUISUAVARIAVEL">{{ $errors->first('INSIRAAQUISUAVARIAVEL') }}</span>
            @endif
        </div>
    </div>
</div> --}}


{{-- Nacionalidade --}}
{{-- <div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Nacionalidade') }}</label>
    <div class="col-sm-7">
        <select name="nacionalidade_id" id="nacionalidade" required>
            @if (isset($nacionalidades))
                @foreach ($nacionalidades as $nacionalidade)
                    <option value="{{ $nacionalidade->id }}">{{ $nacionalidade->nacionalidade }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div> --}}

{{-- Imagem --}}
{{-- <div class="row">
    <label class="" @if (!isset($jogador)) required @endif">{{ __('Imagem') }}</label>
    <div class="col-sm-7">
        <label class="@if (!isset($jogador)) required @endif" for="image">Imagens</label>
        <input Multiple type="file" name="imagens[]" aria-describedby="fileHelp" class="form-control" accept="image/*"
            @if (!isset($jogador)) required @endif>
    </div>
</div> --}}
