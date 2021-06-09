<?php
include "../modelo/DiagnosticoDao.php";

include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";


        if(isset($_POST["btnVerExpediente"])){
            $idPaciente = $_POST["idPaciente"];
            $diag =DiagnosticoDao::obtenerDiagnosticoPorIdPaciente($idPaciente);
            
            echo "
            
            <h2>Expediente del Paciente: </h2>
<table class='table' id='tabla'>
        <thead>
            <tr>
                <th>Nombre Paciente</th>
                <th>Ultima Fecha Diagnostico</th>
                <th>Frecuencia Cardiaca</th>
                <th>Peso</th>
                <th>Presión Arterial</th>
                <th>Temperatura</th>
                <th>Observaciones</th>
                
                <th><button type='button' class='btn btn-success' data-toggle='modal' data-target='#exampleModal3'>
                Agregar Diagnostico
              </button></th>
            </tr>
        </thead>
        <tbody>
            ";
            while($fila = $diag->fetch_assoc()){
                echo "<tr> ";
                echo "<td>" . $fila["nombreCompleto"]. "</td>";
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

            <input type="text" id="idPaciente" name="idPaciente">
            <input type="text" id="fechaDiagnostico" name="fechaDiagnostico" value="<?php echo date('l'); ?>">
            <label for="">Frecuencia Cardiaca</label>
            <input type="text" name="frecuenciaCardiaca" id="frecuenciaCardiaca">
            <label for="">Temperatura</label>
            <input type="text" name="temperatura" id="temperatura">
            <label for="">Presión Arterial</label>
            <input type="text" name="presionArterial" id="presionArterial">
            <label for="">Peso</label>
            <input type="text" name="peso" id="peso">
            <label for="">Observaciones</label>
            <input type="text" name="observaciones" id="observaciones">
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