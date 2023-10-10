<dialog class="modalAddProduto">
    <div class="conteudoModal">
        <div class="topoModal">
            <h1 class="tituloModal">ADICIONAR PRODUTO</h1>
            <button class="btnSairModal"><img src="/img/iconeBtnSair.svg" alt="" width="30px"></button>
        </div>

        <div class="formModal">
            <form action="{{route('admin.addProdutos')}}" method="post">
                @csrf
                <input type="hidden" name="fk_usuario" class="inputModal" value="{{$user->id}}">
                <input placeholder="Nome" type="text" name="nome" class="inputModal">
                <input placeholder="Descrição" type="text" name="descricao" class="inputModal">
                <input placeholder="Fornecedora" type="text" name="fornecedora" class="inputModal">
                <input placeholder="Quantidade" type="number" name="quantidade" class="inputModal quantidade">
                <input placeholder="Valor" type="number" step="0.01" min="0" name="valor" class="inputModal">

                <div class="botoesForm">
                    <button class="cancelarFormAddProduto" type="button">Cancelar</button>
                    <button class="adicionarFormAddProduto" type="submit">Criar Produto</button>
                </div>
            </form>
        </div>
    </div>
</dialog>
