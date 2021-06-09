<?php
include_once "conexion/Conexion.php";

class PacienteDao{
    public function __construct(){
            
    }

    public function buscarPorNombre($nombre){
        $sql = "SELECT * FROM paciente WHERE nombreCompleto LIKE '".$nombre."';";
        $conexion = new Conexion;
        $con = $conexion->conectar();
        $resultado = $con->query($sql);
        $conexion->desconectar($con);
        
        return $resultado; 
    }

    public function obtenerListaPacientes(){
        $sql = "SELECT * FROM paciente";
        $conexion = new Conexion;
        $con = $conexion->conectar();
        $resultado = $con->query($sql);
        $conexion->desconectar($con);
        
        return $resultado;
        
    }

    public function obtenerNombrePacientePorId($idPaciente){
        $sql = "SELECT nombreCompleto FROM paciente WHERE idPaciente=$idPaciente";
        $conexion = new Conexion;
        $con = $conexion->conectar();
        $resultado = $con->query($sql);
        $conexion->desconectar($con);
        $nombrePaciente= "";
        while($fila = $resultado->fetch_assoc()){
            $nombrePaciente = $fila["nombreCompleto"];
        }
        return $nombrePaciente;
    }

}

?>