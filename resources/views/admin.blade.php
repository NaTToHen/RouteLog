<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="shortcut icon" href="/img/logo.ico" type="image/x-icon">
    <title>RouteLog - {{$user = Auth::user()->nome}}</title>
</head>
<body>
    <header class="menuSuperior">
        <img src="/img/logo.svg" alt="logo" class="logoMenu">
        <div class="icones">
            <a href=""><img src="/img/pesquisa.svg"></a>
            <a href="{{route('admin.index')}}"><img src="/img/home.svg"></a>
            <a href="/usuario"><img src="/img/Users/usuario.jpg" class="usuarioImg"></a>
            <a>
                <img src="/img/configuracoes.svg" class="config">
                    <a href="{{route('login.logout')}}" class="deslogar">sair</a>
            </a>
        </div>
    </header>

    <header class="menuLateral">
        <img src="/img/home.svg" width="35px">
        <img src="/img/caminhao.svg">
        <img src="/img/caixa.svg" class="usuarioImg">
        <img src="/img/relatorio.svg" alt="">
    </header>

    @yield('titulo')

    <main id="conteudo">
        @yield('conteudo')
    </main>

    <script src="/js/admin.js"></script>
</body>
</html>
