<?php

class Index_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLivros()
    {

        $sql = $this->db->select("select l.codigo as id, l.titulo, l.isbn, l.edicao, l.estoque, a.nome as autor from livro l join autor a on l.autor = a.codigo");

        echo json_encode($sql);
    }

    public function cadAluno()
    {
        $post = json_decode(file_get_contents('php://input'));
        $ra = $post->ra;
        $nome = $post->nome;

        if (strlen(trim($nome)) == 0) {
            $msg = array("num" => 0, "texto" => "É necessário prencher todos os campos...");
        } else {

            $msg = array("num" => 0, "texto" => "Seu cadastro falhou");

            $verify = $this->db->select("select count(*) as id from aluno a where nome like '$nome'");

            if ($verify[0]->id == '0') {
                $result = $this->db->insert(
                    'biblioteca.aluno',
                    array(
                        'ra' => $ra,
                        'nome' => $nome
                    )
                );

                if ($result) {
                    $msg =
                        array("num" => 1, "texto" => "Cadastro concluido, Bem vindo $nome seu R.A é: $ra");
                } else {
                    $msg = array("num" => 0, "texto" => "Seu cadastro falhou");
                }
            } else {
                $msg = array("num" => 0, "texto" => "Seu cadastro falhou, Aluno já existente");
            }
        }

        echo (json_encode($msg));
    }
}
