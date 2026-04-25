<?php

require_once __DIR__ . "/../../../core/Database.php";
require_once __DIR__ . "/../../models/PF.php";
require_once __DIR__ . "/../../models/Vaga.php";

class PFController
{
    private $pfModel;
    private $vagasModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();

        $this->pfModel = new PessoaFisica($db);
        $this->vagasModel = new Vaga($db);
    }

    public function Cadastrar()
    {
        if (isset($_POST['inputCPF']), isset($_POST['inputNome']), isset($_POST['inputSobrenome']), isset($_POST['inputDataNasc']), isset($_POST['inputTelefone']))
        {
            $dados = [];
            $this->pfModel->Registrar($dados);
        }
    }
}

?>