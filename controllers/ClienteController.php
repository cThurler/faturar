<?php
require_once 'models/Cliente.php';

class ClienteController {
    private $cliente;

    public function __construct() {
        $this->cliente = new Cliente();
    }

    public function index() {
        $clientes = $this->cliente->listar();
        include 'views/cliente/index.php';
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome' => $_POST['nome'],
                'cpf_cnpj' => $_POST['cpf_cnpj'],
                'email' => $_POST['email'],
                'telefone' => $_POST['telefone']
            ];

            if (!empty($_POST['id'])) {
                $this->cliente->atualizar($_POST['id'], $dados);
            } else {
                $this->cliente->inserir($dados);
            }

            header('Location: index.php');
        }
    }

    public function excluir() {
        if (isset($_GET['id'])) {
            $this->cliente->excluir($_GET['id']);
        }
        header('Location: index.php');
    }

    public function buscar() {
        if (isset($_GET['id'])) {
            $cliente = $this->cliente->buscar($_GET['id']);
            echo json_encode($cliente);
        }
    }
}
