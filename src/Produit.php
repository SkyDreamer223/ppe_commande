<?php 
    class Produit {
        private int $tablettes;
        private int $pc;
        private int $portable;
        const PRIX_TABLETTE = 300;
        const PRIX_PC = 1200;
        const PRIX_PORTABLE = 700;
        private string $adresse;

        public function __construct($tablettes, $pc, $portable, $adresse){
            $this->tablettes = $tablettes;
            $this->pc = $pc;
            $this->portable = $portable;
            $this->adresse = $adresse;
        }

        public function getAdresse(){
            return $this->adresse;
        }

        public function getPrix(){
            return $this->tablettes* self::PRIX_TABLETTE + $this->pc* self::PRIX_PC + $this->portable*self::PRIX_PORTABLE;
        }

        public function getPrixHT(){
            return round($this->getPrix() * 0.8, 2);
        }
        public function getTablettes(){
            return $this->tablettes;
        }
        public function getPc(){
            return $this->pc;
        }
        public function getPortable(){
            return $this->portable;
        }
        public function getNbProduits(){
            return $this->tablettes + $this->pc + $this->portable;
        }

    }
?>