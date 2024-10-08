<div class="modal fade" id="modal-new-category" tabindex="-1" aria-labelledby="modal-new-categoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-new-categoryLabel">Adicionar nova categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf
                @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="category_name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="category_name" name="category_name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>