<form id="cadastoLivro">
    <div class="container-lg">
        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo do livro</label>
            <input type="text" class="form-control" id="titulo" placeholder="o sol é para todos">
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" placeholder="Ex. 9846513546986">
        </div>
        <div class="mb-3">
            <label for="edicao" class="form-label">Edição</label>
            <input type="text" class="form-control" id="edicao" placeholder="coloque apenas o número" aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>
        <div class="mb-3">
            <label for="estoque" class="form-label">Estoque</label>
            <br>
            <select class="form-select" id="estoque">
                <option value="">--Selecione uma Quantidade--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <select class="form-select" onchange="verificarAutor()" list="autor" id="autor">

            </select>
        </div>
        <div class="d-flex  justify-content-end ">
            <input type="button" id="cadastrar" class="btn btn-success" onclick="enviaForm()" value="Cadastrar">
            <input type="button" class="btn btn-danger" value="Cancelar">
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Cadastrar Autor</label>
            <div class="input-group mb-3">
                <input autocomplete="off" type="text" class="form-control" id="nome" placeholder="Stephen King" disabled>
                <input type="button" id="cadastrarAutor" class="btn btn-success" onclick="cadastraAutor()" value="Cadastrar autor" disabled>
            </div>
        </div>
    </div>
</form>