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

const decoracao = document.getElementById('decoracao')

const arrInputRadio = [
    'bebida_alcoolica',
    'lembrancinhas',
    'doces_decorados',
    'papelaria',
    'retrospectiva',
    'personagem_externo',
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
            }
        })
    })
})

botaoProximo.addEventListener('click', () => {

    page1.classList.remove('page-step-active')
    page2.classList.add('page-step-active')
    progressBar.style.width = '50%'
    progressStep2.classList.add('progress-step-active')

})

botaoProximo2.addEventListener('click', e => {

    page2.classList.remove('page-step-active')
    page3.classList.add('page-step-active')
    progressBar.style.width = '100%'
    progressStep3.classList.add('progress-step-active')

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

decoracao.addEventListener('click', e => {

    const tdDecoracao = document.getElementsByClassName('decoracao')

    if (decoracao.checked) {
        for (const td of tdDecoracao) {
            $(td).show('fast')
        }
    } else {
        for (const td of tdDecoracao) {
            $(td).hide('fast')
        }
    }
})

/* requisicao ajax  */

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

    $.post(url, {}, function (data) {
        document.getElementById("result").innerHTML = data;
        arrInputRadio.forEach(input => {
            Object.values(document.getElementsByClassName(input)).forEach(element => {
                element.addEventListener('click', () => {
                    if (element.value === 'Sim') {
                        $(`#${input}`).show('fast')
                    } else {
                        $(`#${input}`).hide('fast')
                    }
                })
            })
        })
    })

})

