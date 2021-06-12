<?php 
include_once "conexion/Conexion.php";
class UsuarioDao{

    public function __construct(){

    }

    public function validarUsuario($nombreUsuario, $pass){
        $sql = "SELECT * FROM usuario WHERE nombreUsuario='".$nombreUsuario."' AND contrasena='".$pass."';";
        $con = Conexion::conectar();
        $result = $con->query($sql);
        Conexion::desconectar($con);
        if($result->num_rows >0){
            return $result;
        }else{
            return null;
        }
    }


}

?>