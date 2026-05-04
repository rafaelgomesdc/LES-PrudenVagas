<?php

require_once __DIR__ . "/../../../core/Database.php";
require_once __DIR__ . "/../../models/PJ.php";
require_once __DIR__ . "/../../models/Vaga.php";
require_once __DIR__ . "/../../models/PF.php";

class PJController
{
    private $pjModel;
    private $vagasModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();

        define('base_url', 'http://127.0.0.1/LES-PrudenVagas/');

        $this->pjModel = new PessoaJuridica($db);
        $this->vagasModel = new Vaga($db);
    }

    private function ChecarAutorizacao()
    {
        if (session_status() !== PHP_SESSION_ACTIVE)
            session_start();
        
        if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] != "pj")
        {
            session_destroy();
            
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
    }

    public function Cadastrar()
    {
        if (isset($_POST['inputCNPJ']) && isset($_POST['inputRazaoSocial']) && isset($_POST['inputEmailEmpresa']) && isset($_POST['inputSenhaEmpresa']))
        {
            if (!$this->pjModel->Find($_POST['inputCNPJ']))
            {
                $dados = [
                'cnpj'          => $_POST['inputCNPJ'],
                'razao_social'  => $_POST['inputRazaoSocial'],
                'nome_fantasia' => $_POST['inputNomeFantasia'],
                'ie'            => $_POST['inputIE'],
                'telefone'      => $_POST['inputTelefone'] ?? null,
                'email'         => $_POST['inputEmailEmpresa'],
                'senha'         => password_hash($_POST['inputSenhaEmpresa'], PASSWORD_DEFAULT),
                'categoria'     => $_POST['inputCategoria'] ?? null,
                'cep'           => $_POST['inputCEP'] ?? null,
                'logradouro'    => $_POST['inputLogradouro'] ?? null,
                'bairro'        => $_POST['inputBairro'] ?? null,
                'cidade'        => $_POST['inputCidade'] ?? null,
                'estado'        => $_POST['inputEstado'] ?? null
            ];

                //$this->pjModel->Registrar($dados);
                if ($this->pjModel->Registrar($dados)) {
                    echo "Cadastrado com sucesso!";
                } else {
                    echo "Erro ao cadastrar.";
                }
            }
            else{
                echo "cnpj já cadastrado.";
            }
            
            $this->ViewLogin();
        }
    }

    public function BancoTalentos()
    {
        $this->ChecarAutorizacao();
            
        $pfModel = new PessoaFisica($this->db);
        $candidatos = $pfModel->All();

        require __DIR__ . "/../../views/pessoa-juridica/banco-talentos.php";
    }
        }

        $this->ViewLogin();
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
            $this->ViewCadastrar();
        }
        elseif (!password_verify($senha, $usuario['senha'])) {
            echo "Senha inválida.";
        }
    }

    public function Logout()
    {
        session_start();
        session_destroy();

        require __DIR__ . "/../../views/pessoa-juridica/login.php";
    }
}

?>