<?php 
include_once "../../config/database.php";
include_once "../classes/UserClass.php";
class UsuarioDAO {

    private $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function cadastro(array $dadosUsuario) {
        $sql = "INSERT INTO usuarios (nome, cpf_cnpj, idade, endereco, email, permissao, senha) VALUES (:nome, :cpf_cnpj, :idade, :endereco, :email, :permissao, :senha)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nome", $dadosUsuario["nome"]);
        $stmt->bindValue(":cpf_cnpj", $dadosUsuario["cpf_cnpj"]);
        $stmt->bindValue(":idade", $dadosUsuario["idade"]);
        $stmt->bindValue(":endereco", $dadosUsuario["endereco"]);
        $stmt->bindValue(":email", $dadosUsuario["email"]);
        $stmt->bindValue(":permissao", $dadosUsuario["permissao"]);
        $stmt->bindValue(":senha", $dadosUsuario["senha"]);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }
    public function atualizar(array $dados) {
        $sql = "UPDATE usuarios SET nome = :nome, cpf_cnpj = :cpf_cnpj, idade = :idade, endereco = :endereco, email = :email, permissao = :permissao, senha = :senha WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nome", $dados["nome"]);
        $stmt->bindValue(":cpf_cnpj", $dados["cpf_cnpj"]);
        $stmt->bindValue(":idade", $dados["idade"]);
        $stmt->bindValue(":endereco", $dados["endereco"]);
        $stmt->bindValue(":email", $dados["email"]);
        $stmt->bindValue(":permissao", $dados["permissao"]);
        $stmt->bindValue(":senha", $dados["senha"]);
        $stmt->bindValue(":id", $dados["id"]);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function excluir($id) {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function listar() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function buscarPorNomeECpf($nome, $cpf) {
        $sql = "SELECT * FROM usuarios WHERE nome = :nome AND cpf_cnpj = :cpf";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>