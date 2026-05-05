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

        $sql = "INSERT INTO {$this->table} (cnpj, razao_social, nome_fantasia, ie, email, telefone, categoria, senha, cep, logradouro, bairro, cidade, estado) 
                VALUES (:cnpj, :razao_social, :nome_fantasia, :ie, :email, :telefone, :categoria, :senha, :cep, :logradouro, :bairro, :cidade, :estado)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':cnpj'             => $dados['cnpj'],
            ':razao_social'     => $dados['razao_social'],
            ':nome_fantasia'    => $dados['nome_fantasia'],
            ':ie'               => $dados['ie'],
            ':email'            => $dados['email'],
            ':telefone'         => $dados['telefone'],
            ':categoria'        => $dados['categoria'],
            ':senha'            => $dados['senha'],
            ':cep'              => $dados['cep'],
            ':logradouro'       => $dados['logradouro'],
            ':bairro'           => $dados['bairro'],
            ':cidade'           => $dados['cidade'],
            ':estado'           => $dados['estado']
        ]);
    }

    public function Find($cnpj)
    {
        //$cnpjLimpo = preg_replace('/[^0-9]/', '', $cnpj);

        $sql = "SELECT * FROM {$this->table} WHERE cnpj = :cnpj";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cnpj' => $cnpj]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    }

    public function All()
    {
        $stmt = $this->conn->query("SELECT cnpj, razao_social, nome_fantasia, ie, email, telefone, categoria FROM {$this->table}");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Carregar($dados)
    {}
}

?>