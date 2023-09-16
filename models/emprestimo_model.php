<?php

class Emprestimo_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLivros()
    {

        $sql = $this->db->select("select l.codigo as id, l.titulo, l.estoque, a.nome as autor from livro l join autor a on l.autor = a.codigo");

        echo json_encode($sql);
    }

    public function livrosSelecionados()
    {
        $post = json_decode(file_get_contents('php://input'));

        $data = [];
        foreach ($post as $selecionado) {

            $sql = $this->db->select(
                "select
                    *,
                    titulo as nome
                from
                    biblioteca.livro
                where
                    livro.codigo = $selecionado"
            );

            $data[] = $sql;
        }

        echo json_encode($data);
        // exit(json_encode(array('code' => 1, 'msg' => 'Livro Selecionado com sucesso.', 'data' => $data)));
    }

    public function cadEmprestimo()
    {
        $post = json_decode(file_get_contents('php://input'));
        $livros = $post[0];
        $ra = $post[1]->ra;
        $retirada = $post[1]->retirada;
        $devolucao = $post[1]->devolucao;

        $emprestimo = $this->db->insert('biblioteca.emprestimo', array(
            'data' => $retirada,
            'ra' => $ra
        ));


        if ($emprestimo) {
            $id = $this->db->select("select numero as id from emprestimo e where numero = (select max(numero) from emprestimo e2) and ra = $ra and data = '$retirada'");

            $idEmprestimo = $id[0]->id;

            foreach ($livros as $livro) {
                $emprestimoCompleto = $this->db->insert('biblioteca.emprestimolivro', array(
                    'emprestimo' => $idEmprestimo,
                    'livro' => $livro,
                    'dataprevistadev' => $devolucao
                ));
            }
            if ($emprestimoCompleto) {
                $msg = array("num" => 1, "texto" => "Emprestimo Feito com sucesso!");
            } else {
                $msg = array("num" => 0, "texto" => "Emprestimo do livro falhou");
                die;
            }
        } else {
            $msg = array("num" => 0, "texto" => "Emprestimo do livro falhou");
            die;
        }


        echo (json_encode($msg));
    }
}
