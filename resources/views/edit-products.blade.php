@extends('layout.template')
@section('content')
    <main class="container-md">
        <div class="row">
            <h2 class="mt-4">Editando:</h2>
            <h4 class="my-2">{{ $item['name'] }}</h4>
            <form action="{{ route('produtos.update', $item['id']) }}" method="POST" class="needs-validation" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-end gap-3">
                    <button class="btn btn-success" type="submit">Salvar</button>
                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modal">Excluir</button>
                </div>
                <div class="mb-3 mt-2">
                    <label for="title-product" class="form-label">Título:</label>
                    <input name="name" type="text" class="form-control" id="title-product" placeholder="Título do produto" value="{{ $item['name'] }}">
                </div>
                <div class="mb-3">
                    <label for="description-product" class="form-label">Descrição:</label>
                    <textarea name="description" class="form-control" id="description-product" placeholder="Alguma descrição do produto" >{{ $item['description'] }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="category-product" class="form-label">Categoria:</label>
                    <select class="form-select" aria-label="Escolha a categoria" name="category_id" id="category-product">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat['id'] }}" {{ $cat['id'] == $item['category_id'] ? 'selected' : '' }}>{{ $cat['category_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price-product" class="form-label">Preço (R$):</label>
                    <input name="price" type="text" class="form-control" id="price-product" placeholder="{{ $item['price'] }}" value="{{ $item['price'] }}">
                </div>
                <div class="mb-3">
                    <label for="sku-product" class="form-label">SKU:</label>
                    <input name="sku" type="text" class="form-control" id="sku-product" placeholder="{{ $item['sku'] }}" value="{{ $item['sku'] }}">
                </div>
                <div class="mb-3">
                    <label for="date-product" class="form-label">Data de vencimento:</label>
                    <input name="expiration_date" type="text" class="form-control" id="date-product" placeholder="{{ $item['expiration_date'] }}" value="{{ $item['expiration_date'] }}">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Imagem:</label>
                    <input name="image" class="form-control" type="file" id="formFile">
                    <div class="mt-3 d-flex flex-column">
                        <small class="">Imagem Atual</small>
                        <img src="{{ url('storage/'.$item['image']) }}" class="img-fluid w-25" alt="Imagem atual">
                    </div>
                </div>
            </form>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </main>

    {{-- Modal para confirmação da exclusão --}}
    <x-modal 
        title="Excluir item" 
        body="Deseja realmente excluir esse item?" 
        method="DELETE"
        action="Excluir"
        :actionForm="route('produtos.destroy', $item['id'])"
    />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
            $('#date-product').mask('00/00/0000');
            $('#price-product').mask('000.000.000.000.000,00', {reverse: true});
        })()
    </script>
@endsection
