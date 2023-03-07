const editarConvidado = document.getElementsByClassName('editar-convidado')
const salvarConvidado = document.getElementsByClassName('salvar-convidado')

Object.values(editarConvidado).forEach(e => {
    e.addEventListener('click', () => {
        const tr = e.parentElement.parentElement

        console.log(e.value);

        let nomeConvidado = tr.firstChild.textContent
        let idadeConvidado = tr.children[1].textContent

        let input = document.createElement("input")
        input.classList.add('input')
        input.value = nomeConvidado

        tr.children[0].removeChild(tr.children[0].firstChild)
        tr.children[0].appendChild(input)

        let inputIdade = document.createElement('input')
        inputIdade.classList.add('input')
        inputIdade.style.width = '30%'
        input.style.textAlign = 'center'
        inputIdade.value = idadeConvidado

        tr.children[1].removeChild(tr.children[1].firstChild)
        tr.children[1].appendChild(inputIdade)

        //tr.lastChild.firstChild.classlist.remove('none')
        let salvar = document.createElement('button')
        salvar.classList.add('salvar-convidado')
        salvar.textContent = 'Salvar'
        e.classList.add('none')

        tr.lastChild.appendChild(salvar)

        console.log(salvar);

        salvar.addEventListener('click', () => {

            let ajax = new XMLHttpRequest()

            ajax.open('GET', `php/controleEntrada/atualizarConvidado.php?id=${e.value}&idade=${inputIdade.value}&nome=${input.value}`)

            ajax.send()

            ajax.addEventListener('readystatechange', () => {
                if(ajax.readyState === 4 && ajax.status === 200){
                    if(ajax.response === 'ok'){
                        let msg = document.createElement('p')
                        msg.textContent = 'Convidado atualizado com sucesso!'
                        msg.classList.add('success')
                        document.getElementById('convidado-atualizado').appendChild(msg)
                        
                    }
                }
            })

            e.classList.remove('none')
            salvar.classList.add('none')
            tr.firstChild.textContent = input.value
            tr.children[1].textContent = inputIdade.value
        })

    })
})





