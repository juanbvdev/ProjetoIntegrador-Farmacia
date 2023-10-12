<?php 
require_once "./ProgramFiles/main/config/database.php";
require_once "./ProgramFiles/main/php/classes/MedicoClass.php";
class MedicoDAO {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function cadastro(array $dados) {
        $sql = "INSERT INTO medicos (registro, prescricoes) VALUES (:registro, :prescricoes)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":registro", $dados["registro"]);
        $stmt->bindValue(":prescricoes", $dados["prescricoes"]);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function atualizar(array $dados) {
        $sql = "UPDATE medicos SET registro = :registro, prescricoes = :prescricoes WHERE idmedico = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":registro", $dados["registro"]);
        $stmt->bindValue(":prescricoes", $dados["prescricoes"]);
        $stmt->bindValue(":id", $dados["id"]);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function excluir($id) {
        $sql = "DELETE FROM medicos WHERE idmedico = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function listar() {
        $sql = "SELECT * FROM medicos";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM medicos WHERE idmedico = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>