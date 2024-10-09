@extends('layout.template')
@section('content')
<main class="container">
    <div class="row">
        <h2 class="mt-4">Novo Produto</h2>
        <form action="{{ route('produtos.store') }}" method="POST" novalidate class="needs-validation" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-end gap-3">
                <button class="btn btn-success" type="submit">Salvar</button>
            </div>
            <div class="mb-3 mt-2">
                <label for="title-product" class="form-label">Título:</label>
                <input type="text" class="form-control" id="title-product" name="name" placeholder="Título do produto"
                    required>
            </div>
            <div class="mb-3">
                <label for="description-product" class="form-label">Descrição:</label>
                <textarea class="form-control" id="description-product" name="description"
                    placeholder="Alguma descrição do produto"></textarea>
            </div>
            <div class="mb-3">
                <label for="price-product" class="form-label">Preço (R$):</label>
                <input type="text" class="form-control" id="price-product" name="price" placeholder="Valor do produto"
                    required>
            </div>
            <div class="mb-3">
                <label for="category-product" class="form-label">Categoria:</label>
                <select class="form-select" aria-label="Escolha a categoria" name="category_id" id="category-product" required>
                    <option selected disabled value="">Escolha uma categoria...</option>
                    @foreach ($categories as $cat)
                    <option value="{{ $cat['id'] }}">{{ $cat['category_name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="sku-product" class="form-label">SKU:</label>
                <input type="text" class="form-control" id="sku-product" name="sku" placeholder="SKU do produto"
                    required>
            </div>
            <div class="mb-3">
                <label for="date-product" class="form-label">Data de vencimento:</label>
                <input type="text" class="form-control" id="date-product" name="expiration_date" maxlength="10">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Imagem:</label>
                <input class="form-control" type="file" id="formFile" name="image" required>
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
        })()
        const input = document.getElementById('price-product');
        
        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            value = (parseInt(value) / 100).toFixed(2) + ''; // Converte o valor para formato decimal
            
            // Adiciona o ponto de milhar
            value = value.replace('.', ','); // Troca o ponto decimal por vírgula
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Insere o ponto a cada milhar
            
            e.target.value = value; // Atualiza o valor do input
        });
        const inputData = document.getElementById('date-product');
                
        inputData.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove caracteres que não são números
            
            // Aplica a máscara de data usando regex
            value = value.replace(/(\d{2})(\d)/, '$1/$2'); // Coloca a barra após o dia
            value = value.replace(/(\d{2})\/(\d{2})(\d)/, '$1/$2/$3'); // Coloca a barra após o mês
            
            e.target.value = value; // Atualiza o valor do input
        });
</script>
@endsection