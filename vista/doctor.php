<?php
include "sesionDoctor.php";
$titulo ="Inicio Doctor";
include "componentes/head.php";
include "componentes/header.php";
include "componentes/contenedor.php";
include "../modelo/DoctorDao.php";
include "../modelo/CitaDao.php";
include "../modelo/PacienteDao.php";
include "../utilidades/func.php";
?>

<div class="row mt-4">  <!-- Este ID vendra de la sesion -->
          <h2>Bienvenido Doctor <?php echo DoctorDao::obtenerNombreDoctor(1); ?></h2>
          <br> 
            <div class="col-12 d-flex justify-content-between">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Citas Pendientes Hoy</div>
                    <div class="card-body">
                      <h2 class="card-title text-center"><?php echo CitaDao::citasPendientesHoy(); ?></h2>
                      <p class="card-text">Citas pendientes para hoy <?php echo date('j-m-Y'); ?></p>
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
        <h2>Citas de Hoy (<?php echo Func::obtenerFechaEspanol(); ?>)</h2>


<table class='table' id='tabla'>
<thead class="thead-dark">
    <tr>
        <th>Nombre Paciente</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Tipo de Consulta</th>
        <th>Acción</th>
    </tr>
</thead>
<tbody>

<?php $citas = CitaDao::listarCitasHoy();
if($citas->num_rows >0){
  while($fila = $citas->fetch_assoc()){
    echo "<tr> ";
    echo "<td>" . $fila["nombreCompleto"]. "</td>";
    echo "<td>" . $fila["fecha"]. "</td>";
    echo "<td>" . $fila["hora"]. "</td>";
    echo "<td>" . $fila["tipoConsulta"]. "</td>";
    echo "<td>" . "<a href='expediente.php?id=".$fila["idPaciente"]."' class='btn btn-primary' )'>
    Ver Expediente Médico</a> </td></tr>";
}
}else{
  
  echo '<tr>
  <td colspan="5"><center><h1 class="mt-4"><span class="badge bg-info text-white">No hay citas pendientes para hoy</span></h1></center></td>
  </tr>';
}
    

?>
</tbody>
</table>

<!-- <script>  ACTIVAR SI NO FUNCIONA ALGO
    function obtenerId(id){
        $("#idPaciente").val(id);
    }
</script> -->


        </section>
        </div>
    </div>
</div>
<?php include "componentes/footer.php"; ?>