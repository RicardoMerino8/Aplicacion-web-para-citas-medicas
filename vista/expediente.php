<?php
session_start();
$usuario = unserialize($_SESSION["sesion"]);
if($usuario==null ){
  header("location: ../index.php");
}
include "../modelo/DiagnosticoDao.php";
include "../modelo/PacienteDao.php";
include "../modelo/RecetaDao.php";
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";


        if(isset($_GET)){
            $idPaciente = $_GET["id"];
            $diag =DiagnosticoDao::obtenerDiagnosticoPorIdPaciente($idPaciente);
            $paciente = PacienteDao::obtenerPacientePorId($idPaciente);
            $fila = $diag->fetch_assoc();
            $datoPaciente = $paciente->fetch_assoc();

            ?>
            
            <?php 

            echo "
            <!-- Button trigger modal -->
            
            <div class='row mb-4'>
              <div class='col-7'>
              <h2>Expediente del Paciente: ".$fila["nombreCompleto"]." </h2>
              </div>
              <div class='col-5'> ";
              if($usuario->getIdRol() == 2){
                echo "<button type='button' class='btn  p-0' data-toggle='modal' data-target='#modalExpediente' id='editarExpediente'>
                <i class='fas fa-edit display-3 text-primary' ></i>
                </button>";
              }
              echo "
              </div>
            </div>
            <div class='row'>
              <div class='col-6'>
                <span class='font-weight-bold'>Nombre Completo: </span> <input class='form-control' type='text' id='nombrePaciente' value='".$datoPaciente['nombreCompleto']."' disabled>
              </div>
              <div class='col-6'>
                <span class='font-weight-bold'>Edad: </span><input class='form-control' type='text' id='edad' value='".$datoPaciente['edad'] ."' disabled>
              </div>
            </div>

            <div class='row mb-4'>
              <div class='col-6'>
              <span class='font-weight-bold'>Dirección: </span><input class='form-control' type='text' id='direccion' value='". $datoPaciente["direccion"]."' disabled>
              </div>
              <div class='col-6'>
              <span class='font-weight-bold'>Teléfono: </span><input class='form-control' type='text' id='telefono' value='".$datoPaciente["telefono"]."' disabled>
              </div>
            </div>
            
            


<table class='table' id='tabla'>
        <thead class='thead-dark text-center'>
            <tr>
                
                <th>Ultima Fecha Diagnostico</th>
                <th>Frecuencia Cardiaca</th>
                <th>Peso</th>
                <th>Presión Arterial</th>
                <th>Temperatura</th>
                <th>Observaciones</th>
                <th>Receta</th>
            </tr>
        </thead>
        <tbody>
            ";
            while($fila = $diag->fetch_assoc()){
                echo "<tr class='border'> ";

                echo "<td class='text-center'>" . $fila["fechaDiagnostico"]. "</td>";
                echo "<td class='text-center'>" . $fila["frecuenciaCardiaca"]. " lat/min</td>";
                echo "<td class='text-center'>" . $fila["peso"]. " lbs</td>";
                echo "<td class='text-center'>" . $fila["presionArterial"]. " mm Hg</td>";
                echo "<td class='text-center'>" . $fila["temperatura"]. " °c</td>";
                echo "<td class='text-center'>" . $fila["observaciones"]. "</td>";
                
                //echo "<td>"  . $filaReceta = RecetaDao::obtenerRecetasPorIdDiag($fila["idDiagnostico"])."</td>
                echo "<td><ul>"; 
                $filaReceta = RecetaDao::obtenerRecetasPorIdDiag($fila['idDiagnostico']);
                while($filaNueva = $filaReceta->fetch_assoc()){
                  echo "<li>" . $filaNueva["nombreMedicamento"] . " - " . $filaNueva["dosis"] ."</li> ";
                }
                
                 echo "</ul></td></tr>";
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
<div class="modal fade" id="modalExpediente" tabindex="-1" role="dialog" aria-labelledby="modalExpedienteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalExpedienteLabel">Actualización de datos de Paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class='row'>
        <input type="hidden" id="idPaciente" value="<?php echo $idPaciente; ?>">
              <div class='col-6'>
                <span class="font-weight-bold">Nombre Completo: </span> <input class='form-control' type='text' id='nombrePacienteModal' >
              </div>
              <div class='col-6'>
                <span class="font-weight-bold">Edad: </span><input class='form-control' type='text' id='edadModal' >
              </div>
            </div>

            <div class='row mb-4'>
              <div class='col-6'>
              <span class="font-weight-bold">Dirección: </span><input class='form-control' type='text' id='direccionModal' >
              </div>
              <div class='col-6'>
              <span class="font-weight-bold">Teléfono: </span><input class='form-control' type='text' id='telefonoModal'>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="actualizarExpediente">Actualizar Datos</button>
      </div>
    </div>
  </div>
</div>

<script>
  $("#editarExpediente").on("click", function(){
    var nombrePaciente = $("#nombrePaciente").val();
    var edad = $("#edad").val();
    var direccion = $("#direccion").val();
    var telefono = $("#telefono").val();

    $("#nombrePacienteModal").val(nombrePaciente);
    $("#edadModal").val(edad);
    $("#direccionModal").val(direccion);
    $("#telefonoModal").val(telefono);
  })

  $("#actualizarExpediente").on("click", function(){
    //if(nombrePaciente !="" && edad!="" && direccion!="" && telefono!=""){
      var nombrePacienteModal = $("#nombrePacienteModal").val();
      var edadModal = parseInt($("#edadModal").val());
      var direccionModal = $("#direccionModal").val();
      var telefonoModal = $("#telefonoModal").val();
      var id= parseInt($("#idPaciente").val());

      var objExpediente = {"nombrePaciente": nombrePacienteModal, "edad": edadModal, "direccion": direccionModal, "telefono": telefonoModal,"id": id};
      console.log(objExpediente);
      
      $.ajax({
        //contentType:false,
        
        type: 'POST',
        data: objExpediente,
        url: '../controlador/editExpediente.php'
      }).done(function(respuesta){
        $("#modalExpediente").modal("hide");
        swal({
          title: "Paciente actualizado correctamente",
          text: "Se actualizaron los datos del expediente de paciente de forma exitosa",
          icon: "success"
          });
          $("#nombrePaciente").val(objExpediente.nombrePaciente);
          $("#edad").val(objExpediente.edad);
          $("#direccion").val(objExpediente.direccion);
          $("#telefono").val(objExpediente.telefono);
          console.log(objExpediente)
        console.log(respuesta)
      }).fail(function(){
        console.log("ERROR")
      })
    //}
  })

</script>
<?php include "componentes/footer.php"; ?>