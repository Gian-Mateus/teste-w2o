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
            <button class="btn btn-primary">✏</button>
            <button class="btn btn-danger">✖</button>
        </div>
    </div>
</div>