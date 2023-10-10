
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

const btnCriar = document.querySelector('.btnCriar')
const modalCriar = document.querySelector('.modalAddProduto')

const btnSairModal = document.querySelector('.btnSairModal')
const btnCancelarModal = document.querySelector('.cancelarFormAddProduto')

function addModal() {
    btnCriar.addEventListener('click', () => {
        modalCriar.showModal()
        console.log('teste')
    })

    btnSairModal.addEventListener('click', () => {
        modalCriar.close()
    })

    btnCancelarModal.addEventListener('click', () => {
        modalCriar.close()
    })
}

addModal()

function excluirModal(id) {
    const modalExcluir = document.querySelector(`#modalDeletar-${id}`)
    const btnCancelarModalExcluir = document.querySelector(`#modalFechar-${id}`)
    const btnSairModal = document.querySelector(`.modalFechar-${id}`)

    modalExcluir.showModal()
    console.log('teste')

    btnCancelarModalExcluir.addEventListener('click', () => {
        modalExcluir.close()
        console.log('teste')
    })

    btnSairModal.addEventListener('click', () => {
        modalExcluir.close()
        console.log('teste')
    })
}

// ------------------- Excluir Produto Modal

