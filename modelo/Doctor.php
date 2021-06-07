<?php

    class Doctor{
        private $idDoctor;
        private $numeroJVPM;
        private $idUsuario;

        public function __construct(){

        }

        public function setIdDoctor($idDoctor){
            $this->idDoctor = $idDoctor;
        }

        public function getIdDoctor(){
            return $this->idDoctor;
        }

        public function setNumeroJVPM($numeroJVPM){
            $this->numeroJVPM= $numeroJVPM;
        }

        public function getNumeroJVPM(){
            return $this->numeroJVPM;
        }

        public function setIdUsuario($idUsuario){
            $this->idUsuario= $idUsuario;
        }

        public function getIduario(){
            return $this->idUsuario;
        }
    }

?>