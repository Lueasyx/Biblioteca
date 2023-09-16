<?php

class Emprestimo extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js = array('emprestimo/js/index.js');
    }

    function index()
    {
        $this->view->title = 'Emprestimo de livro';
        $this->view->render('header');
        $this->view->render('emprestimo/index');
        $this->view->render('footer');
    }

    function getLivros()
    {
        $this->model->getLivros();
    }

    function livrosSelecionados()
    {
        $this->model->livrosSelecionados();
    }
    function cadEmprestimo()
    {
        $this->model->cadEmprestimo();
    }
}
