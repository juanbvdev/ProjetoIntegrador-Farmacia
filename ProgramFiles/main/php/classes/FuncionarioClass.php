<?php 
    class Funcionario extends User {
        private int $id;
        private string $atendimento;        

        

        /**
         * Get the value of id
         */
        public function getId(): int
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId(int $id): self
        {
                $this->id = $id;

                return $this;
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
    }
