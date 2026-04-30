<?php

class Candidaturas
{
    private $conn;
    private $table = 'candidaturas';

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

    public function ConsultarVagas($cpf)
    {
        $sql = "SELECT * FROM {$this->table} WHERE pessoas_fisicas_CPF = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt = $this->conn->execute([':cpf' => $cpf]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    }

    public function ConsultarCandidatos($vaga)
    {
        $sql = "SELECT * FROM {$this->table} WHERE vagas_codigo = :vaga";
        $stmt = $this->conn->prepare($sql);
        $stmt = $this->conn->execute([':vaga' => $vaga]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    }

    public function All()
    {
        $stmt = $this->conn->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>