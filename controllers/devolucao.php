<?php
class Devolucao extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->js = array('devolucao/js/index.js');
    }

    function index()
    {
        $this->view->title = 'Devoloção de Livros';
        $this->view->render('header');
        $this->view->render('devolucao/index');
        $this->view->render('footer');
    }

    public function getLivrosAlugados()
    {
        $this->model->getLivrosAlugados();
    }

    public function getMulta()
    {
        $this->model->getMulta();
    }
   
}
