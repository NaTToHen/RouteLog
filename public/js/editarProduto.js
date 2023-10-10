function editarModal(id) {
    const modalEditar = document.querySelector(`#modalEditar-${id}`)
    const btnCancelarModalEditar = document.querySelector(`#modalFechar-${id}`)
    const btnSairModal = document.querySelector(`.modalFechar-${id}`)

    modalEditar.showModal()

    btnCancelarModalEditar.addEventListener('click', () => {
        modalEditar.close()
    })

    btnSairModal.addEventListener('click', () => {
        modalEditar.close()
    })
}
