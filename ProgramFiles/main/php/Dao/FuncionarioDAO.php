<?php 
require_once "../../config/database.php";
require_once "../classes/FuncionarioClass.php";
class FuncionarioDAO {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function cadastro(array $dados) {
        $sql = "INSERT INTO funcionarios (atendimento) VALUES (:atendimento)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":atendimento", $dados["atendimento"]);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function atualizar(array $dados) {
        $sql = "UPDATE funcionarios SET atendimento = :atendimento WHERE idfuncionario = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":atendimento", $dados["atendimento"]);
        $stmt->bindValue(":id", $dados["id"]);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function excluir($id) {
        $sql = "DELETE FROM funcionarios WHERE idfuncionario = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function listar() {
        $sql = "SELECT * FROM funcionarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM funcionarios WHERE idfuncionario = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>