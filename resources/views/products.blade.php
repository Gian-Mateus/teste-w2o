@extends('layout.template')
@section('content')
    <main class="container">
        <h1 class="my-3 border-bottom">Produtos</h1>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username"
                aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><x-svg.search /></button>
        </div>
        <section>
            <div class="row">
                @foreach ($itens as $item)
                    <div class="col d-flex justify-content-center mb-3">
                        <x-card
                            :img="$item['image']"
                            :title="$item['name']"
                            :description="$item['description']"
                            :price="$item['price']"
                            :category="$item['category_name']"
                            :urlEdit="route('produtos.edit', $item['id'])"
                            :urlDelete="route('produtos.destroy', $item['id'])"
                        />
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection