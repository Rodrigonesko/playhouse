const inputsValor = document.getElementsByClassName('valor')
const spanValorTotal = document.getElementById('valor-total')

let valorTotal = 0

for (const element of inputsValor) {
    console.log(element.value);
    valorTotal += +element.value
}

spanValorTotal.innerHTML = valorTotal

