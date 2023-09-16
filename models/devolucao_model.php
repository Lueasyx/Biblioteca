<?php

class Devolucao_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getLivrosAlugados()
    {
        $ra = json_decode(file_get_contents('php://input'));
        // var_dump($post);

        $sql = $this->db->select("select a.ra, l.titulo as livro, l.codigo as livroId, al.nome as autor, e.numero as emprestimoId, el.dataprevistadev  as devolução, datediff(el.dataprevistadev, now()) as expiracao from aluno a join emprestimo e on a.ra = e.ra join emprestimolivro el on e.numero = el.emprestimo join livro l on el.livro = l.codigo join autor al on l.autor = al.codigo where a.ra = $ra");

        echo (json_encode($sql));
    }

    function getMulta()
    {
        $post = json_decode(file_get_contents('php://input'));
        $data = [];

        $msg = array("num" => 0, "texto" => "erro na devolução!");
        
        foreach ($post as $value) {

            $idEmprestimo = $value->idEmprestimo;
            $idLivro = $value->idLivro;

            $sql = $this->db->select("select livro, emprestimo, (case when datediff(now(), e.dataprevistadev)<= 0 then 0 else datediff(now(), e.dataprevistadev)* 4.50 end) as multa from emprestimolivro e where e.livro = $idLivro and e.emprestimo = $idEmprestimo");

            $data[] = $sql;
        }

        $multas = [];

        foreach ($data as $d) {
            $livro = $d[0]->livro;
            $emprestimo = $d[0]->emprestimo;
            $multa = $d[0]->multa;

            $dev = $this->db->insert('biblioteca.devolucao', array(
                'emprestimo' => $emprestimo,
                'livro' => $livro,
                'multa' => $multa,
                'datadevolucao' => date("Y-m-d")
            ));
            $multas[] = $multa;

            if ($dev) {
                
                $msg = array("num" => 1);
            } else {
                $msg = array("num" => 0, "texto" => "erro na devolução!");
            }
        }

        $msgs = array("multas" => $multas, "data" => $msg);

        echo (json_encode($msgs));
    }
}
