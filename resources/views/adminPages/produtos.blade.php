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

    <dialog class="modalAddProduto">
        <div class="conteudoModalAddProduto">
            <div class="topoModal">
                <h1 class="tituloModal">ADICIONAR PRODUTO</h1>
                <button class="btnSairModal"><img src="/img/iconeBtnSair.svg" alt="" width="30px"></button>
            </div>

            <div class="formAddProduto">
                <form action="/produtos/adicionar" method="post">
                    @csrf
                    <input placeholder="Nome" type="text" name="nome" class="inputModal">
                    <input placeholder="Descrição" type="text" name="descricao" class="inputModal">
                    <input placeholder="Fornecedora" type="text" name="fornecedora" class="inputModal">
                    <input placeholder="Quantidade" type="number" name="quantidade" class="inputModal quantidade">
                    <input placeholder="Valor" type="number" step="0.01" min="0" name="valor" class="inputModal">

                    <div class="botoesFormAddProduto">
                        <button class="cancelarFormAddProduto" type="button">Cancelar</button>
                        <button class="adicionarFormAddProduto" type="submit">Criar Produto</button>
                    </div>
                </form>
            </div>
        </div>


    </dialog>

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

                        <td class="icone"><a href="/excluir/{{$produto->id}}"><img src="/img/iconeExcluir.svg" alt="" width="30px"></a></td>
                        <td class="icone"><a href="/editar/{{$produto->id}}"><img src="/img/iconeEditar.svg" alt="" width="30px"></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
