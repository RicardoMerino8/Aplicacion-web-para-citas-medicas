<?php
session_start();
$usuario = unserialize($_SESSION["sesion"]);
if($usuario==null ){
    header("location: ../index.php");
}
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";
include "../modelo/CitaDao.php";
$arreglo = CitaDao::listarCitasHoy(); 
?>
<h2>Citas pendientes de hoy</h2>
<?php
        echo "
        <table class='table' id='tabla'>
        <thead>
            <tr>
                <th>Nombre Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Tipo de Consulta</th>
            </tr>
        </thead>
        <tbody>
        ";  
        
            while($fila = $arreglo->fetch_assoc()){
                echo "<tr> ";
                echo "<td>" . $fila["nombreCompleto"]. "</td>";
                echo "<td>" . $fila["fecha"]. "</td>";
                echo "<td>" . $fila["hora"]. "</td>";
                echo "<td>" . $fila["tipoConsulta"]. "</td></tr>";
            }
        echo "
        </tbody>
    </table>
        ";

        
?>
<a href="citas.php" class="btn btn-primary">Regresar</a>

<?php include "componentes/footer.php";?>