<?php 
include_once "../modelo/PacienteDao.php";

if($_POST){
    $nombre = $_POST["nombrePaciente"];
    $edad = $_POST["edad"];
    $direccion =$_POST["direccion"];
    $telefono = $_POST["telefono"];
    $id = $_POST["id"];

    $paciente = new Paciente();
    $paciente->setNombreCompleto($nombre);
    $paciente->setEdad($edad);
    $paciente->setDireccion($direccion);
    $paciente->setTelefono($telefono);
    $paciente->setIdPaciente($id);

if(PacienteDao::actualizarPaciente($paciente)){
    echo "ACTUALIZADO CORRECTAMENTE";
}else{
    echo "NO SE PUDO ACTUALIZAR";
}
}

?>