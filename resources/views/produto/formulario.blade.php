{{-- Nome --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Nome do Produto') }}</label>
    <div>
        <input type="text" id="nome" name="nome" value="{{ isset($produto) ? $produto->nome : old('nome') }}"
            class="form-control @error('nome') is-invalid @enderror" placeholder="Nome do Produto" required>
        @error('nome')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Descricao --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Descricao do Produto') }}</label>
    <div>
        <textarea id="descricao" name="descricao" class="form-control @error('descricao') is-invalid @enderror"
            placeholder="Escreva uma descrição curta sobre o produto"
            required>{{ isset($produto) ? $produto->descricao : old('descricao') }}</textarea>
        @error('descricao')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


{{-- Preço --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Preço do Produto') }}</label>
    <div>
        <input type="text" id="preco" name="preco" value="{{ isset($produto) ? $produto->preco : old('preco') }}"
            class="form-control @error('preco') is-invalid @enderror" required>
        @error('preco')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Quantidade --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Quantidade do Produto') }}</label>
    <div>
        <input type="number" id="quantidade" name="quantidade" min="1" max="500"
            value="{{ isset($produto) ? $produto->quantidade : old('quantidade') }}"
            class="form-control @error('quantidade') is-invalid @enderror" required>
        @error('quantidade')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


{{-- Categoria --}}
<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Categoria') }}</label>
    <div>
        <select id="categoria_id" name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror"
            required>
            <option value="">--- Selecione uma Categoria ---</option>
            @isset($categorias)
                @foreach ($categorias as $categoria)
                    <option @if (isset($produto) && $produto->categoria_id == $categoria->id) selected @endif value="{{ $categoria->id }}">
                        {{ $categoria->categoria }}
                    </option>
                @endforeach
            @endisset
        </select>
        @error('categoria_id')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Imagem --}}
<div class="row">
    <div class="col-sm-2 col-form-label">
        <label class="@if (!isset($produto)) required @endif" for="image">Imagens</label>
        <input type="file" name="imagem" class="form-control" accept="image/*"
            @if (!isset($produto)) required @endif>
    </div>
</div>
