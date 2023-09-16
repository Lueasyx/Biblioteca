/*==================== SHOW NAVBAR ====================*/
const showMenu = (headerToggle, navbarId) => {
    const toggleBtn = document.getElementById(headerToggle),
        nav = document.getElementById(navbarId)

    // Validate that variables exist
    if (headerToggle && navbarId) {
        toggleBtn.addEventListener('click', () => {
            // We add the show-menu class to the div tag with the nav__menu class
            nav.classList.toggle('show-menu')
            // change icon
            toggleBtn.classList.toggle('bx-x')
        })
    }
}
showMenu('header-toggle', 'navbar')

/*==================== LINK ACTIVE ====================*/
const linkColor = document.querySelectorAll('.nav__link')

function colorLink() {
    linkColor.forEach(l => l.classList.remove('active'))
    this.classList.add('active')
}

linkColor.forEach(l => l.addEventListener('click', colorLink))


/*==================== Book Cards ====================*/

axios.post(BASEURL + "/index/getLivros").then(res => {
    const container = document.querySelector('#livros');
    var books = res.data;

    books.forEach(item => {
        // console.log(item);
        const card = `<div class="col-4" id="${item.titulo}" name="livro">
        <div class="card mb-3" style="max-width: 540px;">
        <div class="card-body">
        <h5 class="card-title">${item.titulo}</h5>
        <p class="card-text">Autor: ${item.autor}<br> ISBN: ${item.isbn}<br> ${item.edicao}º edição</p>
        <p class="card-text"><small class="text-muted">Quantidade em estoque: ${item.estoque}</small></p>
        <div class="d-flex justify-content-between align-items-center flex-wrap">
        <button value="${item.id}" class="btn btn-primary" onclick="sendParam(value)" type="button">Alugar</button>
        <i class="bx bx-heart nav__icon" id="like" style="margin-left: 5rem; font-size: 1.5rem;"></i>
        </div>
        </div>
        </div>
        </div>`;

        container.innerHTML += card;
    })

})

/*==================== search ====================*/
function search() {
    let input = document.getElementById('searchbar').value
    input = input.toLowerCase();
    let x = document.getElementsByName('livro');

    for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display = "none";
        }
        else {
            x[i].style.display = "list-item";
            x[i].style.listStyle = "none";
        }
    }
}

/*==================== Passar parametros para locação ====================*/

function sendParam(param) {

    var link = BASEURL + '/emprestimo?livro=' + param;
    console.log(link);
    window.location.href = link;
}

/*==================== RA Aluno ====================*/

function cadastraAluno() {
    const nome = document.getElementById('nomealuno').value;
    console.log(nome);
    const ra = Math.floor(Math.random() * 10000000)
    const data = { 'ra': ra, 'nome': nome }

    const dataJson = JSON.stringify(data);

    axios.post(BASEURL + "/index/cadAluno", dataJson).then((res) => {
        console.log(res.data);
        var resposta = res.data

        if (resposta['num'] == 0) {
            alert(resposta['texto']);
        } else {
            alert(resposta['texto']);
        }
    });
}   