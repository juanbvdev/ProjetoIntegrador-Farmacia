<?php 
    class Cliente {
        private $id;
        private $nome;
        private $cpf;
        private $idade;
        private $endereco;
        private $email;
        private $permissao;
        private $cartoes;
        private $compras;
        private $receitas;

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
         * Get the value of cartoes
         */
        public function getCartoes()
        {
                return $this->cartoes;
        }

        /**
         * Set the value of cartoes
         */
        public function setCartoes($cartoes): self
        {
                $this->cartoes = $cartoes;

                return $this;
        }

        /**
         * Get the value of compras
         */
        public function getCompras()
        {
                return $this->compras;
        }

        /**
         * Set the value of compras
         */
        public function setCompras($compras): self
        {
                $this->compras = $compras;

                return $this;
        }

        /**
         * Get the value of receitas
         */
        public function getReceitas()
        {
                return $this->receitas;
        }

        /**
         * Set the value of receitas
         */
        public function setReceitas($receitas): self
        {
                $this->receitas = $receitas;

                return $this;
        }
    }
?>