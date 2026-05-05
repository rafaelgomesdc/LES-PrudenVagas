<?php

require_once __DIR__ . "/../../../core/Database.php";
//require_once __DIR__ . "/../../../core/ValidadorCPFService.php"; // [NOVO] Importa o serviço 
require_once __DIR__ . "/../../models/PF.php";
require_once __DIR__ . "/../../models/Vaga.php";
require_once __DIR__ . "/../../models/Candidaturas.php";

class PFController
{
    private $pfModel;
    private $vagasModel;
    private $candidaturasModel;
    private $validadorCPF; // [NOVO] Propriedade para o serviço

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();

        $this->pfModel = new PessoaFisica($db);
        $this->vagasModel = new Vaga($db);
            $this->candidaturasModel = new Candidaturas($db);
    }

    private function ChecarAutorizacao()
    {
        if (session_status() !== PHP_SESSION_ACTIVE)
            session_start();
        
        if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] != "pf")
        {            
            echo "não logado";
            header('Location: ?action=view-login-pf');
            exit;
        }
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
                'email'      => $_POST['inputEmail'],
                'telefone'   => $_POST['inputTelefone'],
                'bigrafia'   => $_POST['inputBiografia'],
                'senha'      => password_hash($_POST['inputSenha'], PASSWORD_DEFAULT),
                'cep'        => $cepLimpo,
                'logradouro' => $_POST['inputLogradouro'],
                'bairro'     => $_POST['inputBairro'],
                'cidade'     => $_POST['inputCidade'],
                'estado'     => $_POST['inputEstado'],
                'senha'      => password_hash($_POST['inputSenha'], PASSWORD_DEFAULT)
            ];

            if ($this->pfModel->Registrar($dados)) {
                // Link de redirecionamento corrigido para usar a constante base_url
                echo "<script>alert('Cadastro realizado!'); window.location.href='".base_url."public/index.php?action=view-login-pf';</script>";
            } else {
                echo "Erro ao registrar. O CPF pode já existir.";
            }
        }
    }

    public function Login()
    {
        if (session_status() === PHP_SESSION_ACTIVE)
        {
            $_SESSION = [];
            session_destroy();  
        }

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

            $vagas = $this->vagasModel->All();
            require __DIR__ . "/../../views/pessoa-fisica/mural-vagas.php";
        }
        elseif (!$usuario) {
            echo "Usuário não encontrado.";
            $this->ViewCadastrar();
        }
        elseif (!password_verify($senha, $usuario['senha'])) {
            echo "Senha inválida.";
        }
    }

    public function Logout()
    {
        if (session_status() !== PHP_SESSION_ACTIVE)
            session_start();

        $_SESSION = [];
        session_destroy();

        $this->ViewLogin();
    }

    public function Candidatar()
    {
        $this->ChecarAutorizacao();
        $this->candidaturasModel->Registrar($_GET['cod'], $_SESSION['usuario']);

        header('Location: ?action=view-vaga&cod=' . $_GET['cod'] . '&cnpj=' . $_GET['cnpj']);
    }
}
?>