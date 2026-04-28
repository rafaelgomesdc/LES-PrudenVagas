<?php
// Define o tipo de conteúdo como JSON
header('Content-Type: application/json');

// Impede acesso direto se não houver CNPJ
if (!isset($_GET['cnpj'])) {
    echo json_encode(['valido' => false, 'mensagem' => 'CNPJ não fornecido.']);
    exit;
}

// Inclui o serviço de validação de CNPJ
require_once __DIR__ . "/../core/ValidadorCNPJService.php";

$cnpj = $_GET['cnpj'];
$validador = new ValidadorCNPJService();

// Executa a validação completa (Algoritmo + API Oficial simulation)
$resultado = $validador->validarCompleto($cnpj);

// Retorna o resultado para o JavaScript
echo json_encode($resultado);
exit;
?>