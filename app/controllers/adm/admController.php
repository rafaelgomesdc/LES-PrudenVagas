<?php

require_once __DIR__ . '/../../models/PF.php';
require_once __DIR__ . '/../../models/PJ.php';
require_once __DIR__ . '/../../models/Vaga.php';

class ADMController
{
    private $pfModel;
    private $pjModel;
    private $vagasModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();

        $this->pfModel = new PessoaFisica($db);
        $this->pjModel = new PessoaJuridica($db);
        $this->vagasModel = new Vaga($db);
    }

    public function ViewGerenciamento()
    {
        $pessoas_juridicas = $this->pjModel->All();
        $pessoas_fisicas = $this->pfModel->All();
        $vagas = $this->vagasModel->All();

        require __DIR__ . '/../../views/adm/gerenciar-registros.php';
    }
}

?>