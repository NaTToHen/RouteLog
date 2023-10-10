<dialog id="modalEditar-{{$produto->id}}" class="modalEditarProduto">
    <div class="conteudoModal">
        <div class="topoModal">
            <h1 class="tituloModal">EDITAR PRODUTO</h1>
            <button class="btnSairModal modalFechar-{{$produto->id}}"
                    onclick="
                    const modal = document.querySelector('#modalEditar-{{$produto->id}}')
                    modal.close()
                    "
            ><img src="/img/iconeBtnSair.svg" alt="" width="30px"></button>
        </div>

        <div class="formModal">
            <form action="{{route('produto.editar', $produto->id)}}" method="post">
                @csrf
                <input type="hidden" name="fk_usuario" class="inputModal" value="{{$user->id}}">
                <input placeholder="Nome" type="text" name="nome" class="inputModal inputEditar" value="{{$produto->nome}}">
                <input placeholder="Descrição" type="text" name="descricao" class="inputModal inputEditar" value="{{$produto->descricao}}">
                <input placeholder="Fornecedora" type="text" name="fornecedora" class="inputModal inputEditar" value="{{$produto->fornecedora}}">
                <input placeholder="Quantidade" type="number" name="quantidade" class="inputModal inputEditar quantidade" value="{{$produto->quantidade}}">
                <input placeholder="Valor" type="number" step="0.01" min="0" name="valor" class="inputModal inputEditar" value="{{$produto->valor}}">

                <div class="botoesForm">
                    <button id="modalFechar-{{$produto->id}}" class="cancelarFormEditaProduto" type="button"
                        onclick="
                        const modal = document.querySelector('#modalEditar-{{$produto->id}}')
                        modal.close()
                        "
                    >Cancelar</button>
                    <button class="adicionarFormEditaProduto" type="submit">Editar Produto</button>
                </div>
            </form>
        </div>
    </div>
</dialog>
