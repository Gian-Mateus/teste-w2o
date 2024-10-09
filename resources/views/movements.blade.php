@extends('layout.template')
@section('content') 
    <main class="container">
        <div class="row mt-4">
            <h1>Movimentações</h1>
        </div>
        <div class="row mt-4">
            <ul class="nav nav-tabs" id="tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="entries-tab" data-bs-toggle="tab" data-bs-target="#entries-tab-pane" type="button" role="tab" aria-controls="entries-tab-pane" aria-selected="true">Entradas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#exits-tab-pane" type="button" role="tab" aria-controls="exits-tab-pane" aria-selected="false">Saídas</button>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="tab-content" id="tabContent"> 
                <div class="tab-pane fade show active" id="entries-tab-pane" role="tabpanel" aria-labelledby="entries-tab" tabindex="0">
                    <div class="col mt-4">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-new-entry">Nova entrada</button>
                    </div>
                    
                    <ul class="list-group mt-4">
                        @foreach ($entries as $e)    
                        <li class="list-group-item">
                            <div><b>Produto:</b> {{ $e['item_name'] }} </div>
                            <div><b>Quantidade:</b> {{ $e['quantity'] }} </div>
                            <div><b>Criado à:</b> {{ $e['created_at'] }} </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane fade" id="exits-tab-pane" role="tabpanel" aria-labelledby="exits-tab" tabindex="0">
                    <div class="col mt-4">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-new-exits">Nova saida</button>
                    </div>
                    
                    <ul class="list-group mt-4">
                        @foreach ($exits as $ex)
                        <li class="list-group-item">
                            <div><b>Produto:</b> {{ $ex['item_name'] }} </div>
                            <div><b>Quantidade:</b> {{ $ex['quantity'] }} </div>
                            <div><b>Criado à:</b> {{ $ex['created_at'] }} </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Modal Entrada -->
    <form action="{{ route('movimentacao.store') }}" method="POST">
        @csrf
        {{-- @method('POST') --}}
        <div class="modal fade" id="modal-new-entry" tabindex="-1" aria-labelledby="modal-new-entryLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal-new-entryLabel">Nova Entrada</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <select class="form-select" aria-label="Default select example" name="item_id" id="item">
                            @foreach ($items as $i)
                                <option value="{{ $i['id'] }}">{{ $i['name'] }}</option>
                            @endforeach
                        </select>
                        <div class="mt-3">
                            <label for="quantity" class="form-label">Quantidade:</label>
                            <input name="quantity" type="text" class="form-control" id="quantity" placeholder="0">
                        </div>

                        <input name="type" type="hidden" class="form-control" id="type" value="0">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal Saida -->
    <form action="{{ route('movimentacao.store') }}" method="POST">
            @csrf
            {{-- @method('POST') --}}
            <div class="modal fade" id="modal-new-exits" tabindex="-1" aria-labelledby="modal-new-exitsLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modal-new-exitsLabel">Nova Saída</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <select class="form-select" aria-label="Default select example" name="item_id" id="item-exit">
                                @foreach ($items as $i)
                                <option value="{{ $i['id'] }}">{{ $i['name'] }}</option>
                                @endforeach
                            </select>
                            <div class="mt-3">
                                <label for="quantity" class="form-label">Quantidade:</label>
                                <input name="quantity" type="text" class="form-control" id="quantity-exit" placeholder="0">
                            </div>
                            <input name="type" type="hidden" class="form-control" id="type-exit" value="1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection