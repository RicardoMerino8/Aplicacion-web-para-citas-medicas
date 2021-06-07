<?php
    class Rol{
        private $idRol;
        private $nombreRol;

        public function __construct(){

        }

        public function setIdRol($idRol){
            $this->idRol = $idRol;
        }

        public function getIdRol(){
            return $this->idRol;
        }

        public function setNombreRol($nombreRol){
            $this->nombreRol = $nombreRol;
        }

        public function getNombreRol(){
            return $this->nombreRol;
        }
    }

?>