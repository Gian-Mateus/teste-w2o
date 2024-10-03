@extends('layout.template')
@section('content')
    <main class="container">
        <div class="row">
            <h2 class="mt-4">Editando:</h2>
            <h4 class="my-2">{{ $item['name'] }}</h4>
            <form action="">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-end gap-3">
                    <button class="btn btn-success" type="submit">Salvar</button>
                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modal">Excluir</button>
                </div>
                <div class="mb-3 mt-2">
                    <label for="title-product" class="form-label">Título:</label>
                    <input type="email" class="form-control" id="title-product" placeholder="Título do produto" value="{{ $item['name'] }}" required>
                </div>
                <div class="mb-3">
                    <label for="description-product" class="form-label">Descrição:</label>
                    <input type="email" class="form-control" id="description-product" placeholder="Alguma descrição do produto" value="{{ $item['description'] }}">
                </div>
                <div class="mb-3">
                    <label for="price-product" class="form-label">Descrição:</label>
                    <input type="email" class="form-control" id="price-product" placeholder="Alguma descrição do produto" value="{{ $item['price'] }}">
                </div>
                <div class="mb-3">
                    <label for="sku-product" class="form-label">SKU:</label>
                    <input type="email" class="form-control" id="sku-product" placeholder="{{ $item['sku'] }}" value="{{ $item['sku'] }}" required>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Imagem:</label>
                    <input class="form-control" type="file" id="formFile" required>
                </div>
            </form>
        </div>
    </main>

    {{-- Modal para confirmação da exclusão --}}
    <x-modal 
        title="Excluir item" 
        body="Deseja realmente excluir esse item?" 
        method="DELETE"
        action="Excluir"
        :actionForm="route('produtos.destroy', $item['id'])"
    />
@endsection
