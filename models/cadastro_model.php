<?php

class Cadastro_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAutor()
    {
        $sql = $this->db->select("select a.codigo as id, a.nome as autor from autor a");
        echo json_encode($sql);
    }

    public function cadAutor()
    {
        $post = json_decode(file_get_contents('php://input'));
        $nomeAutor = $post->nome;

        if (strlen(trim($nomeAutor)) == 0) {
            $msg = array("num" => 0, "texto" => "É necessário prencher todos os campos...");
        } else {
            $msg = array("num" => 0, "texto" => "Cadastro do autor falhou");

            $result = $this->db->insert('biblioteca.autor', array('nome' => $nomeAutor));

            if ($result) {
                $msg = array("num" => 1, "texto" => "Autor cadastrado com sucesso!");
            }
        }

        echo (json_encode($msg));
    }

    public function cadLivro()
    {
        $post = json_decode(file_get_contents('php://input'));
        $isbn = $post->isbn;
        $titulo = $post->titulo;
        $edicao = $post->edicao;
        $estoque = $post->estoque;
        $autor = $post->autor;

        if (strlen(trim($isbn)) == 0 || strlen(trim($titulo)) == 0 || strlen(trim($edicao)) == 0 || strlen(trim($estoque)) == 0 || strlen(trim($autor)) == 0) {
            $msg = array("num" => 0, "texto" => "É necessário prencher todos os campos...");
        } else {

            $msg = array("num" => 0, "texto" => "Cadastro do livro falhou");

            $result = $this->db->insert(
                'biblioteca.livro',
                array(
                    'isbn' => $isbn,
                    'titulo' => $titulo,
                    'edicao' => $edicao,
                    'estoque' => $estoque,
                    'autor' => $autor,
                )
            );

            if ($result) {
                $msg = array("num" => 1, "texto" => "Livro cadastrado com sucesso!");
            }
        }

        echo (json_encode($msg));
    }
}
