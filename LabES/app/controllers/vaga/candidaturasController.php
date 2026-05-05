<?php

require_once __DIR__ . "/../../models/Candidaturas.php";

class Candidaturas
{
    private $cModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();

        $this->cModel = new Candidaturas($db);
    }

    public function ConsultarVagas()
    {
        
    }

    public function ConsultarCandidatos()
    {}
}

?>