<nav class="navbar navbar-expand-lg bg-body-tertiary px-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('produtos.index') }}">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Entradas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Saidas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Relatórios</a>
                </li>
            </ul>
        </div>
    </div>
</nav>