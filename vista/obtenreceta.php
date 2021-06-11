<?php
include "../modelo/RecetaDao.php";
include_once "../modelo/Receta.php";
include_once "../modelo/DiagnosticoDao.php";

$datos = $_POST["data"];
$idPaciente = $_GET["paciente"];
$idDiagnostico = DiagnosticoDao::obtenerIdDiagnostico($idPaciente);

foreach($datos as $dato){
    $receta2 = new Receta();
    $receta2->setNombreMedicamento($dato["medicamento"]);
    $receta2->setDosis($dato["dosis"]);
    $receta2->setIdDiagnostico($idDiagnostico);
    RecetaDao::guardarReceta($receta2);
}

?>