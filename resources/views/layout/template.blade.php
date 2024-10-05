<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <title>Gerenciador de Produtos</title>
</head>
<body>
    <x-navbar />
    @yield('content')
</body>
</html>