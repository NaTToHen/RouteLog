@extends('admin')

@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
@endphp

@section('titulo')
    <div class="tituloPagina">
        <h1>Relatórios</h1>
    </div>
@endsection

@section('conteudo')

    <main id="conteudoProdutos">
        <div class="listaRelatorios">
            <div class="relatorio">
                <h1 class="nomeRelatorio">Produtos cadastrados</h1>
                <a href="" class="linkRelatorio">Gerar PDF<img src="/img/imgdownload.svg" alt="" width="20px"></a>
            </div>
            <div class="relatorio">
                <h1 class="nomeRelatorio">Entregas cadastradas</h1>
                <a href="" class="linkRelatorio">Gerar PDF<img src="/img/imgdownload.svg" alt="" width="20px"></a>
            </div>
            <div class="relatorio">
                <h1 class="nomeRelatorio">Entregas em andamento</h1>
                <a href="" class="linkRelatorio">Gerar PDF<img src="/img/imgdownload.svg" alt="" width="20px"></a>
            </div>
        </div>
    </main>
@endsection
