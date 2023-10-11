@extends('admin')

@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
@endphp

@section('titulo')
    <div class="tituloPagina">
        <h1>Entregas em andamento</h1>
    </div>
@endsection

@section('conteudo')

    @if($errors->any())
        <div class="msgErro toast">
            <p>Erro ao cadastrar entrega.</p>
        </div>
    @endif
    @if(session('success'))
        <div class="msgSucesso toast">
            <p>{{session('success')}}</p>
        </div>
    @endif

    @include('adminPages.entregas.adicionar')

    <main id="conteudoProdutos">
        <div class="botoesProdutos">
            <form method="post" action=""><input type="text" class="btnPesquisa" placeholder="Pesquisar entrega por nome"></form>
            <button class="btnCriar" onclick="addModalEntrega()">Registrar Entrega</button>
        </div>
        <div class="tabelaDiv">
            <table class="tabelaProdutos">
                <thead>
                <tr class="topoTabela">
                    <td>ID</td>
                    <td>Inicio</td>
                    <td>Destino</td>
                    <td>Motorista</td>
                    <td>Data Estimada</td>
                    <td>Valor</td>
                    <td>Status</td>
                </tr>
                </thead>
                <tbody>
                @foreach($entregas as $entrega)
                    <tr class="linhaTabela">
                        <td>{{$entrega->id}}</td>
                        <td>{{$entrega->nome}}</td>
                        <td>{{$entrega->descricao}}</td>
                        <td>{{$entrega->fornecedora}}</td>
                        <td>{{$entrega->quantidade}}</td>
                        <td>R$ {{$entrega->valor}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
