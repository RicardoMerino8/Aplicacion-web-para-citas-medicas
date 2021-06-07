<?php
    class Secretaria{
        private $idSecretaria;
        private $idUsuario;

        public function __construct(){

        }

        public function setIdSecretaria($idSecretaria){
            $this->idSecretaria = $idSecretaria;
        }

        public function getIdSecretaria(){
            return $this->idSecretaria;
        }

        public function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }

        public function getIdUsuario(){
            return $this->idUsuario;
        }
    }

?>