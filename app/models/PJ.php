<?php

class PessoaJuridica
{
    private $conn;
    private $table = 'pessoas_juridicas';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Registrar($dados)
    {
        $sql = "INSERT INTO {$this->table} (cnpj, razao_social, email, senha) VALUES (:cnpj, :razao_social, :email, :senha)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':cnpj' => $dados['cnpj'],
            ':razao_social' => $dados['razaoSocial'],
            ':email' => $dados['email'],
            ':senha' => $dados['senha']
        ]);
    }

    public function Find($cnpj)
    {
        $sql = "SELECT * FROM {$this->table} WHERE cnpj = :cnpj";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cnpj' => $cnpj]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function Carregar($dados)
    {}
}

?>