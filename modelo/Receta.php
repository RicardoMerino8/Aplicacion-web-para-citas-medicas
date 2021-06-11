<?php

    class Receta{
        private $idReceta;
        private $nombreMedicamento;
        private $dosis;
        private $idDiagnostico;

        public function __construct(){

        }

        public function setIdReceta($idReceta){
            $this->idReceta = $idReceta;
        }

        public function getIdReceta(){
            return $this->idReceta;
        }

        public function setNombreMedicamento($nombreMedicamento){
            $this->nombreMedicamento= $nombreMedicamento;
        }

        public function getNombreMedicamento(){
            return $this->nombreMedicamento;
        }

        public function setDosis($dosis){
            $this->dosis= $dosis;
        }

        public function getDosis(){
            return $this->dosis;
        }
        public function setIdDiagnostico($idDiagnostico){
            $this->idDiagnostico= $idDiagnostico;
        }

        public function getIdDiagnostico(){
            return $this->idDiagnostico;
        }

    }

?>