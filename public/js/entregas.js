const modalCriar = document.querySelector('.modalAddEntrega')

const btnSairModal = document.querySelector('.btnSairModal')
const btnCancelarModal = document.querySelector('.cancelarFormAddEntrega')

function addModalEntrega() {
    modalCriar.showModal()

    btnSairModal.addEventListener('click', () => {
        modalCriar.close()
    })

    btnCancelarModal.addEventListener('click', () => {
        modalCriar.close()
    })
}
