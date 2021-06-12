<?php
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
            
            <h2>Expediente del Paciente: ".$fila["nombreCompleto"]." </h2>
            <p>Nombre Completo: " .$datoPaciente['nombreCompleto']. "</p>
            <p>Edad: " . $datoPaciente['edad'] ."</p>
            <p>Dirección: " . $datoPaciente["direccion"] ."</p>
            <p>Telefono: " . $datoPaciente["telefono"] ."</p>
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

<?php include "componentes/footer.php"; ?>