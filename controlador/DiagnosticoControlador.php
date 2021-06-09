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
    echo "$fecha , $frecuencia , $temperatura , $observaciones";

    $diagnostico = new Diagnostico();
    $diagnostico->setIdPaciente($idPaciente);
    $diagnostico->setFechaDiagnostico($fecha);
    $diagnostico->setFrecuenciaCardiaca($frecuencia);
    $diagnostico->setTemperatura($temperatura);
    $diagnostico->setPresionArterial($presionArterial);
    $diagnostico->setPeso($peso);
    $diagnostico->setObservaciones($observaciones);
    DiagnosticoDao::insertarNuevoDiagnostico($diagnostico);

    if(CitaDao::finalizarCita($idPaciente)){
        header("location: ../vista/doctor.php");
    }else{
        echo "NO SE PUDO FINALIZAR LA CITA";
    }
    
}
// else{
//     header("location: ../vista/doctor.php");
// }

?>