<div class="modal fade" tabindex="-1" id="modal-edit-{{$id}}" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Você está editando: {{ $category}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $actionForm }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_name-{{$id}}" class="form-label">Categoria</label>
                        <input type="text" class="form-control" id="category_name-{{$id}}" name="category_name" value="{{ $category }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success">{{ $action }}</button>
                </div>
            </form>
        </div>
    </div>
</div>