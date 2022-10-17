const editarConvidado = document.getElementsByClassName('editar-convidado')

Object.values(editarConvidado).forEach(e => {
    e.addEventListener('click', () => {
        const tr = e.parentElement.parentElement

        let nomeConvidado = tr.firstChild.textContent

        console.log(nomeConvidado);

        let input = document.createElement("input")
        input.value = nomeConvidado

    })
})



