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

    public function ViewCadastrar()
    {
        require __DIR__ .  "/../../views/pessoa-juridica/cadastrar.php";
    }

    public function GerenciarVagas()
    {
        $vagas = $this->vagasModel->All();
        require __DIR__ . "/../../views/pessoa-juridica/gerenciar-vagas.php";
        die();
    }

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
                    'senha' => $_POST['inputSenhaEmpresa']
                ];

                $this->pjModel->Registrar($dados);
            }
            else{
                echo "cnpj já cadastrado.";
            }
            
            $this->GerenciarVagas();
        }
    }
}

?>