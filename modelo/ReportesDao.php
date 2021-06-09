<?php 
require_once "conexion/Conexion.php";
class ReportesDao{
    public function __construct(){

    }

    public function reporteListaDeCitasPorEstado($estado){
        $sql = "SELECT p.nombreCompleto, c.fecha, c.hora, c.tipoConsulta, c.estado from cita c INNER JOIN 
        paciente p ON c.idPaciente = p.idPaciente WHERE estado = $estado";

        $con = Conexion::conectar();
        $result = $con->query($sql);
        Conexion::desconectar($con);
        return $result;
    }

    public function reporteExpediente($idPaciente){
        $sql = "SELECT p.nombreCompleto, d.fechaDiagnostico, d.frecuenciaCardiaca, d.temperatura, d.presionArterial, d.peso, d.observaciones
        from diagnostico d INNER JOIN paciente p ON d.idPaciente = p.idPaciente
        WHERE p.idPaciente = $idPaciente";
        
        $con = Conexion::conectar();
        $result = $con->query($sql);
        Conexion::desconectar($con);
        //if($result->num_rows >0){
            return $result;
        //}else{
          //  return null;
        //}
        
    }


}

?>