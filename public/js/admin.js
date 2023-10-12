
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


// ------------------ Entregas ---------------------------------------------------

function mudaStatus() {
    const statusEntrega = document.querySelectorAll('.statusEntrega')

    statusEntrega.forEach((status) => {
        if (status.textContent == 'Em andamento') {
            status.classList.toggle('emAndamento')
        } else if (status.textContent == 'Entregue') {
            status.classList.toggle('entregue')
        } else if(status.textContent == 'Cancelada') {
            status.classList.toggle('cancelada')
        }
    })
}

function verificaValor() {
    const valorEntrega = document.querySelectorAll('.valorEntrega')

    valorEntrega.forEach((valor) => {
        if (valor.textContent == 'R$ 0') {
            valor.classList.toggle('semEstoque')
        }
    })
}

mudaStatus()
verificaValor()

setTimeout(function() {
    $('.toast').fadeOut('fast');
}, 5000);

