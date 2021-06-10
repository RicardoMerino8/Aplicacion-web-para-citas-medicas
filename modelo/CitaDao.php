<?php
include_once "conexion/Conexion.php";


    class CitaDao{
        
        
        public function __construct(){
            
        }

        public function guardarCita($cita){

            $sql = "INSERT INTO cita(idDoctor, idSecretaria, idPaciente, fecha, hora, tipoConsulta, estado) VALUES(
                ".$cita->getIdDoctor()." , ".$cita->getIdSecretaria()." , ".$cita->getIdPaciente()." , '".$cita->getFecha()."' ,
                '".$cita->getHora()."', '".$cita->getTipoConsulta()."', '".$cita->getEstado()."'
            )";
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

        public function listarCitas(){
            $sql = "SELECT p.nombreCompleto, p.idPaciente, c.fecha, c.hora, c.tipoConsulta, c.idCita, c.estado FROM cita c INNER JOIN paciente p
            ON c.idPaciente = p.idPaciente ORDER BY fecha ASC, hora DESC;";
            $tabla = "";
            $arreglo= [];

            $conexion = new Conexion;
            $con = $conexion->conectar();
            $resultado = $con->query($sql);
            $conexion->desconectar($con);
            return $resultado;
        }

        //quitar el join
        public function listarCitasDeHoy(){
            $sql = "SELECT p.nombreCompleto, c.fecha, c.hora, c.tipoConsulta, p.idPaciente, d.fechaDiagnostico, d.frecuenciaCardiaca, d.peso, d.presionArterial, d.temperatura, d.observaciones FROM cita c INNER JOIN paciente p
            ON c.idPaciente = p.idPaciente 
            INNER JOIN diagnostico d ON d.idPaciente = p.idPaciente
            WHERE fecha=current_date() AND estado = 1 ORDER BY fecha ASC, hora DESC;";

            $conexion = new Conexion;
            $con = $conexion->conectar();
            $resultado = $con->query($sql);
            $conexion->desconectar($con);
            return $resultado;
        }

        public function listarCitasHoy(){
            $sql = "SELECT p.nombreCompleto, p.idPaciente, c.fecha, c.hora, c.tipoConsulta, c.estado FROM cita c INNER JOIN 
            paciente p ON c.idPaciente = p.idPaciente WHERE fecha=CURDATE() AND estado = 1 ORDER BY fecha ASC, hora DESC;";

            $conexion = new Conexion;
            $con = $conexion->conectar();
            $resultado = $con->query($sql);
            $conexion->desconectar($con);
            return $resultado;
        }

        public function editarCita($fecha, $hora, $idCita){
            $sql = "UPDATE cita SET fecha=' ".$fecha."', hora='".$hora."' WHERE idCita= $idCita" ;
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

        public function finalizarCita($idPaciente){
            $sql = "UPDATE cita SET estado = 0 where idPaciente=$idPaciente";
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

        public function numeroCitasTotales(){
            $sql = "SELECT SUM(idDoctor) from cita;";

            $conexion = new Conexion;
            $con = $conexion->conectar();
            $resultado = $con->query($sql);
            $conexion->desconectar($con);
            $fila = $resultado->fetch_assoc();
            return $fila["SUM(idDoctor)"];
        }

        public function citasPendientesHoy(){
            $sql = "SELECT SUM(idDoctor) from cita WHERE fecha=current_date() AND estado=1;";

            $conexion = new Conexion;
            $con = $conexion->conectar();
            $resultado = $con->query($sql);
            $conexion->desconectar($con);
            $fila = $resultado->fetch_assoc();
            return $fila["SUM(idDoctor)"];
        }

        public function citasPendientesSemana(){
            $sql = "SELECT SUM(idDoctor) from cita WHERE fecha < DATE_ADD(CURRENT_DATE(), INTERVAL 7 DAY ) and estado = 1";

            $conexion = new Conexion;
            $con = $conexion->conectar();
            $resultado = $con->query($sql);
            $conexion->desconectar($con);
            $fila = $resultado->fetch_assoc();
            return $fila["SUM(idDoctor)"];
        }

        
    }

?>