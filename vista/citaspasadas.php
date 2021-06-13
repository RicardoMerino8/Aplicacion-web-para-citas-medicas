<?php include "../modelo/CitaDao.php";
session_start();
$usuario = unserialize($_SESSION["sesion"]);
if($usuario==null ){
    header("location: ../index.php");
}
$titulo = "Citas Pasadas";
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";
include "../modelo/DoctorDao.php";

 $citas3 = CitaDao::listarCitas(); 
 ?>
<h2>Historial de Citas Pasadas</h2>
<?php
echo "
        <table class='table mt-4' id='tabla'>
        <thead class='thead-dark'>
            <tr>
                <th>Nombre Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Tipo de Consulta</th>
                <th>Estado</th>
                <th>Realizada por Dr.</th>
            </tr>
        </thead>
        <tbody>
        ";  
        
            while($fila = $citas3->fetch_assoc() ){
                echo "<tr> ";
                echo "<td>" . $fila["nombreCompleto"]. "</td>";
                echo "<td>" . $fila["fecha"]. "</td>";
                echo "<td>" . $fila["hora"]. "</td>";
                echo "<td>" . $fila["tipoConsulta"]. "</td>";
                if($fila["estado"] == 1) {
                    echo "<td>" . "Pendiente" . "</td>";
                }else{
                    echo "<td>" . "Terminada" . "</td>";
                };
                echo "<td>".  DoctorDao::obtenerNombreDoctor(1). "</td></tr>";
            }
        echo "
        </tbody>
    </table>
        ";
?>

</section>
        </div>
    </div>
</div>

<?php include "componentes/footer.php"; ?>