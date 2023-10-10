<dialog class="modalAddEntrega">
    <div class="conteudoModal">
        <div class="topoModal">
            <h1 class="tituloModal">REGISTRAR ENTREGA</h1>
            <button class="btnSairModal"><img src="/img/iconeBtnSair.svg" alt="" width="30px"></button>
        </div>

        <div class="formModal">
            <form action="{{route('entregas.adicionar')}}" method="post">
                @csrf
                <input type="hidden" name="fk_usuario" class="inputModal" value="{{$user->id}}">
                <select>
                    <option value="">cidade de Inicio</option>
                    @foreach ($cidades as $cidade)
                        <option name="cidadeInicio" value="{{$cidade->id}}">{{$cidade->nome}}</option>
                    @endforeach
                </select>
                <select>
                    <option value="">cidade de Inicio</option>
                    @foreach ($cidades as $cidade)
                        <option name="cidadeDestino" value="{{$cidade->id}}">{{$cidade->nome}}</option>
                    @endforeach
                </select>
                <input placeholder="Fornecedora" type="text" name="fornecedora" class="inputModal">
                <input placeholder="Quantidade" type="number" name="quantidade" class="inputModal quantidade">
                <input placeholder="Valor" type="number" step="0.01" min="0" name="valor" class="inputModal">

                <div class="botoesForm">
                    <button class="cancelarFormAddEntrega" type="button">Cancelar</button>
                    <button class="adicionarFormAddEntrega" type="submit">Registrar Entrega</button>
                </div>
            </form>
        </div>
    </div>
</dialog>
