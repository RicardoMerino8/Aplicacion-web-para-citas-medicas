<?php
include_once "Credenciales.php";

    class Conexion{

        public function __construct(){

        }

        public function conectar(){
            $conexion = new mysqli(SERVIDOR, USUARIO, PASS, BASEDATOS);
            if ($conexion->connect_errno) {
                echo "Lo sentimos, este sitio web está experimentando problemas.";
                echo "Error: Fallo al conectarse a MySQL debido a: \n";
                echo "Errno: " . $conexion->connect_errno . "\n";
                echo "Error: " . $conexion->connect_error . "\n";
                exit;
            }
            return $conexion;
        }

        public function desconectar($conexion){
            $conexion->close();
        }


    }

?>