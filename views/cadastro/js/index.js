/*==================== Autores cadastrados ====================*/
// function listAutores() {
const autor_input = document.querySelector("#autor");


axios.post(BASEURL + "/cadastro/getAutor").then((res) => {
    var autores = res.data;
    autor_input.innerHTML = '<option value="">--Selecione uma opção--</option> <option value="0">--Não achei meu autor--</option>';

    autores.forEach((item) => {
        // console.log(item);
        var autor = `<option value="${item.id}">${item.autor}</option>`;

        autor_input.innerHTML += autor;
    });
});
// }

/*==================== Autores não cadastrados ====================*/

function verificarAutor() {
    const inputElement = document.getElementById("autor");
    const inputCad = document.getElementById("nome");
    const btnEnviar = document.getElementById("cadastrar");
    const btnCad = document.getElementById("cadastrarAutor");
    const inputValue = inputElement.value;

    if (inputValue === "0") {
        btnEnviar.disabled = true;
        inputCad.disabled = false;
        btnCad.disabled = false;
    } else {
        btnEnviar.disabled = false;
        inputCad.disabled = true;
        btnCad.disabled = true;
    }
}

/*==================== Enviando formulário ====================*/

function enviaForm() {
    // const inputElement = document.getElementById("autor");
    const inputs = ["isbn", "titulo", "edicao", "estoque", "autor"];
    const data = {};

    inputs.forEach((inputId) => {
        const inputElement = document.getElementById(inputId);
        if (inputElement) {
            data[inputId] = inputElement.value;
        }
    });

    const dataJson = JSON.stringify(data);
    axios.post(BASEURL + "/cadastro/cadLivro", dataJson).then((res) => {
        var resposta = res.data
        // console.log(resposta);

        if (resposta['num'] == 0) {
            alert(resposta['texto']);
        } else {
            alert(resposta['texto']);
        }
    })
    // console.log(dataJson);
}
/*==================== Cadastrando Autor ====================*/

function cadastraAutor() {
    const inputElement = document.getElementById('nome');
    const inputs = ['nome'];
    const data = {};

    inputs.forEach(inputId => {
        const inputElement = document.getElementById(inputId);
        if (inputElement) {
            data[inputId] = inputElement.value;
        }
    });

    const dataJson = JSON.stringify(data);
    // console.log(dataJson);

    axios.post(BASEURL + "/cadastro/cadAutor", dataJson).then((res) => {
        var resposta = res.data
        // console.log(resposta);

        if (resposta['num'] == 0) {
            alert(resposta['texto']);
        } else {
            alert(resposta['texto']);
        }
    });
}