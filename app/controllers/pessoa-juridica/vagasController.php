<?php

require_once __DIR__ . "/../../../core/Database.php";
require_once __DIR__ . "/../../models/Vaga.php";

class VagasController
{
    private $vagasModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();

        $this->vagasModel = new Vaga($db);
    }

    public function ViewCadastrar()
    {
        require __DIR__ . "/../../views/pessoa-juridica/cadastrar-vaga.php";
    }

    public function Cadastrar()
    {
        //if (isset($_POST['']))
    }

    public function All()
    {}

}
?>