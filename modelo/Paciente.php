<?php
    class Paciente{
        private $idPaciente;
        private $nombreCompleto;
        private $telefono;
        private $direccion;
        private $edad;
        private $idSecretaria;

        public function __construct(){

        }

        public function setIdPaciente($idPaciente){
            $this->idPaciente = $idPaciente;
        }

        public function getIdPaciente(){
            return $this->idPaciente;
        }

        public function setNombreCompleto($nombreCompleto){
            $this->nombreCompleto = $nombreCompleto;
        }

        public function getNombreCompleto(){
            return $this->nombreCompleto;
        }

        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }

        public function getDireccion(){
            return $this->direccion;
        }

        public function setEdad($edad){
            $this->edad = $edad;
        }

        public function getEdad(){
            return $this->edad;
        }

        public function setIdSecretaria($idSecretaria){
            $this->idSecretaria = $idSecretaria;
        }

        public function getIdSecretaria(){
            return $this->idSecretaria;
        }
    }

?>