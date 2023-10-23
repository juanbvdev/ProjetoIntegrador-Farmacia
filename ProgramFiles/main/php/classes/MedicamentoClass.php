<?php
class Medicamento {
    private $idmedicamento;
    private $nome;
    private $fornecedor;
    private $disponibilidade;
    private $validade;
    private $imagem;

    public function getId_medicamento() {
        return $this->idmedicamento;
    }

    public function setId_medicamento($id_medicamento) {
        $this->idmedicamento = $id_medicamento;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getFornecedor() {
        return $this->fornecedor;
    }

    public function setFornecedor($fornecedor) {
        $this->fornecedor = $fornecedor;
    }

    public function getDisponibilidade() {
        return $this->disponibilidade;
    }

    public function setDisponibilidade($disponibilidade) {
        $this->disponibilidade = $disponibilidade;
    }

    public function getValidade() {
        return $this->validade;
    }

    public function setValidade($validade) {
        $this->validade = $validade;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }
}
?>
