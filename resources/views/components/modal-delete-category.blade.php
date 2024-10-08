<div class="modal fade" tabindex="-1" id="modal-delete-{{$id}}" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Deseja mesmo excluir esta categoria?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ $category }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ $actionForm }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">{{ $action }}</button>
                </form>
            </div>
        </div>
    </div>
</div>