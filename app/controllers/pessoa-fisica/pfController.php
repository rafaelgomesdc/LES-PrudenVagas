<?php

require_once __DIR__ . "/../../../core/Database.php";
//require_once __DIR__ . "/../../../core/ValidadorCPFService.php"; // [NOVO] Importa o serviço 
require_once __DIR__ . "/../../models/PF.php";
require_once __DIR__ . "/../../models/Vaga.php";

class PFController
{
    private $pfModel;
    private $vagasModel;

    public function __construct()
{
    $database = new Database();
    $db = $database->connect();

    $this->pfModel = new PessoaFisica($db);
    $this->vagasModel = new Vaga($db);
}

    public function ViewCadastrar()
    {
        require __DIR__ . "/../../views/pessoa-fisica/cadastrar.php";
    }

    public function ViewLogin()
    {
        require __DIR__ . "/../../views/pessoa-fisica/login.php";
    }

    public function Cadastrar()
    {
        if (isset($_POST['inputCPF'], $_POST['inputNome'], $_POST['inputSenha'])) {
            // Limpeza simples de dados (sem dependências externas)
            $cpfLimpo = preg_replace('/[^0-9]/', '', $_POST['inputCPF']);
            $cepLimpo = preg_replace('/[^0-9]/', '', $_POST['inputCEP']);

            $dados = [
                'CPF'        => $cpfLimpo,
                'nome'       => $_POST['inputNome'],
                'sobrenome'  => $_POST['inputSobrenome'],
                'rg'         => $_POST['inputRG'],
                'data_nasc'  => $_POST['inputDataNasc'],
                'telefone'   => $_POST['inputTelefone'],
                'senha'      => password_hash($_POST['inputSenha'], PASSWORD_DEFAULT),
                'cep'        => $cepLimpo,
                'logradouro' => $_POST['inputLogradouro'],
                'bairro'     => $_POST['inputBairro'],
                'cidade'     => $_POST['inputCidade'],
                'estado'     => $_POST['inputEstado']
            ];

            if ($this->pfModel->Registrar($dados)) {
                // Link de redirecionamento corrigido para usar a constante base_url
                echo "<script>alert('Cadastro realizado!'); window.location.href='".base_url."index.php?action=view-login-pf';</script>";
            } else {
                echo "Erro ao registrar. O CPF pode já existir.";
            }
        }
    }

    public function Login()
    {
        session_start();
        
        $cpf = $_POST['inputCPF'];
        $senha = $_POST['inputSenha'];
        $tipo = "pf";

        $usuario = $this->pfModel->Find($cpf);

        if ($usuario && password_verify($senha, $usuario['senha']))
        {
            $_SESSION['usuario'] = $usuario['CPF'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['tipo'] = $tipo;

            echo "Olá " . $_SESSION['nome'];
        }
        elseif (!$usuario) {
            echo "Usuário não encontrado.";
        }
        elseif (!password_verify($senha, $usuario['senha'])) {
            echo "Senha inválida.";
        }
    }
}
?>