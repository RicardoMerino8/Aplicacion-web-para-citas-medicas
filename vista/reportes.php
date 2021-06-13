<?php 
include "sesionDoctor.php";
$titulo = "Reportes";
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";
include "../modelo/PacienteDao.php";

?>

<?php 
    $listaPacientes = PacienteDao::obtenerListaPacientes();
?>
<div class="row mb-4">
    <div class="col-2">
        <h1>Reportes</h1>
    </div>
    <div class="col-10">
        <i class="far fa-file-pdf display-3 text-danger"></i>
    </div>
</div>

<div class="row mt-2">
    <div class="col-6">
        <div class="card">
            <h2 class="card-header card-title">Citas por estado</h2>
            <div class="card-body">
                <form action="../controlador/ReportesControlador.php" method="POST">
                    <label for="">Obtener reporte en PDF de citas por estado</label>
                    <select name="estadoCita" id="estadoCita" class="form-control mb-3">
                        <option value="1">Pendientes</option>
                        <option value="0">Realizadas</option>
                    </select>
                    <input type="submit" class="btn btn-success" value="Generar Reporte" name="btnGenerarRptCita" id="btnGenerarRptCita">
                </form>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <h2 class="card-header card-title">Expedientes por Paciente</h2>
            <div class="card-body">
                <form action="../controlador/ReportesControlador.php" method="POST">
                    <label for="">Obtener reporte en PDF de expedientes por paciente</label>
                    <select name="pacientes" id="pacientes" class="form-control mb-3">
                        <?php 
                            while($fila = $listaPacientes->fetch_assoc()){
                                echo '<option value="'.$fila["idPaciente"].'">'.$fila["nombreCompleto"].'</option>';
                                }
                        ?>
                    </select>
                    <input type="submit" class="btn btn-success" value="Generar Reporte" name="btnGenerarRptExpediente" id="btnGenerarRptExpediente">
                </form>
            </div>
        </div>
    </div>
</div>

</section>
        </div>
    </div>
</div>
<?php 
include "componentes/footer.php";
?>