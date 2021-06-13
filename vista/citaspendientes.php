<?php
session_start();
$usuario = unserialize($_SESSION["sesion"]);
if($usuario==null ){
  header("location: ../index.php");
}

$titulo ="Citas Pendientes";
include "../modelo/CitaDao.php";
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";
include "../modelo/DoctorDao.php";
$citas3 = CitaDao::listarCitasPendientes(); 
?>

<h2>Citas Pendientes (Todas las fechas)</h2>
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
                echo "<td>".  DoctorDao::obtenerNombreDoctor(1). "</td>";
                if($usuario->getIdRol() ==2){
                    echo "<td>" . "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onClick='obtenerId(".$fila["idCita"]." ,\"".$fila["fecha"]."\", \"".$fila["hora"]."\")'>
                        Reprogramar Cita
                        </button>  <button type='button' class='btn btn-danger' onClick='eliminarCita(".$fila["idCita"].")'>
                        Cancelar Cita
                        </button></td></tr>";
                }
            }
        echo "
        </tbody>
    </table>
        ";
        if($_POST){
            $idCitaEliminar = $_POST["idCita"];
          if(CitaDao::eliminarCita($idCitaEliminar)){
            echo "Cita cancelada exitosamente";
            header("location: citas.php");
            cargarTabla();
          }else{
            echo "No se pudo cancelar la cita";
          }
        }
?>
<script>
function obtenerId(id, fecha, hora){
    $("#txtId").val(id);
    $("#txtFecha").val(fecha);
    $("#txtHora").val(hora);
}

function eliminarCita(idCita){
  var idCitaEliminar = {"idCita": idCita}
  swal({
  title: "¿Desea cancelar la cita?",
  text: "Una vez cancelada se eliminará de la base de datos",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    //codigo para eliminar cita
    $.ajax({
      type: 'POST',
      data: idCitaEliminar,
      url: 'citas.php'

    }).done(function(respuesta){
      swal({
        title: "Cita Cancelada",
        text: "Cita cancelada de forma exitosa de la base de datos",
        icon: "success",
      })
      location.href="citas.php";
    }).fail(function(){

    })
  }
})
}
</script>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reprogramar Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controlador/CitaControllador.php" method="POST">
        <input type="hidden" value="" name="txtId" id="txtId">
        <label for="">Fecha:</label>
        <input type="date" name="txtFecha" id="txtFecha">
        <label for="">Hora</label>
        <select name="txtHora" id="txtHora">
            <option value="8:00">8:00</option>
            <option value="9:00">9:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
        </select>
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="btnGuardar" name="btnGuardar">Reprogramar Cita</button>
        </form>
      </div>
    </div>
  </div>
</div>

</section>
        </div>
    </div>
</div>



include "componentes/footer.php";
?>