<?php

require_once __DIR__ . "/../../../core/Database.php";
//require_once __DIR__ . "/../../../core/ValidadorCPFService.php"; // [NOVO] Importa o serviço 
require_once __DIR__ . "/../../models/PF.php";
require_once __DIR__ . "/../../models/Vaga.php";

class PFController
{
    private $pfModel;
    private $vagasModel;
    private $validadorCPF; // [NOVO] Propriedade para o serviço

    public function __construct()
    {
        $database = new Database();
        $db = $database->connect();

        $this->pfModel = new PessoaFisica($db);
        $this->vagasModel = new Vaga($db);
        //$this->validadorCPF = new ValidadorCPFService(); // [NOVO] Inicializa o serviço
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
        // Verifica se os campos obrigatórios foram enviados
        if (isset($_POST['inputCPF'], $_POST['inputNome'], $_POST['inputSobrenome'], $_POST['inputRG'], $_POST['inputDataNasc'], $_POST['inputTelefone']))
        {
            $cpfRaw = $_POST['inputCPF'];
            
            // =====================================================================
            // 1. Validação do CPF no Servidor (Segurança adicional ao JS)
            // =====================================================================
            $validacao = $this->validadorCPF->validarCompleto($cpfRaw);

            if (!$validacao['valido']) {
                // Se o CPF for inválido, interrompe e mostra erro
                // Em um sistema real, você redirecionaria de volta com a mensagem
                echo "<h1>Erro no Cadastro</h1>";
                echo "<p style='color:red;'>" . $validacao['mensagem'] . "</p>";
                echo "<a href='javascript:history.back()'>Voltar</a>";
                return;
            }

            // =====================================================================
            // 2. Preparação dos dados (com CPF já limpo pelo validador)
            // =====================================================================
            $cpfLimpo = preg_replace('/[^0-9]/', '', $cpfRaw);
            $dados = [
                'CPF' => $cpfLimpo, // Salva apenas números no banco
                'nome' => $_POST['inputNome'],
                'sobrenome' => $_POST['inputSobrenome'],
                'rg' => $_POST['inputRG'],
                'data_nasc' => $_POST['inputDataNasc'],
                'telefone' => $_POST['inputTelefone'],
                'senha' => password_hash($_POST['inputSenha'], PASSWORD_DEFAULT)
            ];

            // =====================================================================
            // 3. Tentativa de Registro no Banco
            // =====================================================================
            if ($this->pfModel->Registrar($dados)) {
                // Sucesso
                echo "<h1>Cadastro realizado com sucesso!</h1>";
                echo "<a href='" . base_url . "'>Ir para Home</a>";
            } else {
                // CPF já cadastrado (retorno false do model)
                echo "<h1>Erro no Cadastro</h1>";
                echo "<p style='color:orange;'>Este CPF já está cadastrado em nosso sistema.</p>";
                echo "<a href='javascript:history.back()'>Voltar e corrigir</a>";
            }
        } else {
            echo "Campos obrigatórios ausentes.";
        }

        $this->ViewLogin();
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