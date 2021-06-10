<?php
    class Cita{
        private $idCita;
        private $idDoctor;
        private $idSecretaria;
        private $idPaciente;
        private $fecha;
        private $hora;
        private $tipoConsulta;
        private $estado;

        public function __construct(){

        }

        public function setIdCita($idCita){
            $this->idCita = $idCita;
        }

        public function getIdCita(){
            return $this->idCita;
        }

        public function setIdDoctor($idDoctor){
            $this->idDoctor = $idDoctor;
        }

        public function getIdDoctor(){
            return $this->idDoctor;
        }

        public function setIdSecretaria($idSecretaria){
            $this->idSecretaria = $idSecretaria;
        }

        public function getIdSecretaria(){
            return $this->idSecretaria;
        }

        public function setIdPaciente($idPaciente){
            $this->idPaciente = $idPaciente;
        }

        public function getIdPaciente(){
            return $this->idPaciente;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setHora($hora){
            $this->hora = $hora;
        }

        public function getHora(){
            return $this->hora;
        }

        public function setTipoConsulta($tipoConsulta){
            $this->tipoConsulta = $tipoConsulta;
        }

        public function getTipoConsulta(){
            return $this->tipoConsulta;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }

        public function getEstado(){
            return $this->estado;
        }

    }

?>