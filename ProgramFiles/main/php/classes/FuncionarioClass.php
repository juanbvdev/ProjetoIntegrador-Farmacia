<?php 
    require_once('UserClass.php');
    class Funcionario extends User {
        private int $idFuncionario;
        private string $atendimento;        

        public function __construct($idFuncionario, $atendimento, $nome, $cpf_cnpj, $idade, $endereco, $email, $permissao) {
                parent::__construct($nome, $cpf_cnpj, $idade, $endereco, $email, $permissao);
                $this->$idFuncionario = $idFuncionario;
                $this->$atendimento = $atendimento;
        }
        

        /**
         * Get the value of atendimento
         */
        public function getAtendimento(): string
        {
                return $this->atendimento;
        }

        /**
         * Set the value of atendimento
         */
        public function setAtendimento(string $atendimento): self
        {
                $this->atendimento = $atendimento;

                return $this;
        }

        /**
         * Get the value of idFuncionario
         */
        public function getIdFuncionario(): int
        {
                return $this->idFuncionario;
        }

        /**
         * Set the value of idFuncionario
         */
        public function setIdFuncionario(int $idFuncionario): self
        {
                $this->idFuncionario = $idFuncionario;

                return $this;
        }
    }
