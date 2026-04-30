<?php

require_once __DIR__ . '/../app/controllers/pessoa-juridica/pjController.php';
require_once __DIR__ . '/../app/controllers/vaga/vagasController.php';
require_once __DIR__ . '/../app/controllers/pessoa-fisica/pfController.php';
require_once __DIR__ . '/../app/controllers/adm/admController.php';

$pjController = new PJController();
$pfController = new PFController();
$admController = new ADMController();
$vagasController = new VagasController();

$action = $_GET['action'] ?? 'mural-vagas';

switch ($action)
{
    //Pessoa Juridica
    case 'view-cadastrar-pj':
        $pjController->ViewCadastrar();
        break;
    case 'view-login-pj':
        $pjController->ViewLogin();
        break;
    case 'cadastrar-pj':
        $pjController->Cadastrar();
        break;
    case 'login-pj':
        $pjController->Login();
        break;
    case 'logout-pj':
        $pjController->Logout();
        break;
    case 'gerenciar-vagas':
        $pjController->GerenciarVagas();
        break;
    case 'banco-talentos':
        $pjController->BancoTalentos();
        break;
    
    //Pessoa Física
    case 'view-cadastrar-pf':
        $pfController->ViewCadastrar();
        break;
    case 'view-login-pf':
        $pfController->ViewLogin();
        break;
    case 'cadastrar-pf':
        $pfController->Cadastrar();
        break;
    case 'login-pf':
        $pfController->Login();
        break;

    //Vagas
    case 'view-cadastrar-vaga':
        $vagasController->ViewCadastrar();
        break;
    case 'cadastrar-vaga':
        $vagasController->Cadastrar();
        break;
    case 'delete-vaga':
        $vagasController->Deletar();
        break;
    case 'view-vaga':
        $vagasController->ViewVaga();
        break;
    case 'edit-vaga':
        $vagasController->ViewEditar();
        break;
    case 'cadidatar-se':
        break;
    //Não logado
    case 'mural-vagas':
        $vagasController->Mural();
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