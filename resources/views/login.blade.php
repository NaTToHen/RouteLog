<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="shortcut icon" href="/img/logo.ico" type="image/x-icon">
    <title>RouteLog - Login</title>
</head>
<body>
    <main id="conteudo">
        <div class="esquerda">
            <img src="/img/logo.svg" alt="">
        </div>
        <div class="direita">
            <h1 class="titulo">LOGIN ADMIN</h1>
            @if($msg = Session::get('erro'))
                <div class="msgErro">
                    <p>{{$msg}}</p>
                </div>
            @endif
            <form action="{{route('login.auth')}}" method="post">
                @csrf
                <div class="input">
                    <label for="nome">Usuario</label>
                    <input type="text" name="nome" id="nome">
                    @error('nome')
                        <span class="spanErro">{{$message}}</span>
                    @enderror
                </div>
                <div class="input">
                    <label for="senha">Senha</label>
                    <input type="password" name="password" id="senha">
                    @error('password')
                        <span class="spanErro">{{$message}}</span>
                    @enderror
                </div>


                <button type="submit">EFETUAR LOGIN</button>
            </form>
        </div>
    </main>
</body>
</html>
