{{-- Nome --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
    <div>
        <input type="text" id="nome" name="nome" value="{{ isset($jogador) ? $jogador->nome : old('nome') }}"
            class="form-control @error('nome') is-invalid @enderror" placeholder="Joãozinho do Pastel" required>
        @error('nome')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Data de nascimento --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Data de Nascimento') }}</label>
    <div class="form-group{{ $errors->has('data') ? ' has-danger' : '' }}">
        <input class="form-control{{ $errors->has('data') ? ' is-invalid' : '' }}" name="data" id="input-data"
            type="text" placeholder="{{ __('Data de Nascimento') }}"
            value="{{ isset($jogador) ? $jogador->data : old('jogador') }}" required="true" aria-required="true" />
        @if ($errors->has('jogador'))
            <span id="jogador-error" class="error text-danger"
                for="input-jogador">{{ $errors->first('jogador') }}</span>
        @endif
    </div>
</div>


{{-- Nacionalidade --}}
<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Nacionalidade') }}</label>
    <select id="nacionalidades_id" name="nacionalidades_id"
        class="form-control @error('nacionalidade_id') is-invalid @enderror" required>
        <option value="">--- Selecione uma Nacionalidade ---</option>
        @isset($nacionalidades)
            @foreach ($nacionalidades as $nacionalidade)
                <option @if (isset($jogador) && $jogador->nacionalidade_id == $nacionalidade->id) selected @endif value="{{ $nacionalidade->id }}">
                    {{ $nacionalidade->nacionalidade }}
                </option>
            @endforeach
        @endisset
    </select>
    @error('nacionalidade_id')
        <span class="invalid-feedback" role="alert">
            <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Imagem --}}
<div class="row">
    <div class="col-sm-2 col-form-label">
        <label class="@if (!isset($jogador)) required @endif" for="image">Imagens</label>
        <input type="file" name="imagem" class="form-control" accept="image/*"
            @if (!isset($jogador)) required @endif>
    </div>
</div>
