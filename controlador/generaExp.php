<?php
include_once "../modelo/PacienteDao.php";

$paciente = new Paciente();
$paciente->setNombreCompleto($_POST["nombre"]);
$paciente->setTelefono($_POST["telefono"]);
$paciente->setDireccion($_POST["direccion"]);
$paciente->setEdad($_POST["edad"]);
$paciente->setIdSecretaria(1);
if(PacienteDao::agregarNuevoPaciente($paciente) !=null){
    echo "Expediente generado exitosamente al paciente " .$paciente->getNombreCompleto();
}else{
    echo "No se pudo abrir el expediente";
}

?>