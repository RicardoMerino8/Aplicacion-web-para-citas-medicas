<?php 
require_once "../modelo/ReportesDao.php";
require_once  '../vendor/autoload.php';
include "sesionDoctor.php";
require "componentes/head.php";
require_once "../modelo/PacienteDao.php";
require_once "../modelo/DoctorDao.php";
require_once "../modelo/DiagnosticoDao.php";



$idPaciente = $_GET["paciente"];
if($idPaciente !=""){
    $paciente = PacienteDao::obtenerPacientePorId($idPaciente);
$doctor = DoctorDao::obtenerNombreDoctor(1);
$idDiagnostico = DiagnosticoDao::obtenerIdDiagnostico($idPaciente);
$receta = DiagnosticoDao::obtenerReceta($idDiagnostico);
$fecha = date('d-m-Y');
$fila = $paciente->fetch_assoc(); 


$datosTabla="";

if($receta !=null){
    while($algo = $receta->fetch_assoc()){
        $datosTabla.= "<tr><td>".$algo["nombreMedicamento"]."</td>";
        $datosTabla.= "<td>".$algo["dosis"]."</td></tr>";
   }
}


    $html = "";
    $html .= '

    <div class="container">
        <div class="row">
            <div class="col-2">
                <img class="img-fluid" src="img/logomedicina.png" alt="" width="20%">
                <img class="img-fluid" src="img/logo.jpg" alt="" width="60%">
            </div>
            <div class="col-10 text-center" style="font-weight:bold;">
                <p class="font-weight-bold letra-carta" style="font-size: 2em;">Doctor '.$doctor.'</p>
                <p class="font-weight-bold">Médico General</p>
                <p class="font-weight-bold">Numero JVPM: 274859</p>
                <p class="font-weight-bold">RECIEN NACIDOS * NIÑOS * ADOLESCENTES * VACUNAS</p>
                <p>Colonia San Benito, San Salvador</p>
            </div>
        </div>
        <hr>
        <div class="row mt-4">
            <div class="col-12">
                <div class="row">
                    <div class="col-5">
                        <p class="font-weight-bold" style="font-weight:bold;">NOMBRE PACIENTE: <span class="linea"> '.$fila["nombreCompleto"].'</span></p>
                    </div>
                    <div class="col-3">
                        <p class="font-weight-bold" style="font-weight:bold;">EDAD: <span class="linea">'.$fila["edad"].' años</span></p>
                    </div>
                    <div class="col-4">
                        <p class="font-weight-bold" style="font-weight:bold;">FECHA: <span class="linea">'.$fecha.'</span></p>
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre Medicamento</th>
                    <th>Dosis</th>
                </tr>
            </thead>
            <tbody> '.$datosTabla.'
            </tbody>
        </table>
        
        <div class="row text-center">
            <div class="col-6">
                <p>Horario de Lunes a Viernes</p>
                <p>8:00am - 5pm</p>
            </div>
            <div class="col-6 text-center">
                <p>___________________________________</p>
                <p>Firma del médico</p>
            </div>
        </div>
    </div>
    ';

    $bootstrap = file_get_contents('css/bootstrapmpdf.css'); 

    $pdf = new \Mpdf\Mpdf();
    $pdf->WriteHTML($bootstrap,1);
    $pdf->WriteHTML($html, 2);
    $pdf->Output();
}else{
    echo '<script>
    swal({
        title: "Complete los campos requeridos",
        text: "Por favor ingrese el nombre de paciente en el campo de búsqueda e intente de nuevo",
        icon: "error",
        dangerMode: false
    });
    setInterval(function(){
        location.href="recetas.php";
    }, 5000)
    </script>';
    
}
?>