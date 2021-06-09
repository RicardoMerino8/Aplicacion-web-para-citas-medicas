<?php

if(isset($_POST["btnGenerarRptCita"])){
    $estado = $_POST["estadoCita"];
    header("location: ../vista/reporte.php?estado=$estado");
}if(isset($_POST["btnGenerarRptExpediente"])){
    $id = $_POST["pacientes"];
    header("location: ../vista/reporteExpediente.php?paciente=$id");
}

?>