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
            <button class="btnCriar" onclick="addModalEntrega()">Registrar Entrega</button>
        </div>
        <div class="tabelaDiv tabelaEntrega">
            <p class="numEntregas">{{$numEntregas}} entregas cadastradas</p>
            <p class="avisoEstoque">*Se o valor total estiver em R$ 0 a quantidade é maior que em estoque.</p>
            <table class="tabelaProdutos">
                <thead>
                <tr class="topoTabela">
                    <td>ID</td>
                    <td>Inicio</td>
                    <td>Destino</td>
                    <td>Motorista</td>
                    <td>Data Estimada</td>
                    <td>Produto</td>
                    <td>Quantidade</td>
                    <td>Valor</td>
                    <td>Status</td>
                </tr>
                </thead>
                <tbody>
                @foreach($entregas as $entrega)
                    @include('adminPages.entregas.editar')
                    <tr class="linhaTabela" onclick="editarEntregaModal({{$entrega->id}})">
                        <td>{{$entrega->id}}</td>
                        <td>{{$entrega->nome_loja}}</td>
                        <td>{{$entrega->cidadeDestino}} - RS</td>
                        <td>{{$entrega->nome_motorista}}</td>
                        <td>{{$entrega->dataChegada}}</td>
                        <td>{{$entrega->nome_produto}}</td>
                        <td>{{$entrega->quantidadeProdutos}}</td>
                        <td class="valorEntrega">R$ {{$entrega->valorTotal}}</td>
                        <td class="statusEntrega">{{$entrega->statusEntrega}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
