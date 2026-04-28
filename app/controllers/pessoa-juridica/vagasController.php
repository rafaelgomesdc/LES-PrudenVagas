<?php

require_once __DIR__ . "/../../../core/Database.php";
require_once __DIR__ . "/../../models/Vaga.php";
require_once __DIR__ . "/pjController.php";

class VagasController
{
    private $vagasModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();

        $this->vagasModel = new Vaga($db);
    }

    private function ChecarAutorizacao()
    {
        session_start();

        if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] != "pj")
        {
            session_destroy();
            
            echo "não logado";
            header('Location: ?action=view-login-pj');
            exit;
        }
    }

    public function ViewCadastrar()
    {
        $this->ChecarAutorizacao();
        require __DIR__ . "/../../views/pessoa-juridica/cadastrar-vaga.php";
    }

    public function Cadastrar()
    {
        session_start();
        $dados = [
            'nome' => $_POST['nome'],
            'funcao' => $_POST['funcao'],
            'descricao' => $_POST['descricao'],
            'pagamento' => $_POST['pagamento'],
            'quantidade' => $_POST['quantidade'],
            'cnpj' => $_SESSION['usuario']
        ];

        $this->vagasModel->Store($dados);

        $vagas = $this->vagasModel->All();
        require __DIR__ . "/../../views/pessoa-juridica/gerenciar-vagas.php";
    }

    public function Mural()
    {
        $vagas = $this->vagasModel->All();
        require __DIR__ . "/../../views/pessoa-fisica/mural-vagas.php";
    }

}
?>