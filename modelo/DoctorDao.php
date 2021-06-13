<?php 

class DoctorDao{

    public function obtenerNombreDoctor($id){
        $sql = "SELECT d.numeroJVPM, u.nombreCompleto from Doctor d INNER JOIN usuario u
        ON d.idUsuario = u.idUsuario WHERE idDoctor = $id";
        $conexion = new Conexion;
        $con = $conexion->conectar();
        $resultado = $con->query($sql);
        $conexion->desconectar($con);
        $fila = $resultado->fetch_assoc();
        if($fila !=null){
            return $fila["nombreCompleto"];
        }
    }

}

?>