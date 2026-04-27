<?php

require_once __DIR__ . '/../app/controllers/pessoa-juridica/pjController.php';
require_once __DIR__ . '/../app/controllers/pessoa-juridica/vagasController.php';
require_once __DIR__ . '/../app/controllers/pessoa-fisica/pfController.php';
require_once __DIR__ . '/../app/controllers/adm/admController.php';

$pjController = new PJController();
$pfController = new PFController();
$admController = new ADMController();

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

    //Administrador
    case 'view-administrador-gerenciamento':
        $admController->ViewGerenciamento();
        break;
        
    default:
        echo "Rota não encontrada.";
        break;
}

?>