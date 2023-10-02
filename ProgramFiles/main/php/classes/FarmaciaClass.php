<?php 
    class Farmacia extends User {
        private int $idfarmacia;     

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
