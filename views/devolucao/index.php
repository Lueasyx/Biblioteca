<main>
    <div style="background-color: #ffffff; border-radius: 1em; padding: 1rem;">
        <form style="padding: 1rem 1rem 0 1rem;">
            <label for="nome" class="form-label">R.A</label>
            <div class="input-group mb-3 d-flex justify-content-center">
                <input id="ra" class="form-control" style="width: 50rem;" placeholder="Ex: 7593281" aria-describedby="button-addon2" required>
                <button class="btn btn-outline-primary" style="width: 10rem; background: #005BAA;" type="button" onclick="livrosAlugados()" id="button-addon2">
                    <i class="bx bx-search" style="font-weight: 900; color: white; "></i>
                </button>
            </div>
            <div class="card" style="width: 100%; margin-bottom: 1rem;">
                <div class="card-header" style="display: flex; justify-content: center;">
                    Livros Selecionados
                </div>
                <ul id="listdevolucao" class="list-group list-group-flush">

                </ul>
            </div>
        </form>
        <div class="d-flex justify-content-center">
            <button style="margin: 0 1rem 1rem 0;" onclick="confirmarDevolucao()" class="btn btn-primary">Concluir devolução</button>
        </div>
    </div>
</main>