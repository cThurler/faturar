<?php
require_once 'config/database.php';

class Cliente {
    private $conn;
    private $table = "clientes";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function listar() {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($id) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inserir($dados) {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (nome, cpf_cnpj, email, telefone) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $dados['nome'],
            $dados['cpf_cnpj'],
            $dados['email'],
            $dados['telefone']
        ]);
    }

    public function atualizar($id, $dados) {
        $stmt = $this->conn->prepare("UPDATE $this->table SET nome = ?, cpf_cnpj = ?, email = ?, telefone = ? WHERE id = ?");
        return $stmt->execute([
            $dados['nome'],
            $dados['cpf_cnpj'],
            $dados['email'],
            $dados['telefone'],
            $id
        ]);
    }

    public function excluir($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
