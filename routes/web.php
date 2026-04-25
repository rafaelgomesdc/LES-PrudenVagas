<?php

require_once __DIR__ . '/../app/controllers/pessoa-juridica/pjController.php';
require_once __DIR__ . '/../app/controllers/pessoa-juridica/vagasController.php';
require_once __DIR__ . '/../app/controllers/pessoa-fisica/pfController.php';

$pjController = new PJController();
$pfController = new PFController();

$action = $_GET['action'] ?? 'view-cadastrar-pf';

switch ($action)
{
    //Pessoa Juridica
    case 'view-cadastrar-pj':
        $pjController->ViewCadastrar();
        break;
    case 'cadastrar-pj':
        $pjController->Cadastrar();
        break;
    
    //Pessoa Física
    case 'view-cadastrar-pf':
        $pfController->ViewCadastrar();
        break;
    case 'cadastrar-pf':
        $pfController->Cadastrar();
        break;
        
    default:
        echo "Rota não encontrada.";
        break;
}

?>