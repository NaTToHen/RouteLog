<dialog class="modalAddEntrega" id="modalEditarEntrega-{{$entrega->id}}">
    <div class="conteudoModal">
        <div class="topoModal">
            <h1 class="tituloModal">EDITAR ENTREGA</h1>
            <button class="btnSairModal modalFechar-{{$entrega->id}}"><img src="/img/iconeBtnSair.svg" alt="" width="30px"></button>
        </div>

        <div class="formModal">
            <form action="{{route('entregas.editar', $entrega->id)}}" method="post">
                @csrf
                <input type="hidden" name="fk_usuario" class="inputModal" value="{{$user->id}}">
                <select class="selectForm" name="fk_loja">
                    <option value="" disabled selected>Estoque</option>
                    @foreach ($lojas as $loja)
                        <option value="{{$loja->id}}">{{$loja->nome}}</option>
                    @endforeach
                </select>
                <select class="selectForm" name="cidadeDestino">
                    <option value="" disabled selected>Cidade de Destino</option>
                    @foreach ($cidades as $cidade)
                        <option value="{{$cidade['nome']}}">{{$cidade['nome']}}</option>
                    @endforeach
                </select>
                <select class="selectForm" name="fk_motorista">
                    <option value="" disabled selected>Motorista</option>
                    @foreach ($motoristas as $motorista)
                        <option value="{{$motorista->id}}">{{$motorista->nome}} - {{$motorista->caminhao}}</option>
                    @endforeach
                </select>
                <input placeholder="Data estimada de entrega" type="date" name="dataChegada" class="inputModal">
                <select class="selectForm" name="fk_produto" >
                    <option value="" disabled selected>Produto</option>
                    @foreach ($produtos as $produto)
                        <option value="{{$produto->id}}">{{$produto->nome}} - R$ {{$produto->valor}}</option>
                    @endforeach
                </select>
                <input placeholder="Quantidade" type="number" name="quantidadeProdutos" class="inputModal quantidade" value="{{$entrega->quantidadeProdutos}}">
                <select class="selectForm" name="statusEntrega">
                    <option value="" disabled selected>Status</option>
                    <option value="Em andamento">Em andamento</option>
                    <option value="Entregue">Entregue</option>
                    <option value="Cancelada">Cancelada</option>
                </select>

                <div class="botoesForm">
                    <button class="cancelarFormAddEntrega btnCancelar" id="modalFechar-{{$entrega->id}}" type="button">Cancelar</button>
                    <button class="adicionarFormAddEntrega btnConfirmar" type="submit">Editar Entrega</button>
                </div>
            </form>
        </div>
    </div>
</dialog>
