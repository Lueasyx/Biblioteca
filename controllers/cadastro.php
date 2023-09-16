<?php

class Cadastro extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js = array('cadastro/js/index.js');
    }

    function index()
    {
        $this->view->title = 'Cadastrar novo livro';
        $this->view->render('header');
        $this->view->render('cadastro/index');
        $this->view->render('footer');
    }

    function getAutor()
    {
        $this->model->getAutor();
    }

    function cadAutor()
    {
        $this->model->cadAutor();
    }
    function cadLivro()
    {
        $this->model->cadLivro();
    }
}
