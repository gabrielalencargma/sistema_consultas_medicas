<?php

require_once __DIR__ . "/controller/ConsultaController.php";

$controller = new ConsultaController();

$acao = $_GET['acao'] ?? $_POST['acao'] ?? 'listar';

switch ($acao) {
    case 'listar':
        $controller->listarConsultas();
        break;

    case 'cadastrar':
        $controller->cadastrar();
        break;

    case 'paginaCadastrar':
        $controller->mostrarPaginaCadastro();
        break;

    case 'excluir':
        $controller->excluir();
        break;

    case 'alterar':
        $controller->alterar();
        break;

    case 'paginaAlterar':
        $controller->mostrarPaginaAlterar();
        break;

    case 'filtrar':
        $controller->filtrarConsultas();
        break;
    
    default:
        echo "Ação inválida.";
        break;
}

?>