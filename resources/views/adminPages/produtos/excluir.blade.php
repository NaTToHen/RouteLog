<link rel="stylesheet" href="css/modal.css">

<dialog id="modalDeletar-{{$produto->id}}" class="modalExcluir">
    <div class="conteudoModal">
        <div class="topoModal">
            <h1 class="tituloModal">EXCLUIR PRODUTO</h1>
            <button class="btnSairModal modalFechar-{{$produto->id}}"><img src="/img/iconeBtnSair.svg" alt="" width="30px"></button>
        </div>

        <div class="formModal">
            <form action="{{route('produto.excluir', $produto->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" class="inputModal" value="{{$produto->id}}">
                <p class="textoModal">Tem certeza que quer excluir o produto: {{$produto->nome}}?</p>
                <div class="botoesForm">
                    <button id="modalFechar-{{$produto->id}}" class="btnCancelarModalExcluir" type="button">Cancelar</button>
                    <button class="btnExcluirModal" type="submit">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</dialog>
