<?php 
include "../modelo/DiagnosticoDao.php";


if(isset($_POST["btnGuardar"])){
    $idPaciente = $_POST["idPaciente"];
    $diag =DiagnosticoDao::obtenerDiagnosticoPorIdPaciente($idPaciente);
    include "../vista/doctor.php";
    
}if(isset($_POST["btnDiagnostico"])){
    include "../modelo/CitaDao.php";
    

    $idPaciente = $_POST["idPaciente"];
    $fecha = $_POST["fechaDiagnostico"];
    $frecuencia= $_POST["frecuenciaCardiaca"];
    $temperatura = $_POST["temperatura"];
    $presionArterial = $_POST["presionArterial"];
    $peso = $_POST["peso"];
    $observaciones = $_POST["observaciones"];

    $diagnostico = new Diagnostico();
    $diagnostico->setIdPaciente($idPaciente);
    $diagnostico->setFechaDiagnostico($fecha);
    $diagnostico->setFrecuenciaCardiaca($frecuencia);
    $diagnostico->setTemperatura($temperatura);
    $diagnostico->setPresionArterial($presionArterial);
    $diagnostico->setPeso($peso);
    $diagnostico->setObservaciones($observaciones);
    if(DiagnosticoDao::insertarNuevoDiagnostico($diagnostico)){
        if(CitaDao::finalizarCita($diagnostico->getIdPaciente())){
            header("location: ../vista/expediente.php?id=$idPaciente");
        }else{
            echo "NO SE PUDO FINALIZAR LA CITA";
        }
    }    
}

?>