<div class="card mb-3" >
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ $img }}" class="img-fluid rounded-start object-fit-cover w-100" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $title }}</h5>
                <div>
                    <span class="badge text-bg-secondary">{{ $category }}</span>
                </div>
                <p class="card-text">{{ $description }}</p>
                <h5>{{ $price }}</h5>
                <p class="card-text"><small class="text-body-secondary">Estoque: </small></p>
                <p class="card-text"><small class="text-body-secondary">Data de vencimento: {{ $expirationDate }}</small></p>
                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ $urlEdit }}" class="btn btn-primary">
                        <x-svg.edit />
                    </a>
                    <form action="{{ $urlDelete }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            <x-svg.delete />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>