<?php

require_once __DIR__ . "/../../../core/Database.php";
require_once __DIR__ . "/../../models/PJ.php";
require_once __DIR__ . "/../../models/Vaga.php";

class PJController
{
    private $pjModel;
    private $vagasModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();

        define('base_url', 'http://127.0.0.1/LabES/LES-PrudenVagas/');

        $this->pjModel = new PessoaJuridica($db);
        $this->vagasModel = new Vaga($db);
    }

    private function ChecarAutorizacao()
    {
        if (!isset($_SESSION['usuario']) && $_SESSION['tipo'] == "pj")
        {
            echo "não logado";
            header('Location: ?action=view-login-pj');
            exit;
        }
    }

    //Métodos para chamar views
    public function ViewCadastrar()
    {
        require __DIR__ .  "/../../views/pessoa-juridica/cadastrar.php";
    }
    
    public function ViewLogin()
    {
        require __DIR__ . "/../../views/pessoa-juridica/login.php";
    }

    public function GerenciarVagas()
    {
        $this->ChecarAutorizacao();

        $vagas = $this->vagasModel->All();
        require __DIR__ . "/../../views/pessoa-juridica/gerenciar-vagas.php";
        die();
    }

    //Métodos CRUD
    public function Cadastrar()
    {
        if (isset($_POST['inputCNPJ']) && isset($_POST['inputRazaoSocial']) && isset($_POST['inputEmailEmpresa']) && isset($_POST['inputSenhaEmpresa']))
        {
            if ($this->pjModel->Find($_POST['inputCNPJ']) === false)
            {
                $dados = [
                    'cnpj' => $_POST['inputCNPJ'],
                    'razaoSocial' => $_POST['inputRazaoSocial'],
                    'email' => $_POST['inputEmailEmpresa'],
                    'senha' => password_hash($_POST['inputSenhaEmpresa'], PASSWORD_DEFAULT)
                ];

                $this->pjModel->Registrar($dados);
            }
            else{
                echo "cnpj já cadastrado.";
            }
            
            $this->ViewLogin();
        }
    }

    public function Login()
    {
        session_start();

        $cnpj = $_POST['inputCNPJ'];
        $senha = $_POST['inputSenha'];
        $tipo = "pj";

        $usuario = $this->pjModel->Find($cnpj);
        
        if ($usuario && password_verify($senha, $usuario['senha']))
        {
            $_SESSION['usuario'] = $usuario['cnpj'];
            $_SESSION['nome'] = $usuario['razao_social'];
            $_SESSION['tipo'] = $tipo;

            $this->GerenciarVagas();
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