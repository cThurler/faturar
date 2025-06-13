<?php
require_once 'controllers/ClienteController.php';

$controller = new ClienteController();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'salvar':
            $controller->salvar();
            break;
        case 'excluir':
            $controller->excluir();
            break;
        case 'buscar':
            $controller->buscar();
            break;
        default:
            $controller->index();
            break;
    }
} else {
    $controller->index();
}
