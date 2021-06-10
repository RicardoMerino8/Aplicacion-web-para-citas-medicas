
<?php 
include_once "conexion/Conexion.php";
include_once "Diagnostico.php";

class DiagnosticoDao{
    public function __construct(){

    }

    public function obtenerDiagnosticoPorIdPaciente($idPaciente){
        $sql = "SELECT *, p.nombreCompleto FROM diagnostico d INNER JOIN paciente p ON p.idPaciente= d.idPaciente WHERE d.idPaciente = $idPaciente";
        $conexion = new Conexion;
        $con = $conexion->conectar();
        $resultado = $con->query($sql);
        $conexion->desconectar($con);

        return $resultado;
    }

    public function insertarNuevoDiagnostico($diagnostico){
        $sql ="INSERT INTO diagnostico(idPaciente, fechaDiagnostico, frecuenciaCardiaca, temperatura, presionArterial, peso, observaciones) VALUES(
            ".$diagnostico->getIdPaciente().", '".$diagnostico->getFechaDiagnostico()."', ".$diagnostico->getFrecuenciaCardiaca().", 
            ".$diagnostico->getTemperatura().", ".$diagnostico->getPresionArterial().", ".$diagnostico->getPeso().", '".$diagnostico->getObservaciones()."'
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
}
?>
