<dialog class="modalExcluir excluir">
    <div class="conteudoModalAddProduto">
        <div class="topoModal">
            <h1 class="tituloModal">ADICIONAR PRODUTO</h1>
            <button class="btnSairModal"><img src="/img/iconeBtnSair.svg" alt="" width="30px"></button>
        </div>

        <div class="formAddProduto">
            <form action="{{route('admin.excluiProdutos', $produto->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" class="inputModal" value="{{$produto->id}}">
                <p class="textoModalExcluir">Tem certeza que quer excluir o produto: {{$produto->nome}}?</p>
                <div class="botoesFormAddProduto">
                    <button class="btnCancelarExcluir" type="button">Cancelar</button>
                    <button class="btnExcluirModal" type="submit">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</dialog>
