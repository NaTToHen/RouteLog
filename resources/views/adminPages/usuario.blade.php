@extends('admin')

@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user()
@endphp

@section('titulo')
    <div class="tituloPagina">
        <h1>Usuário</h1>
    </div>
@endsection

@section('conteudo')
    <main id="conteudoUser">
        <div class="infosUsuario">
            <img src="{{$user->foto}}" class="fotoUsuario" alt="">
            <div class="textosUsuario">
                <h1 class="nomeUsuario">{{$user->nome}}</h1>
                <h2 class="idUsuario">Id: {{$user->id}}</h2>
                <div class="numProdutosUsuario">22 Produtos</div>
            </div>
        </div>
        <div class="formUsuario">
            <input type="text" name="nome" disabled="" value="{{$user->nome}}">
            <input type="text" name="nome" disabled="" value="Email: {{$user->email}}">
            <input type="text" name="nome" disabled="" value="Criado em {{$user->created_at}}">
        </div>
    </main>
@endsection
