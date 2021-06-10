<?php
include "../modelo/DiagnosticoDao.php";

include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";


        if(isset($_GET)){
            $idPaciente = $_GET["id"];
            $diag =DiagnosticoDao::obtenerDiagnosticoPorIdPaciente($idPaciente);
            $fila = $diag->fetch_assoc();
            echo "
            
            <h2>Expediente del Paciente: ".$fila["nombreCompleto"]." </h2>
            <button type='button' class='btn btn-success' data-toggle='modal' data-target='#exampleModal3'>
                Agregar Diagnostico
              </button>
<table class='table' id='tabla'>
        <thead>
            <tr>
                
                <th>Ultima Fecha Diagnostico</th>
                <th>Frecuencia Cardiaca</th>
                <th>Peso</th>
                <th>Presión Arterial</th>
                <th>Temperatura</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            ";
            while($fila = $diag->fetch_assoc()){
                echo "<tr> ";

                echo "<td>" . $fila["fechaDiagnostico"]. "</td>";
                echo "<td>" . $fila["frecuenciaCardiaca"]. "</td>";
                echo "<td>" . $fila["peso"]. "</td>";
                echo "<td>" . $fila["presionArterial"]. "</td>";
                echo "<td>" . $fila["temperatura"]. "</td>";
                echo "<td>" . $fila["observaciones"]. "</td></tr>";
            }

            echo "
            </tbody>
            </table>
            ";
        }
        ?>
        </section>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="../controlador/DiagnosticoControlador.php" method="POST">
            <input type="hidden" id="idPaciente" name="idPaciente" value="<?php echo $idPaciente?>">
            <div class="form-group">
              <label for="">Fecha Diagnostico</label>
              <input class="form-control" type="date" id="fechaDiagnostico" name="fechaDiagnostico" value="<?php date_default_timezone_set("UTC"); echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
              <label for="">Frecuencia Cardiaca</label>
              <input class="form-control" type="text" name="frecuenciaCardiaca" id="frecuenciaCardiaca">
            </div>
            <div class="form-group">
              <label for="">Temperatura</label>
              <input class="form-control" type="text" name="temperatura" id="temperatura">
            </div>
            <div class="form-group">
              <label for="">Presión Arterial</label>
              <input class="form-control" type="text" name="presionArterial" id="presionArterial">
            </div>
            <div class="form-group">
              <label for="">Peso</label>
              <input class="form-control" type="text" name="peso" id="peso">
            </div>
            <div class="form-group">
              <label for="">Observaciones</label>
              <input class="form-control" type="text" name="observaciones" id="observaciones">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btnDiagnostico" name="btnDiagnostico" data-toggle='modal2' data-target='#exampleModal3'>Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include "componentes/footer.php"; ?>