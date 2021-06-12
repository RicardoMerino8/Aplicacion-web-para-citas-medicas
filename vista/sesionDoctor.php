<?php
include "../modelo/Usuario.php";
session_start();

if(isset($_SESSION["sesion"])){
	$usuario = unserialize($_SESSION["sesion"]);
    if($usuario->getIdRol() == 2){
	header("location: citas.php");
    }
}else{
	header("location: ../index.php");
}


?>