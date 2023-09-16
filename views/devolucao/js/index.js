/*==================== Card de livros Search ====================*/

function livrosAlugados() {
    const input = document.getElementById('ra').value
    const data = JSON.stringify(input);

    console.log(data);
    axios.post(BASEURL + "/devolucao/getLivrosAlugados", data).then(res => {
        // res = JSON.parse(res)

        // console.log(res);
        const container = document.querySelector('#listdevolucao');
        var books = res.data;

        container.innerHTML = '';

        console.log(books);

        books.forEach(item => {
            // console.log(item);
            const card = `<li class="livro" style="list-style-type: none;">
                        <div class="card w-100">
                            <div class=" card-body d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input" onclick="verificaEmprestimo(this)" name="dataLivros[]"
                                    value="${item.emprestimoId}_${item.livroId}" id="seleciona" style="margin-right: 1rem;">
                                    <div id="card_livro">
                                        <h5 class="card-title">${item.livro}</h5>
                                        <p class="card-text">De ${item.autor}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center" style="flex-direction: column;">
                                    <h4>Tempo restante</h4>
                                    <h1>${item.expiracao} dias</h1>
                                </div>
                            </div>
                        </div>
                    </li>`;
            container.innerHTML += card;
        })
    });
}

function verificaEmprestimo() {
    const checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
    let valores = [];

    checkboxes.forEach((checkbox) => {
        let check = checkbox.value.split('_');
        let nha = {
            'idEmprestimo': check[0],
            'idLivro': check[1]
        }
        valores.push(nha)
    });

    // console.log(valores)

    return (valores)
}

function confirmarDevolucao() {
    const objetos = verificaEmprestimo();

    axios.post(BASEURL + "/devolucao/getMulta", objetos).then((res) => {

        var resposta = res.data.data
        var multa = res.data.multas
        var sumMulta = 0;

        for (let i = 0; i < multa.length; i++) {
            sumMulta += parseFloat(multa[i]);
        }

        const multaFormatada = sumMulta.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

        // console.log(multaFormatada)

        if (resposta['num'] == 0) {
            alert(resposta['texto']);
        } else {
            alert("Devolução Feito com sucesso! Devido ao atraso, foi gerada uma multa de " + multaFormatada);
        }

    })

};