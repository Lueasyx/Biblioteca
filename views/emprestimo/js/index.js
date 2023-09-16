/*==================== Search bar ====================*/

function searchLivros(args) {

    let input = document.getElementById('searchbar').value
    input = input.toLowerCase();
    let x = document.getElementsByClassName('livro');

    for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display = "none";
        } else if (input == "") {
            x[i].style.display = "none";
        } else {
            x[i].style.display = "list-item";
        }
    }
}

/*==================== seleção dos params pela URL ====================*/

const urlParams = new URLSearchParams(window.location.search);
const livroId = urlParams.get('livro');

let getValores = recebeData(livroId)
/*==================== Card de livros Search ====================*/

axios.post(BASEURL + "/emprestimo/getLivros").then(res => {
    const container = document.querySelector('#livros');
    var books = res.data;

    books.forEach(item => {
        // console.log(item);
        const card = `<li class="livro" style="display: none" value="${item.id}">
                <div class="card w-100">
                    <div class=" card-body d-flex align-items-center">
                        <input type="checkbox" class="form-check-input" onclick="recebeData(${"livroId"})" name="dataLivros[]" value="${item.id}" id="seleciona" style="margin-right: 1rem;">
                        <div id="card_livro">
                            <h5 class="card-title">${item.titulo}</h5>
                            <p class="card-text">De ${item.autor}</p>
                            <p class="card-text">${item.estoque} Em estoque</p>
                        </div>
                    </div>
                </div>
            </li>`;

        container.innerHTML += card;
    });
});

/*==================== array de livros checkados ====================*/

function recebeData(livroId) {

    const checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
    valores = [];

    valores.push(livroId);

    checkboxes.forEach((checkbox) => {
        valores.push(checkbox.value);
    });

    axios.post(BASEURL + "/emprestimo/livrosSelecionados", valores).then(res => {
        const container = document.querySelectorAll('#livros_selecionados');
        const selecionados = res.data;


        container.innerHTML = '';

        selecionados.forEach(item => {
            const list = `<li class="list-group-item">${item[0].nome} <br> <p>cod. ${item[0].isbn}</p></li>`

            container.innerHTML += list;
        })

    })

    verificarLivro(valores);
    return (valores)
}

console.log(getValores);

/*==================== Enviando formulário ====================*/
function emprestimo() {
    const checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
    const value = [getValores[0],]
    checkboxes.forEach((checkbox) => {
        value.push(checkbox.value);
    });

    const inputRa = document.getElementById("ra");
    const inputRData = document.getElementById("retirada");
    const inputDData = document.getElementById("devolucao");
    const inputs = ["ra", "retirada", "devolucao"];
    const data = {};


    inputs.forEach((inputId) => {
        const inputElement = document.getElementById(inputId);
        if (inputElement) {
            data[inputId] = inputElement.value;
        }
    });

    const jason = [value, data]
    console.log(data)

    const dataJson = JSON.stringify(jason);

    axios.post(BASEURL + "/emprestimo/cadEmprestimo", dataJson).then((res) => {
        // console.log(res)
        var resposta = res.data
        console.log(resposta);

        if (resposta['num'] == 0) {
            alert(resposta['texto']);
        } else {
            alert(resposta['texto']);
        }
    })

    clear();
}

/*==================== Interação com o formulário ====================*/

function verificarLivro(valores) {
    const divForm = document.getElementById("formula");
    // console.log(valores);

    if (valores.length != 0) {
        divForm.style.opacity = '100%';
        divForm.style.pointerEvents = 'auto';
    } else {
        divForm.style.opacity = '0.5';
        divForm.style.pointerEvents = 'none';
    }
}

function clear() {
    document.getElementById('nome').value = '';
    document.getElementById('ra').value = '';
    document.getElementById('retirada').value = '';
    document.getElementById('devolucao').value = '';
}
