<?php
include_once "conexion/Conexion.php";
include_once "Paciente.php";

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

    public function agregarNuevoPaciente($paciente){
        $sql = "INSERT INTO paciente (nombreCompleto, telefono, direccion, edad, idSecretaria) 
        VALUES ('".$paciente->getNombreCompleto()."', '".$paciente->getTelefono()."', '".$paciente->getDireccion()."', '".$paciente->getEdad()."', ".$paciente->getIdSecretaria().")";
        $conexion = new Conexion;
        $con = $conexion->conectar();
        $resultado = $con->query($sql);
        $conexion->desconectar($con);
        if($resultado){
            return $resultado;
        }else{
            return false;
        }

    }

}

?>