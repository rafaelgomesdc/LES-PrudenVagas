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
        $sql = "INSERT INTO {$this->candidaturas} (vagas_codigo, pessoas_fisicas_CPF) VALUES (:cod, :cpf)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':cpf' => $cpf,
            ':cod' => $cod
        ]);
    }

    public function FindVagas($cpf)
    {
        $sql = "SELECT v.*
            FROM vagas v
            JOIN candidaturas c 
            ON v.codigo = c.vagas_codigo
            WHERE c.pessoas_fisicas_CPF = :cpf";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cpf' => $cpf]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FindCandidatos($cnpj)
    {
        $sql = "SELECT pf.*, v.nome AS vaga_nome, v.codigo AS vaga_id
            FROM pessoas_fisicas pf
            JOIN candidaturas c 
                ON pf.CPF = c.pessoas_fisicas_CPF
            JOIN vagas v 
                ON v.codigo = c.vagas_codigo
            WHERE v.pessoas_juridicas_cnpj = :cnpj";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cnpj' => $cnpj]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function All()
    {
        $stmt = $this->conn->query("SELECT * FROM {$this->candidaturas}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>