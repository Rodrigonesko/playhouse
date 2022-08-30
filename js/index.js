/* page 1 */

const botaoProximo = document.getElementById('btn-next-1')
const botaoProximo2 = document.getElementById('btn-next-2')
const botaoRegistrar = document.getElementById('btn-registrar')
const botaoAnterior = document.getElementById('btn-prev-1')
const botaoAnterior2 = document.getElementById('btn-prev-2')
const page1 = document.getElementById('page-1')
const page2 = document.getElementById('page-2')
const page3 = document.getElementById('page-3')
const progressBar = document.getElementById('progress')
const progressStep2 = document.getElementById('progress-step-2')
const progressStep3 = document.getElementById('progress-step-3')

const page1Items = document.getElementsByClassName('page-1-input')
const page2Items = document.getElementsByClassName('page-2-input')


botaoProximo.addEventListener('click', () => {

    let flag = 0

    Object.values(page1Items).forEach(e => {
        if (e.value !== '') {
            e.parentElement.classList.remove('sem-preencher')

        } else {
            e.parentElement.classList.add('sem-preencher')
            flag++

        }
    })

    if (flag === 0) {
        page1.classList.remove('page-step-active')
        page2.classList.add('page-step-active')
        progressBar.style.width = '50%'
        progressStep2.classList.add('progress-step-active')
    }

    console.log(flag);

})

botaoProximo2.addEventListener('click', e => {

    let flag = 0

    Object.values(page2Items).forEach(e => {
        if (e.value !== '') {
            e.parentElement.classList.remove('sem-preencher')


        } else {
            e.parentElement.classList.add('sem-preencher')
            flag++
        }
    })

    if (flag === 0) {
        page2.classList.remove('page-step-active')
        page3.classList.add('page-step-active')
        progressBar.style.width = '100%'
        progressStep3.classList.add('progress-step-active')
    }
})

botaoAnterior.addEventListener('click', e => {
    page2.classList.remove('page-step-active')
    page1.classList.add('page-step-active')
    progressBar.style.width = '0%'
    progressStep2.classList.remove('progress-step-active')
})


botaoAnterior2.addEventListener('click', e => {
    page3.classList.remove('page-step-active')
    page2.classList.add('page-step-active')
    progressBar.style.width = '50%'
    progressStep3.classList.remove('progress-step-active')
})

/* requisicao ajax  */

let ajax = new XMLHttpRequest()

let tipoFesta = document.getElementById('tipo_festa')
let valorTipoFesta
let url
tipoFesta.addEventListener('change', e => {
    valorTipoFesta = tipoFesta.value
    console.log(valorTipoFesta);
    if (valorTipoFesta === 'week') {
        url = 'components/cardapioWeek.php'
    }
    if (valorTipoFesta === 'light') {
        url = 'components/cardapioLight.php'
    }
    if (valorTipoFesta === 'play') {
        url = 'components/cardapioPlay.php'
    }

    if (valorTipoFesta === 'house') {
        url = 'components/cardapioHouse.php'
    }

    ajax.open("POST", url, true)
    ajax.onreadystatechange = () => {
        console.log(ajax);

        if (ajax.readyState == 4 && ajax.status == 200) {
            var returnData = ajax.responseText;
            document.getElementById("result").innerHTML = returnData;
        }

    }

    ajax.send()


})