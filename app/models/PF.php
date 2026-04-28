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
            $sql = "INSERT INTO {$this->table} (CPF, nome, sobrenome, rg, data_nasc, telefone) 
                    VALUES (:CPF, :nome, :sobrenome, :rg, :data_nasc, :telefone)";
            $stmt = $this->conn->prepare($sql);

            return $stmt->execute([
                ':CPF' => $dados['CPF'],
                ':nome' => $dados['nome'],
                ':sobrenome' => $dados['sobrenome'],
                ':rg' => $dados['rg'],
                ':data_nasc' => $dados['data_nasc'],
                ':telefone' => $dados['telefone']
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
}
?>