<?php

class PessoaJuridica
{
    private $conn;
    private $table = 'pessoas_juridicas'; // TABELA ATUALIZADA

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Registrar($dados)
    {
        // Query atualizada para campos de PJ
        $sql = "INSERT INTO {$this->table} (cnpj, razao_social, nome_fantasia, ie, email, senha, telefone) 
                VALUES (:cnpj, :razao_social, :nome_fantasia, :ie, :email, :senha, :telefone)";
        $stmt = $this->conn->prepare($sql);
        echo "CADASTRADO";

        return $stmt->execute([
            ':cnpj' => $dados['cnpj'],
            ':razao_social' => $dados['razao_social'],
            ':nome_fantasia' => $dados['nome_fantasia'],
            ':ie' => $dados['ie'],
            ':telefone' => $dados['telefone'],
            ':email' => $dados['email'],
            ':senha' => $dados['senha']
        ]);

        echo "ERRO";

        // Caso o CNPJ já exista
        return false;
    }

    public function Find($cnpj)
    {
        // Limpa formatação para buscar apenas números
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