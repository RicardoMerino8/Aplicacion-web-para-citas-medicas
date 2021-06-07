<?php
    class Usuario{

        private $idUsuario;
        private $nombreUsuario;
        private $nombreCompleto;
        private $contraseña;
        private $telefono;
        private $idRol;

        public function __construct(){
            
        }

        public function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }
        
        public function getIdUsuario(){
            return $this->idUsuario;
        }

        public function setNombreUsuario($nombreUsuario){
            $this->nombreUsuario = $nombreUsuario;
        }

        public function getNombreUsuario(){
            return $this->nombreUsuario;
        }

        public function setNombreCompleto($nombreCompleto){
            $this->nombreCompleto = $nombreCompleto;
        }

        public function getNombreCompleto(){
            return $this->nombreCompleto;
        }

        public function setContraseña($contraseña){
            $this->contraseña = $contraseña;
        }
        public function getContraseña(){
            return $this->contraseña;
        }

        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
        public function getTelefono(){
            return $this->telefono;
        }

        public function setIdRol($idRol){
            $this->idRol = $idRol;
        }

        public function getIdRol(){
            return $this->idRol;
        }
    }

?>