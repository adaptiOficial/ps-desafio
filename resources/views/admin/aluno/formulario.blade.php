{{-- Nome --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Nome do Aluno') }}</label>
    <div>
        <input type="text" id="nome" name="nome" value="{{ isset($aluno) ? $aluno->nome : old('nome') }}"
            class="form-control @error('nome') is-invalid @enderror" placeholder="Nome do Aluno" required>
        @error('nome')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Descricao --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Descricao do Aluno') }}</label>
    <div>
        <textarea id="descricao" name="descricao" class="form-control @error('descricao') is-invalid @enderror"
            placeholder="Escreva uma descrição curta sobre o aluno"
            required>{{ isset($aluno) ? $aluno->descricao : old('descricao') }}</textarea>
        @error('descricao')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Está contratado? --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Está contratado?') }}</label>
    <div>
        <input type="checkbox" id="estáFormado" name="contratado" value="1" data-expected-info="contratado"
            class="form-control @error('contratado') is-invalid @enderror" required>
        @error('contratado')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Curso --}}
<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Curso') }}</label>
    <div>
        <select id="curso_id" name="curso_id" class="form-control @error('curso_id') is-invalid @enderror"
            required>
            <option value="">--- Selecione um Curso ---</option>
            @isset($cursos)
                @foreach ($cursos as $curso)
                    <option @if (isset($aluno) && $aluno->curso_id == $curso->id) selected @endif value="{{ $curso->id }}">
                        {{ $curso->curso }}
                    </option>
                @endforeach
            @endisset
        </select>
        @error('curso_id')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Imagem --}}
<div class="row">
    <div class="col-sm-2 col-form-label">
        <label class="@if (!isset($aluno)) required @endif" for="image">Imagens</label>
        <input type="file" name="imagem" class="form-control" accept="image/*"
            @if (!isset($aluno)) required @endif>
    </div>
</div>
