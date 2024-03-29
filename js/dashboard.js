const buttonAbrirModal = document.getElementsByClassName('abrir-modal')
const buttonFecharModalConcluir = document.getElementById('fechar-modal-concluir')
const modal = document.getElementById('modal-finalizar')
let spanIdFesta = document.getElementById('id-festa')
let spanContratante = document.getElementById('contrante-festa')
let buttonConcluirFesta = document.getElementById('concluir-festa')
const buttonNaoPagas = document.getElementById('btn-festas-nao-pagas')
const modalNaoPagas = document.getElementById('modal-festas-nao-pagas')

const buttonAdicionarPagamento = document.getElementsByClassName('button-adicionar-pagamento')

window.onload = () => {
    modalNaoPagas.showModal()
}

buttonNaoPagas.onclick = () => {
    modalNaoPagas.close()
}

Object.values(buttonAbrirModal).forEach(e => {
    e.addEventListener('click', () => {
        modal.showModal()

        let value = e.value
        value = value.split('-')
        let id = value[0]
        let contratante = value[1]

        spanIdFesta.textContent = id
        spanContratante.textContent = contratante

        buttonConcluirFesta.value = id

    })
})

buttonFecharModalConcluir.onclick = () => {
    modal.close()
}

Object.values(buttonAdicionarPagamento).forEach(e => {
    e.addEventListener('click', () => {
        const valorAdicionado = e.previousElementSibling.value
        const id = e.value
        const loading = e.nextElementSibling
        loading.classList.remove('none')
        $.post(`php/dashboard/adicionarPagamento.php?id=${id}`, {
            valorAdicionado
        }, function (data) {
            console.log(data);
            if (data === 'alterado') {
                window.location.reload()
            }
        })
    })
})

const formPesquisa = document.getElementById('form-pesquisa')

formPesquisa.addEventListener('submit', (e) => {
    e.preventDefault()
    $('#loading').show('fast')
    const pesquisa = document.getElementById('pesquisa').value
    if (!pesquisa) {
        $('#loading').hide('fast')
        return
    }
    $.get('php/dashboard/pesquisa.php', {
        pesquisa
    }, function (data) {
        if (!data) {
            document.getElementById("table-body").innerHTML = 'Nenhum dado encontrado'
        }
        document.getElementById("table-body").innerHTML = data
        $('#loading').hide('fast')
        Object.values(buttonAbrirModal).forEach(e => {
            e.addEventListener('click', () => {
                modal.showModal()

                let value = e.value
                value = value.split('-')
                let id = value[0]
                let contratante = value[1]

                spanIdFesta.textContent = id
                spanContratante.textContent = contratante

                buttonConcluirFesta.value = id

            })
        })
    })
})

const limparFiltro = document.getElementById('limpa-filtro')

limparFiltro.addEventListener('click', e => {
    window.location.reload()
})