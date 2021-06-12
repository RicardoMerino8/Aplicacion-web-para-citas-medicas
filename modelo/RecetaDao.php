<?php 
include "Receta.php";
include_once "conexion/Conexion.php";
class RecetaDao{
    public function guardarReceta($receta){
        $sql ="INSERT INTO receta(nombreMedicamento, dosis, idDiagnostico) VALUES('".$receta->getNombreMedicamento()."', '".$receta->getDosis()."', ".$receta->getIdDiagnostico()."
        );";
        echo $sql;
        $conexion = new Conexion;
        $con = $conexion->conectar();
        $resultado = $con->query($sql);
        $conexion->desconectar($con);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    public function obtenerRecetasPorIdDiag($idDiagnostico){
        $sql = "SELECT * FROM receta where idDiagnostico=" .$idDiagnostico;
        $conexion = new Conexion;
        $con = $conexion->conectar();
        $resultado = $con->query($sql);
        $conexion->desconectar($con);
        return $resultado;
    }

}

?>