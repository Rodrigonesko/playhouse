const btnInfoFesta = document.getElementById('btn-info-festa')
const btnInfoFornecedores = document.getElementById('btn-info-fornecedores')
const btnInfoCardapio = document.getElementById('btn-info-cardapio')
const btnInfoEscala = document.getElementById('btn-info-escala')
const mainSection = document.getElementById('section-details-container')

/* Ajax*/ 

const urlAtual = window.location.href

const urlClass = new URL(urlAtual)

const id = urlClass.searchParams.get('id')

let ajax = new XMLHttpRequest()

btnInfoFesta.addEventListener('click', ()=>{
    const path = `components/infoFesta.php?id=${id}`
    ajax.open('GET', path, true)
    ajax.onreadystatechange = ()=>{
        if(ajax.readyState == 4 && ajax.status == 200) {
            const returnData = ajax.responseText
            mainSection.innerHTML = returnData
        }
    }

    ajax.send()

})

btnInfoFornecedores.addEventListener('click', ()=>{
    const path = `components/infoFornecedores.php?id=${id}`
    ajax.open('GET', path, true)
    ajax.onreadystatechange = ()=>{
        if(ajax.readyState == 4 && ajax.status == 200) {
            const returnData = ajax.responseText
            mainSection.innerHTML = returnData
        }
    }

    ajax.send()
})

btnInfoCardapio.addEventListener('click', ()=>{
    const path = `components/infoCardapio.php?id=${id}`
    ajax.open('GET', path, true)
    ajax.onreadystatechange = ()=>{
        if(ajax.readyState == 4 && ajax.status == 200) {
            const returnData = ajax.responseText
            mainSection.innerHTML = returnData
        }
    }

    ajax.send()
})