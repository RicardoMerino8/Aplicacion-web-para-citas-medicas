<?php 
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";
include "../modelo/CitaDao.php";
include "../modelo/PacienteDao.php";


?>

<div class="row mt-4">
          <h2>Bienvenido Doctor</h2>
          <br> 
            <div class="col-12 d-flex justify-content-between">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Citas Pendientes Hoy</div>
                    <div class="card-body">
                      <h2 class="card-title text-center"><?php echo CitaDao::citasPendientesHoy(); ?></h2>
                      <p class="card-text">Citas pendientes para hoy 09-06-2021</p>
                    </div>
                  </div>
                  <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Citas Pendientes esta semana</div>
                    <div class="card-body">
                      <h2 class="card-title text-center"><?php echo CitaDao::citasPendientesSemana(); ?></h2>
                      <p class="card-text">Citas pendientes para realizar dentro de los próximos 7 días</p>
                    </div>
                  </div>
                  <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Citas Realizadas hasta la fecha</div>
                    <div class="card-body">
                      <h2 class="card-title text-center"><?php echo CitaDao::numeroCitasTotales(); ?></h2>
                      <p class="card-text">Citas realizadas desde el comienzo a la fecha</p>
                    </div>
                  </div>
            </div>
        </div>
        <a href="citaspasadas.php" class="btn btn-primary mb-3 mt-3">Consultar Citas Pasadas</a>
<?php $citas = CitaDao::listarCitasHoy(); 

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
        
            while($fila = $citas->fetch_assoc()){
                echo "<tr> ";
                echo "<td>" . $fila["nombreCompleto"]. "</td>";
                echo "<td>" . $fila["fecha"]. "</td>";
                echo "<td>" . $fila["hora"]. "</td>";
                echo "<td>" . $fila["tipoConsulta"]. "</td>";
                echo "<td>" . "<a href='expediente.php?id=".$fila["idPaciente"]."' class='btn btn-primary' )'>
                Ver Expediente Médico</a> </td></tr>";
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


        </section>
        </div>
    </div>
</div>
<?php include "componentes/footer.php"; ?>
