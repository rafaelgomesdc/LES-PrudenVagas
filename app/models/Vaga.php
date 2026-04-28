<?php

class Vaga
{
    private $conn;
    private $table = 'vagas';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Store($dados) //Gravar dados
    {
        $sql = "INSERT INTO {$this->table} (nome, funcao, descricao, pagamento, quantidade, pessoas_juridicas_cnpj) VALUES (:nome, :funcao, :descricao, :pagamento, :quantidade, :cnpj)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':nome' => $dados['nome'],
            ':funcao' => $dados['funcao'],
            ':descricao' => $dados['descricao'],
            ':pagamento' => $dados['pagamento'],
            ':quantidade' => $dados['quantidade'],
            ':cnpj' => $dados['cnpj']
        ]);
    }

    public function Update($dados)
    {
        $sql = "UPDATE {$this->table}
                SET col = :col
                WHERE col_id = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':col' => $dados['col'],
            ':col_id' => $dados['id']
        ]);
    }

    public function Delete($cod)
    {
        $sql = "DELETE FROM {$this->table} WHERE cod = :cod";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([':cod' => $cod]);
    }

    public function All()
    {
        $stmt = $this->conn->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Find($cod)
    {
        $sql = "SELECT * FROM {$this->table} WHERE cod = :cod";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':cod' => $cod]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>