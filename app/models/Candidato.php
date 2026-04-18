<?php

class Cadidato
{
    private $conn;
    private $table = 'candidatos';

    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    public function Registrar($dados)
    {}

    public function Carregar($dados)
    {}
}

?>