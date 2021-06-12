<?php include "../modelo/CitaDao.php";
session_start();
$usuario = unserialize($_SESSION["sesion"]);
if($usuario==null ){
    header("location: ../index.php");
}
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";

 $citas3 = CitaDao::listarCitas(); 
 ?>
<h2>Expedientes de Pacientes</h2>
<?php
echo "
        <table class='table' id='tabla'>
        <thead>
            <tr>
                <th>Nombre Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Tipo de Consulta</th>
                <th>Estado</th>
                <th>Acción</th>
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
                echo "<td><a href='expediente.php?id=".$fila["idPaciente"]."' class='btn btn-primary' )'>Ver Expediente Médico</a></td></tr>";
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