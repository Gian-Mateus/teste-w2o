<div class="card h-100" style="width: 18rem;">
    <img src="{{ $img }}" class="card-img-top" alt="...">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $title }}</h5>
        <div>
            <span class="badge text-bg-secondary">{{ $category }}</span>
        </div>
        <p class="card-text flex-grow-1">{{ $description }}</p>
        <h5>{{ $price }}</h5>
        {{-- Não por links, por botões de ação, editar e excluir --}}
        <div>
            <a href="{{ $urlEdit }}" class="btn btn-primary"><x-svg.edit /></a>
            <form action="{{ $urlDelete }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><x-svg.delete /></button>
            </form>
        </div>
    </div>
</div>