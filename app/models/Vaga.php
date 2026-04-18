<?php

class Vaga
{
    private $conn;
    private $table = 'vagas';

    public function __construct($db)
    {
        $this->conn = $db;
    }
}

?>