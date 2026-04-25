<?php

require_once __DIR__ . '/../app/controllers/pessoa-juridica/pjController.php';
require_once __DIR__ . '/../app/controllers/pessoa-juridica/vagasController.php';
require_once __DIR__ . '/../app/controllers/pessoa-fisica/pfController.php';

$pjController = new PJController();
$vagasController = new VagasController();

$action = $_GET['action'] ?? 'view-cadastrar-pj';

switch ($action)
{
    case 'view-cadastrar-pj':
        $pjController->ViewCadastrar();
        break;
    case 'cadastrar-pj':
        $pjController->Cadastrar();
        break;
    
    default:
        echo "Rota não encontrada.";
        break;
}

?>