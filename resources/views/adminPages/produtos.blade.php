@extends('admin')

@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();

    $produto = Produto::All();
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
            <tr class="topoTabela">
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Fornecedora</th>
                <th>Quantidade</th>
                <th>Valor</th>
            </tr>

            <tr>
                <td>{{}}</td>
            </tr>
        </table>
    </main>
@endsection
