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
