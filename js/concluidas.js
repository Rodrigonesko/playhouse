const formPesquisa = document.getElementById('form-pesquisa')

formPesquisa.addEventListener('submit', (e) => {
    e.preventDefault()
    $('#loading').show('fast')
    const pesquisa = document.getElementById('pesquisa').value
    if (!pesquisa) {
        $('#loading').hide('fast')
        return
    }
    $.get('php/concluidas/pesquisa.php', {
        pesquisa
    }, function (data) {
        if (!data) {
            document.getElementById("table-body").innerHTML = 'Nenhum dado encontrado'
        }
        document.getElementById("table-body").innerHTML = data
        $('#loading').hide('fast')
    })
})

const limparFiltro = document.getElementById('limpa-filtro')

limparFiltro.addEventListener('click', e => {
    window.location.reload()
})