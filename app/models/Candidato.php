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
    {
        if ($this->Find($cpf) === nul);
        {
            //Registrar
        }
        else{
            echo . "CPF já cadastrado.";
        }
    }

    public Find($cpf)
    {
        $sql = "SELECT * FROM {$this->table} WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cpf' = $cpf]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function Carregar($dados)
    {}
}

?>