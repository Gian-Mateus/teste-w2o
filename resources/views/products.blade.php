@extends('layout.template')
@section('content')
    <main class="container">
        <h1 class="my-3 border-bottom">Produtos</h1>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Pesquisar produto" aria-label="Pesquisar produto"
                aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><x-svg.search /></button>
        </div>
        <section>
            <div class="row">
                <div class="col my-4">
                    <a href="{{ route('produtos.create') }}" class="btn btn-primary">Novo produto</a>
                </div>
            </div>
            <div class="row">
                @foreach ($itens as $item)
                    {{-- <div class="col d-flex justify-content-center mb-3"> --}}
                        <x-card
                            {{-- :img="$item['image']" --}}
                            :img="url('storage/'.$item['image'])"
                            :title="$item['name']"
                            :description="$item['description']"
                            :price="$item['price']"
                            :category="$item['category_name']"
                            :expirationDate="$item['expiration_date']"
                            :urlEdit="route('produtos.edit', $item['id'])"
                            :urlDelete="route('produtos.destroy', $item['id'])"
                            :stock="$item['stock']"
                        />
                    {{-- </div> --}}
                @endforeach
            </div>
        </section>
    </main>

@endsection