<?php
require_once "../../config/database.php";
require_once "../classes/FarmaciaClass.php";
class FarmaciaDAO {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $sql = "SELECT * FROM farmacias";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idfarmacia) {
        $sql = "SELECT * FROM farmacias WHERE idfarmacia = :idfarmacia";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":idfarmacia", $idfarmacia);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($idfarmacia) {
        $sql = "DELETE FROM farmacias WHERE idfarmacia = :idfarmacia";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":idfarmacia", $idfarmacia);
        $stmt->execute();
    }
}
