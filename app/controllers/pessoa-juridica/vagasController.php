<?php

require_once __DIR__ . "/../../models/Vaga.php";

class vagasController
{
    public function __construct()
    {}

    public function ViewCadastrar()
    {
        require __DIR__ . "/../../views/pessoa-juridica/cadastrar-vaga.php";
    }
}

?>