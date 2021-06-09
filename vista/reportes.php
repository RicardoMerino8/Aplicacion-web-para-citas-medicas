<?php 
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";
include "../modelo/PacienteDao.php";

?>

<?php 
    $listaPacientes = PacienteDao::obtenerListaPacientes();
?>
<h2>Reporte para citas</h2>
<form action="../controlador/ReportesControlador.php" method="POST">
    <label for="">Obtener reporte de citas por estado</label>
    <select name="estadoCita" id="estadoCita">
        <option value="1">Pendientes</option>
        <option value="0">Realizadas</option>
    </select>
    <input type="submit" class="btn btn-success" value="Generar Reporte" name="btnGenerarRptCita" id="btnGenerarRptCita">
</form>

<h2>Reporte de Expedientes por Paciente</h2>
<form action="../controlador/ReportesControlador.php" method="POST">
    <label for="">Obtener reporte de expedientes por paciente</label>
    <select name="pacientes" id="pacientes">
    <?php 
        while($fila = $listaPacientes->fetch_assoc()){
            echo '<option value="'.$fila["idPaciente"].'">'.$fila["nombreCompleto"].'</option>';
        }
    ?>
    </select>
    <input type="submit" class="btn btn-success" value="Generar Reporte" name="btnGenerarRptExpediente" id="btnGenerarRptExpediente">
</form>

</section>
        </div>
    </div>
</div>
<?php 
include "componentes/footer.php";
?>