@extends('layout.template')
@section('content')
    <main class="container">

        <div class="row">
            <div class="col">
                <h1>Categorias:</h1>
                <div class="col">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-new-category">Nova Categoria</button>
                </div>
                <ul class="list-group mt-4">
                    @foreach ($categories as $c)                 
                    <li class="list-group-item d-flex gap-3">
                        <div class="flex-grow-1">
                            {{ $c['category_name'] }}
                        </div>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $c['id'] }}"><x-svg.edit /></button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $c['id'] }}"><x-svg.delete /></button>
                        {{-- Modal para exclusão --}}
                        <x-modal-delete-category 
                            action="Excluir" 
                            :actionForm="route('categorias.destroy', $c['id'])" 
                            :id="$c['id']"
                            :category="$c['category_name']"
                        />
                        {{-- Modal para edição --}}
                        <x-modal-edit-categories 
                            action="Salvar" 
                            :actionForm="route('categorias.update', $c['id'])" 
                            :id="$c['id']"
                            :category="$c['category_name']" />
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
    {{-- Modal para adicionar nova categoria --}}
    <x-modal-new-category/>
    {{-- Modal para edição --}}
@endsection
