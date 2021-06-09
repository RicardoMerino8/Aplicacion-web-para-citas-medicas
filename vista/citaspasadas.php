<?php include "../modelo/CitaDao.php";
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";

 $citas3 = CitaDao::listarCitas(); 

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
                echo "<td>" . "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onClick='obtenerId(".$fila["idPaciente"]." )'>
                Ver Expediente Médico
              </button> </td></tr>";
            }
        echo "
        </tbody>
    </table>
        ";
?>


<script>
    function obtenerId(id){
        $("#idPaciente").val(id);
    }

    $("#btnGuardar").on("click", function(){
        
    })
</script>

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
      
        <form action="expediente.php" method="POST">

            <input type="text" id="idPaciente" name="idPaciente">
            <input type="text" id="fechaDiagnostico" name="fechaDiagnostico">
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btnVerExpediente" name="btnVerExpediente" data-toggle='modal2' data-target='#exampleModal2'>Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
</section>
        </div>
    </div>
</div>

<?php include "componentes/footer.php"; ?>