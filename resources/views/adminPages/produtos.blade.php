@extends('admin')

@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
@endphp

@section('titulo')
    <div class="tituloPagina">
        <h1>Produtos cadastrados</h1>
    </div>
@endsection

@section('conteudo')
    <main id="conteudoProdutos">
        <div class="botoesProdutos">
            <input type="text" class="btnPesquisa" placeholder="Pesquisar produto">
            <button class="btnCriar">Criar Produto</button>
        </div>
        <table class="tabelaProdutos">
            <thead>
                <tr class="topoTabela">
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td>Fornecedora</td>
                    <td>Quantidade</td>
                    <td>Valor</td>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr class="linhaTabela">
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->descricao}}</td>
                        <td>{{$produto->fornecedora}}</td>
                        <td>{{$produto->quantidade}}</td>
                        <td>R$ {{$produto->valor}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
