<?php
session_start();
$usuario = unserialize($_SESSION["sesion"]);
if($usuario== null ){
  header("location: ../index.php");
}
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";
include "componentes/formCita.php";
include_once "../modelo/CitaDao.php";

?>
<div class="row mb-3 mt-2">
  <div class="col-12 d-flex justify-content-between">
  <h2>Citas pendientes de Hoy</h2>
  <a href="citaspasadas.php" class="btn btn-info">Ver Historial de Citas</a>
  </div>
</div>

<?php
    echo "
        <table class='table' id='tabla'>
        <thead>
            <tr>
                <th>Nombre Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Tipo de Consulta</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
        ";  
        
        cargarTabla();
        echo "
        </tbody>
    </table>
        ";
        
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btnGuardar" name="btnGuardar">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
function obtenerId(id, fecha, hora){
    $("#txtId").val(id);
    $("#txtFecha").val(fecha);
    $("#txtHora").val(hora);
}

function eliminarCita(idCita){
  var idCitaEliminar = {"idCita": idCita}
  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
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
  } else {
    swal("Your imaginary file is safe!");
  }
})
}
</script>

</section>
        </div>
    </div>
</div>
<?php 

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

function cargarTabla(){
  $arreglo = CitaDao::listarCitasHoy(); 
  while($fila = $arreglo->fetch_assoc()){
    echo "<tr> ";
    echo "<td>" . $fila["nombreCompleto"]. "</td>";
    echo "<td>" . $fila["fecha"]. "</td>";
    echo "<td>" . $fila["hora"]. "</td>";
    echo "<td>" . $fila["tipoConsulta"]. "</td>";
    echo "<td>" . "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onClick='obtenerId(".$fila["idCita"]." ,\"".$fila["fecha"]."\", \"".$fila["hora"]."\")'>
    Reprogramar Cita
  </button>  <button type='button' class='btn btn-danger' onClick='eliminarCita(".$fila["idCita"].")'>
  Cancelar Cita
</button></td></tr>";
}
}
?>
<?php include "componentes/footer.php";?>
