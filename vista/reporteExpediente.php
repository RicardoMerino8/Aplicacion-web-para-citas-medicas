<?php 
include "sesionDoctor.php";
require_once "../modelo/ReportesDao.php";
require_once  '../vendor/autoload.php';
require "componentes/head.php";
require_once "../modelo/PacienteDao.php";


$idPaciente = $_GET["paciente"];

$nombrePaciente = PacienteDao::obtenerNombrePacientePorId($idPaciente);
    $resultados = ReportesDao::reporteExpediente($idPaciente);
    $html = "";
    $html .= '<header class="bg-info  py-4 text-center">
    <p align="center"><img src="img/logo.jpg" width="300px"></p>
    <h2 class="titulo">Expediente Médico de '.$nombrePaciente.'</h2>
    </header><br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha de Diagnostico</th>
                    <th>Frecuencia Cardíaca</th>
                    <th>Temperatura</th>
                    <th>Presión Arterial</th>
                    <th>Peso</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
    ';
    
    while($fila = $resultados->fetch_assoc()){
        $html .= '<tr><td>' . $fila["fechaDiagnostico"] . '</td>'.
                 '<td>' . $fila["frecuenciaCardiaca"] . '</td> '.
                 '<td>'. $fila["temperatura"] . '</td>' .
                 '<td>' . $fila["presionArterial"] . '</td> '.
                 '<td>' . $fila["peso"] . '</td> '.
                 '<td>' . $fila["observaciones"] . '</td> </tr>';
    }
    $html .= '
        </tbody>
    </table>
    <style>
    table, th, td {
        text-aling: center;
        border: 1px solid steelblue;
        border-collapse: collapse;
        }
    </style>';
    
    $pdf = new \Mpdf\Mpdf();
    $pdf->WriteHTML($html);
    $pdf->Output();

?>