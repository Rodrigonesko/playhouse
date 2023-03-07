const arrInputRadio = [
    'outra-mesa-boas-vindas',
    'outra-entrada',
    'outra-bebida-extra',
    'outra-opcao-salgado',
    'outra-opcao-doce',
]

arrInputRadio.forEach(input => {
    Object.values(document.getElementsByClassName(input)).forEach(element => {
        element.addEventListener('click', () => {
            if (element.value === 'Sim') {
                $(`#${input}`).show('fast')
            } else {
                $(`#${input}`).hide('fast')
                $(`#${input}`).val('')
            }
        })
    })
})