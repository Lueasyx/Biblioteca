<?php

class Index extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js = array('index/js/index.js');
    }

    function index()
    {
        $this->view->title = 'Página inicial';
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

    function getLivros()
    {
        $this->model->getLivros();
    }

    function cadAluno()
    {
        $this->model->cadAluno();
    }
}
