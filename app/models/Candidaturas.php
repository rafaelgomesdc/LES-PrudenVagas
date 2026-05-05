<?php

class Candidaturas
{
    private $conn;
    private $candidaturas = 'candidaturas';
    private $vagas = 'vagas';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Registrar($cod, $cpf)
    {
        $sql = "INSERT INTO {$this->table} (vagas_codigo, pessoas_fisicas_CPF) VALUES (:cod, :cpf)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':cpf' => $cpf,
            ':cod' => $cod
        ]);
    }

    public function FindVagas($cpf)
    {
        $sql = "SELECT * FROM {$this->table} WHERE pessoas_fisicas_CPF = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt = $this->conn->execute([':cpf' => $cpf]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    }

    public function FindCandidatos($cnpj)
    {
        $sql = "SELECT codigo FROM {$this->vagas} WHERE pessoas_juridicas_cnpj = :cnpj";
        $stmt = $this->conn->prepare($sql);
        $stmt = $this->conn->execute([':cnpj' => $cnpj]);

        $resultVagas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result;

        foreach ($resultVagas as $v)
        {
            $sql = "SELECT * FROM {$this->candidaturas} WHERE vagas_codigo = $v";
            $stmt = $this->conn->prepare($sql);
            $stmt = $this->conn->execute();

            $result += $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result ? $result : null;
    }

    public function All()
    {
        $stmt = $this->conn->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>