<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->title; ?></title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="public/assets/favicon.ico" />

    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/main.css" rel="stylesheet" />

    <!-- W3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap -->

    <link rel="stylesheet" href="<?= URL; ?>public/MDB/css/mdb.min.css" />
    <link rel="stylesheet" href="<?= URL; ?>public/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="<?= URL; ?>public/css/main.css" />

</head>

<body>
    <!--========== HEADER ==========-->
    <header class="header" style="background: #005BAA;">
        <div class="header__container">
            <a href="index" class="header__logo">Estrutura MVC</a>

            <div class="btn-group">
                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Cadastrar
                </button>
                <ul class="dropdown-menu">
                    <form action="" style="padding: 20px;width: 18rem;">
                        <p>Cadastre-se</p>
                        <div class="input-group flex-nowrap mb-2">
                            <input id="nomealuno" type="text" class="form-control" placeholder="Nome" aria-label="Nome" aria-describedby="addon-wrapping" required>
                        </div>
                        <div class="d-flex justfy-content-center" style="gap: 1rem;">
                            <button onclick="cadastraAluno()" type="button" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </ul>
            </div>
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        </div>
    </header>

    <!--========== NAV ==========-->
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>

                <div class="nav__list">
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Menu</h3>
                        <a href="<?= URL; ?>index" class="nav__link">
                            <i class='bx bx-library nav__icon'></i>
                            <span class="nav__name">Biblioteca</span>
                        </a>
                        <a href="#" class="nav__link">
                            <i class='bx bx-bookmark-heart nav__icon'></i>
                            <span class="nav__name">Lista de desejos</span>
                        </a>
                        <a href="#" class="nav__link">
                            <i class='bx bx-message-rounded nav__icon'></i>
                            <span class="nav__name">Chat</span>
                        </a>
                    </div>


                    <div class="nav__items">
                        <h3 class="nav__subtitle">Profile</h3>
                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Profile</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>
                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="#" class="nav__dropdown-item">Meus emprestimos</a>
                                    <a href="<?= URL; ?>emprestimo" class="nav__dropdown-item">Fazer emprestimo</a>
                                    <a href="<?= URL; ?>devolucao" class="nav__dropdown-item">Devolução e multas</a>
                                </div>
                            </div>
                        </div>

                        <a href="cadastro" class="nav__link">
                            <i class='bx bx-list-plus nav__icon'></i>
                            <span class="nav__name">Cadastrar livro</span>
                        </a>
                    </div>
                </div>
            </div>

            <a href="#" class="nav__link nav__logout">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">sair</span>
            </a>
        </nav>
    </div>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/main.js"></script>
</body>