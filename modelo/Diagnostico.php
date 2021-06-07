<?php

class Diagnostico{
    private $idDiagnostico;
    private $idPaciente;
    private $fechaDiagnostico;
    private $frecuenciaCardiaca;
    private $temperatura;
    private $presionArterial;
    private $peso;
    private $observaciones;

    public function __construct(){

    }

    public function setIdDiagnostico($idDiagnostico){
        $this->idDiagnostico = $idDiagnostico;
    }

    public function getIdDiagnostico(){
        return $this->idDiagnostico;
    }

    public function setIdPaciente($idPaciente){
        $this->idPaciente = $idPaciente;
    }

    public function getIdPaciente(){
        return $this->idPaciente;
    }

    public function setFechaDiagnostico($fechaDiagnostico){
        $this->fechaDiagnostico = $fechaDiagnostico;
    }

    public function getFechaDiagnostico(){
        return $this->fechaDiagnostico;
    }

    public function setFrecuenciaCardiaca($frecuenciaCardiaca){
        $this->frecuenciaCardiaca = $frecuenciaCardiaca;
    }

    public function getFrecuenciaCardiaca(){
        return $this->frecuenciaCardiaca;
    }

    public function setTemperatura($temperatura){
        $this->temperatura = $temperatura;
    }

    public function getTemperatura(){
        return $this->temperatura;
    }

    public function setPresionArterial($presionArterial){
        $this->presionArterial = $presionArterial;
    }

    public function getPresionArterial(){
        return $this->presionArterial;
    }

    public function setPeso($peso){
        $this->peso = $peso;
    }

    public function getPeso(){
        return $this->peso;
    }

    public function setObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }

    public function getObservaciones(){
        return $this->observaciones;
    }

}


?>