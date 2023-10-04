<?php
require_once('UserClass.php');
class Cliente extends User
{
        private int $idcliente;
        private string $retiradas;
        private string $receitas;


        public function __construct($idcliente, $retiradas, $receitas, $nome, $cpf_cnpj, $idade, $endereco, $email, $permissao,$senha)
        {
                parent::__construct($nome, $cpf_cnpj, $idade, $endereco, $email, $permissao, $senha);
                $this->idcliente = $idcliente;
                $this->retiradas = $retiradas;
                $this->receitas = $receitas;
        }

        /**
         * Get the value of idcliente
         */
        public function getIdcliente(): int
        {
                return $this->idcliente;
        }

        /**
         * Set the value of idcliente
         */
        public function setIdcliente(int $idcliente): self
        {
                $this->idcliente = $idcliente;

                return $this;
        }

        /**
         * Get the value of retiradas
         */
        public function getRetiradas(): string
        {
                return $this->retiradas;
        }

        /**
         * Set the value of retiradas
         */
        public function setRetiradas(string $retiradas): self
        {
                $this->retiradas = $retiradas;

                return $this;
        }

        /**
         * Get the value of receitas
         */
        public function getReceitas(): string
        {
                return $this->receitas;
        }

        /**
         * Set the value of receitas
         */
        public function setReceitas(string $receitas): self
        {
                $this->receitas = $receitas;

                return $this;
        }
}
