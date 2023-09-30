<?php 
    class Medico {
        private $id;
        private $nome;
        private $cpf;
        private $idade;
        private $endereco;
        private $email;
        private $permissao;
        private $registro;
        private $prescricoes;

        /**
         * Get the value of nome
         */
        public function getNome()
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         */
        public function setNome($nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of cpf
         */
        public function getCpf()
        {
                return $this->cpf;
        }

        /**
         * Set the value of cpf
         */
        public function setCpf($cpf): self
        {
                $this->cpf = $cpf;

                return $this;
        }

        /**
         * Get the value of idade
         */
        public function getIdade()
        {
                return $this->idade;
        }

        /**
         * Set the value of idade
         */
        public function setIdade($idade): self
        {
                $this->idade = $idade;

                return $this;
        }

        /**
         * Get the value of endereco
         */
        public function getEndereco()
        {
                return $this->endereco;
        }

        /**
         * Set the value of endereco
         */
        public function setEndereco($endereco): self
        {
                $this->endereco = $endereco;

                return $this;
        }

        /**
         * Get the value of email
         */
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         */
        public function setEmail($email): self
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of permissao
         */
        public function getPermissao()
        {
                return $this->permissao;
        }

        /**
         * Set the value of permissao
         */
        public function setPermissao($permissao): self
        {
                $this->permissao = $permissao;

                return $this;
        }

        /**
         * Get the value of registro
         */
        public function getRegistro()
        {
                return $this->registro;
        }

        /**
         * Set the value of registro
         */
        public function setRegistro($registro): self
        {
                $this->registro = $registro;

                return $this;
        }

        /**
         * Get the value of prescricoes
         */
        public function getPrescricoes()
        {
                return $this->prescricoes;
        }

        /**
         * Set the value of prescricoes
         */
        public function setPrescricoes($prescricoes): self
        {
                $this->prescricoes = $prescricoes;

                return $this;
        }

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }
    }
?>