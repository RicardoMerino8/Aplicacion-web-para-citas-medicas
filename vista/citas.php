<?php
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";
include "componentes/formCita.php";
include_once "../modelo/CitaDao.php";
$arreglo = CitaDao::listarCitas(); 
    
    
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
        
            while($fila = $arreglo->fetch_assoc()){
                echo "<tr> ";
                echo "<td>" . $fila["nombreCompleto"]. "</td>";
                echo "<td>" . $fila["fecha"]. "</td>";
                echo "<td>" . $fila["hora"]. "</td>";
                echo "<td>" . $fila["tipoConsulta"]. "</td>";
                echo "<td>" . "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onClick='obtenerId(".$fila["idCita"]." ,\"".$fila["fecha"]."\", \"".$fila["hora"]."\")'>
                Reprogramar Cita
              </button> </td></tr>";
            }
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
    console.log("SE PUDO EL ID ES: " + id);
    $("#txtId").val(id);
    $("#txtFecha").val(fecha);
    $("#txtHora").val(hora);
}

</script>

</section>
        </div>
    </div>
</div>
<?php include "componentes/footer.php";?>
