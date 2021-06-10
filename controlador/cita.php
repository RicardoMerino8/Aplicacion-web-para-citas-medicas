<?php
include_once "../modelo/PacienteDao.php";
//if(isset($_REQUEST)){
    $nombrePaciente = $_POST["nombre"];
    $pacienteResult = PacienteDao::buscarPorNombre($nombrePaciente);

if($pacienteResult->num_rows > 0){
    $fila = $pacienteResult->fetch_assoc();
    $arr = array("nombre"=> $fila["nombreCompleto"], "id"=>$fila["idPaciente"] );
    echo json_encode($arr);
    }




?>

