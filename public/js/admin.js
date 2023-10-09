
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

function excluirModal() {
    const modalExcluir = document.querySelector('.modalExcluir')
    const btnCancelarModalExcluir = document.querySelector('.ntbCancelarExcluir')

    btnCriar.addEventListener('click', () => {
        modalExcluir.showModal()
        console.log('teste')
    })

    btnCancelarModalExcluir.addEventListener('click', () => {
        modalExcluir.close()
    })
}

excluirModal()

// ------------------- Excluir Produto Modal

