<?php 
require_once "../../config/database.php";
require_once "../classes/ClienteClass.php";
class MedicamentoDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function cadastro(array $dadosmedicamento) {
        $sql = "INSERT INTO medicamentos (nome, fornecedor, validade, quantidade, imagem) VALUES (:nome, :fornecedor, :validade, :quantidade, :imagem)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nome", $dadosmedicamento["nome"]);
        $stmt->bindValue(":fornecedor", $dadosmedicamento["fornecedor"]);
        $stmt->bindValue(":validade", $dadosmedicamento["validade"]);
        $stmt->bindValue(":quantidade", $dadosmedicamento["quantidade"]);
        $stmt->bindValue(":imagem", $dadosmedicamento["imagem"]);
        
        if ($stmt->execute()) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }
    public function buscarPorId($id) {
        $sql = "SELECT * FROM medicamentos WHERE idmedicamento = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function excluir($id) {
        $sql = "DELETE FROM medicamentos WHERE idmedicamento = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}?>