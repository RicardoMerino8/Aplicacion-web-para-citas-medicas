<?php 
require_once "../modelo/ReportesDao.php";
require_once  '../vendor/autoload.php';

$estado = $_GET["estado"];
$resultados = ReportesDao::reporteListaDeCitasPorEstado($estado);

$html = "";
$html .= '<header class="bg-info  py-4 text-center">
<p align="center"><img src="img/logo.jpg" width="300px"></p>
<h2 class="titulo">Lista de Citas por Estado</h2>
</header><br><br>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Motivo de Consulta</th>
                <th>Estado de la cita</th>
            </tr>
        </thead>
        <tbody>
';

while($fila = $resultados->fetch_assoc()){
    $html .= '<tr><td>'. $fila["nombreCompleto"] . '</td>'.
             '<td>' . $fila["fecha"] . '</td>'.
             '<td>' . $fila["hora"] . '</td> '.
             '<td>'. $fila["tipoConsulta"] . '</td>'; 
             if($fila["estado"] == 1){
                $html .= '<td>Pendiente</td></tr>';
             }else{
                $html .= '<td>Realizada</td></tr>';
             } 
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