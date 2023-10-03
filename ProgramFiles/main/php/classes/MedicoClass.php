<?php 
    class Medico extends User{
        private int $idmedico;
        private string $registro;
        private string $prescricoes;

       

        /**
         * Get the value of idmedico
         */
        public function getIdmedico(): int
        {
                return $this->idmedico;
        }

        /**
         * Set the value of idmedico
         */
        public function setIdmedico(int $idmedico): self
        {
                $this->idmedico = $idmedico;

                return $this;
        }

        /**
         * Get the value of registro
         */
        public function getRegistro(): string
        {
                return $this->registro;
        }

        /**
         * Set the value of registro
         */
        public function setRegistro(string $registro): self
        {
                $this->registro = $registro;

                return $this;
        }

        /**
         * Get the value of prescricoes
         */
        public function getPrescricoes(): string
        {
                return $this->prescricoes;
        }

        /**
         * Set the value of prescricoes
         */
        public function setPrescricoes(string $prescricoes): self
        {
                $this->prescricoes = $prescricoes;

                return $this;
        }
    }
