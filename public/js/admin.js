
//------------------- Geral ------------------
const config = document.querySelector('.config')
const linkDeslogar = document.querySelector('.deslogar')

linkDeslogar.style.display = 'none'
config.addEventListener('click', () => {
    if (linkDeslogar.style.display != 'none') {
        linkDeslogar.style.display = 'none'
    } else {
        linkDeslogar.style.display = 'block'
    }
})



//------------------- Produtos ------------------

const modalCriar = document.querySelector('.modalAddProduto')

const btnSairModal = document.querySelector('.btnSairModal')
const btnCancelarModal = document.querySelector('.cancelarFormAddProduto')

function addModal() {
    modalCriar.showModal()

    btnSairModal.addEventListener('click', () => {
        modalCriar.close()
    })

    btnCancelarModal.addEventListener('click', () => {
        modalCriar.close()
    })
}

function excluirModal(id) {
    const modalExcluir = document.querySelector(`#modalDeletar-${id}`)
    const btnCancelarModalExcluir = document.querySelector(`#modalFechar-${id}`)
    const btnSairModal = document.querySelector(`.modalFechar-${id}`)

    modalExcluir.showModal()

    btnCancelarModalExcluir.addEventListener('click', () => {
        modalExcluir.close()
    })

    btnSairModal.addEventListener('click', () => {
        modalExcluir.close()
    })
}
