<?php 
require_once "../../config/database.php";
require_once "../classes/ClienteClass.php";
class ClienteDAO {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function cadastro(array $dados) {
        $sql = "INSERT INTO clientes (idcliente, retiradas, receitas) VALUES (:idcliente, :retiradas, :receitas)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":idcliente", $dados["idcliente"]);
        $stmt->bindValue(":retiradas", $dados["retiradas"]);
        $stmt->bindValue(":receitas", $dados["receitas"]);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function atualizar(array $dados) {
        $sql = "UPDATE clientes SET retiradas = :retiradas, receitas = :receitas WHERE idcliente = :idcliente";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":retiradas", $dados["retiradas"]);
        $stmt->bindValue(":receitas", $dados["receitas"]);
        $stmt->bindValue(":idcliente", $dados["idcliente"]);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function excluir($id) {
        $sql = "DELETE FROM clientes WHERE idcliente = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function listar() {
        $sql = "SELECT * FROM clientes";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM clientes WHERE idcliente = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
