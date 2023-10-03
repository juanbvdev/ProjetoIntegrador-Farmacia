<?php 
    require_once('UserClass.php');
    class Farmacia extends User {
        private int $idfarmacia;     

        public function __construct($idfarmacia, $nome, $cpf_cnpj, $idade, $endereco, $email, $permissao) {
                parent::__construct($nome, $cpf_cnpj, $idade, $endereco, $email, $permissao);
                $this->$idfarmacia = $idfarmacia;
        }

        /**
         * Get the value of idfarmacia
         */
        public function getIdfarmacia(): int
        {
                return $this->idfarmacia;
        }

        /**
         * Set the value of idfarmacia
         */
        public function setIdfarmacia(int $idfarmacia): self
        {
                $this->idfarmacia = $idfarmacia;

                return $this;
        }
    }
