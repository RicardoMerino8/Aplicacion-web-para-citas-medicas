<?php
include_once "credenciales.php";

    class Conexion{

        public function __construct(){

        }

        public function conectar(){
            $conexion = new mysqli(SERVIDOR, USER, PASS, BASEDATOS);
            if ($mysqli->connect_errno) {
                echo "Lo sentimos, este sitio web está experimentando problemas.";
                echo "Error: Fallo al conectarse a MySQL debido a: \n";
                echo "Errno: " . $mysqli->connect_errno . "\n";
                echo "Error: " . $mysqli->connect_error . "\n";
                exit;
            }
            
        }

        public function desconectar($conexion){
            $conexion->close();
        }


    }

?>