<?php

class PessoaFisica
{
    private $conn;
    private $table = 'pessoas_fisicas';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Registrar($dados)
    {
        if ($this->Find($dados['CPF']) === null)
        {
            $sql = "INSERT INTO {$this->table} (CPF, nome, sobrenome, rg, data_nasc, email, telefone, biografia, cep, logradouro, bairro, cidade, estado, senha) VALUES (:CPF, :nome, :sobrenome, :rg, :data_nasc, :email, :telefone, :biografia, :cep, :logradouro, :bairro, :cidade, :estado, :senha)";
            $stmt = $this->conn->prepare($sql);

            return $stmt->execute([
                ':CPF'          => $dados['CPF'],
                ':nome'         => $dados['nome'],
                ':sobrenome'    => $dados['sobrenome'],
                ':rg'           => $dados['rg'],
                ':data_nasc'    => $dados['data_nasc'],
                ':email'        => $dados['email'],
                ':telefone'     => $dados['telefone'],
                ':biografia'    => $dados['biografia'],
                ':cep'          => $dados['cep'],
                ':logradouro'   => $dados['logradouro'],
                ':bairro'       => $dados['bairro'],
                ':cidade'       => $dados['cidade'],
                ':estado'       => $dados['estado'],
                ':senha'        => $dados['senha']
            ]);
        }
        return false;
    }

    public function Find($cpf)
    {
        $cpfLimpo = preg_replace('/[^0-9]/', '', $cpf);

        $sql = "SELECT * FROM {$this->table} WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cpf' => $cpfLimpo]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    }

    public function All()
    {

        $sql = "SELECT cpf, nome, sobrenome, cidade, biografia, telefone, email FROM {$this->table}";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Carregar($dados)
    {}
}

?>