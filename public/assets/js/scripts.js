document.getElementById("add").addEventListener("click", () => {
    numeroText = document.getElementById('col-n');
    document.getElementById("col-n").innerHTML += `<h2 class="form-input">`+ numeroText.children.length +`</h2>`;

    nomeInput = `<input class="form-input" type="text" name="nomes[]" placeholder="Nome Completo" required>`;
    document.getElementById("col-nome").innerHTML += nomeInput;

    idadeInput = `<input class="form-input" type="number" name="idades[]" placeholder="Idade" required>`;
    document.getElementById("col-idade").innerHTML += idadeInput;

    if (numeroText.children.length > 0) {
        document.querySelector('#btn-enviar').disabled = false;
    }
});

document.getElementById("remove").addEventListener("click", () => {
    let numeroText = document.getElementById('col-n');
    numeroText.removeChild(numeroText.lastElementChild);

    let nomeInput = document.getElementById('col-nome');
    nomeInput.removeChild(nomeInput.lastElementChild);

    let idadeInput = document.getElementById('col-idade');
    idadeInput.removeChild(idadeInput.lastElementChild);

    if (numeroText.children.length < 1) {
        document.querySelector('#btn-enviar').disabled = true;
    }
});