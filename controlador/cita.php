<?php

include_once "../modelo/PacienteDao.php";

if(isset($_REQUEST)){
    $nombrePaciente = $_POST["nombre"];
    $pacienteResult = PacienteDao::buscarPorNombre($nombrePaciente);

if($pacienteResult->num_rows > 0){
    $jsonDato = [];
    $i=0;
    /* while($fila = $pacienteResult->fetch_assoc()){
        $jsonDato[$i] = $fila["nombreCompleto"];
        $jsonDato[$i+1] = $fila["idPaciente"];
        $i++;
    }
    json_encode(); */

    $fila = $pacienteResult->fetch_assoc();
    $arr = array("nombre"=> $fila["nombreCompleto"], "id"=>$fila["idPaciente"] );
    echo json_encode($arr);
    }else{
        echo "No se encontraron resultados con ese nombre";
    }
}



?>

