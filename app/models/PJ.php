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
        if (!$this->Find($dados['cnpj']))
        {
            $sql = "INSERT INTO {$this->table} (cnpj, razao_social, nome_fantasia, ie, telefone, email, senha, categoria, cep, logradouro, bairro, cidade, estado) 
                    VALUES (:cnpj, :razao_social, :nome_fantasia, :ie, :telefone, :email, :senha, :categoria, :cep, :logradouro, :bairro, :cidade, :estado)";
            $stmt = $this->conn->prepare($sql);

            return $stmt->execute([
                ':cnpj' => $dados['cnpj'],
                ':razao_social' => $dados['razao_social'],
                ':nome_fantasia' => $dados['nome_fantasia'],
                ':ie' => $dados['ie'],
                ':telefone' => $dados['telefone'],
                ':email' => $dados['email'],
                ':senha' => $dados['senha'],
                ':categoria' => $dados['categoria'],
                ':cep' => $dados['cep'],
                ':logradouro' => $dados['logradouro'],
                ':bairro' => $dados['bairro'],
                ':cidade' => $dados['cidade'],
                ':estado' => $dados['estado']
            ]);
        }
        return false;
    }

    public function Find($cnpj)
    {
        $cnpjLimpo = preg_replace('/[^0-9]/', '', $cnpj);

        $sql = "SELECT * FROM {$this->table} WHERE cnpj = :cnpj";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cnpj' => $cnpjLimpo]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    }

    public function All()
    {
        $stmt = $this->conn->query("SELECT cnpj, razao_social, email, telefone, categoria FROM {$this->table}");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Carregar($dados)
    {}
}

?>