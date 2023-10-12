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

    @if($errors->any())
        <div class="msgErro toast">
            <p>Erro ao cadastrar produto.</p>
        </div>
    @endif
    @if(session('success'))
        <div class="msgSucesso toast">
            <p>{{session('success')}}</p>
        </div>
    @endif

    @include('adminPages.produtos.adicionar')

    <main id="conteudoProdutos">
        <div class="botoesProdutos">
            <form action="{{route('admin.produtos')}}" method="get">
                @csrf
                <input type="text" name="pesquisado" class="btnPesquisa" placeholder="Pesquisar produto por nome">
            </form>
            <button class="btnCriar" onclick="addModal()">Criar Produto</button>
        </div>
        <h1 class="numProdutos">{{$numProdutos}} produtos cadastrados</h1>
        <div class="tabelaDiv">
            <table class="tabelaProdutos">
                <thead>
                <tr class="topoTabela">
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td>Fornecedora</td>
                    <td>Quantidade</td>
                    <td>Valor</td>

                    <td class="icone">Excluir</td>
                    <td class="icone">Editar</td>
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

                        <td class="icone btnExcluirProduto"><a onclick="excluirModal({{$produto->id}})"><img src="/img/iconeExcluir.svg" alt="" width="30px"></a></td>
                        @include('adminPages.produtos.excluir')

                        <td class="icone btnEditarProduto"><a onclick="editarModal({{$produto->id}})"><img src="/img/iconeEditar.svg" alt="" width="30px"></a></td>
                        @include('adminPages.produtos.editar')

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
