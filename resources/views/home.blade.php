@extends('layout.template')
@section('content')
<style>
    .card{
        min-height: 150px;
    }
</style>
    <main class="container min-vh-100 mt-4">
        <nav class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div>
                    <a class="text-decoration-none card d-flex justify-content-center align-items-center" href="{{ route('produtos.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M21.04 12.13c.14 0 .27.06.38.17l1.28 1.28c.22.21.22.56 0 .77l-1 1l-2.05-2.05l1-1c.11-.11.25-.17.39-.17m-1.97 1.75l2.05 2.05L15.06 22H13v-2.06zM19 3c1.1 0 2 .9 2 2v4L11 19v2H5c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h4.18C9.6 1.84 10.7 1 12 1s2.4.84 2.82 2zm-7 0c-.55 0-1 .45-1 1s.45 1 1 1s1-.45 1-1s-.45-1-1-1" />
                        </svg>
                        Produtos
                    </a>
                </div>
            </div>
            <div class="col">
                <div>
                    <a class="text-decoration-none card d-flex justify-content-center align-items-center" href="{{ route('categorias.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M3 4h4v4H3zm6 1v2h12V5zm-6 5h4v4H3zm6 1v2h12v-2zm-6 5h4v4H3zm6 1v2h12v-2z" />
                        </svg>
                        Categorias
                    </a>
                </div>
            </div>
            <div class="col">
                <div>
                    <a class="text-decoration-none card d-flex justify-content-center align-items-center" href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 3c-1.11 0-2 .89-2 2H3v14H2v2h20v-2h-1V5c0-1.11-.89-2-2-2zm0 2h7v14h-7zm-7 6h2v2H5z" />
                        </svg>
                        Entradas
                    </a>
                </div>
            </div>
            <div class="col">
                <div>
                    <a class="text-decoration-none card d-flex justify-content-center align-items-center" href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M19 3H5c-1.11 0-2 .89-2 2v4h2V5h14v14H5v-4H3v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m-8.92 12.58L11.5 17l5-5l-5-5l-1.42 1.41L12.67 11H3v2h9.67z" />
                        </svg>
                        Saidas
                    </a>
                </div>
            </div>
            <div class="col">
                <div>
                    <a class="text-decoration-none card d-flex justify-content-center align-items-center" href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m-7 0a1 1 0 0 1 1 1a1 1 0 0 1-1 1a1 1 0 0 1-1-1a1 1 0 0 1 1-1" />
                        </svg>
                        Relatórios
                    </a>
                </div>
            </div>
        </nav>
    </main>
@endsection
