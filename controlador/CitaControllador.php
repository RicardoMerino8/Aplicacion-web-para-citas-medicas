<?php
include_once "../modelo/Cita.php";
include_once "../modelo/CitaDao.php";
include "../vista/head.php";
//include "../vista/citas.php";


    //Controlador de Cita
    if(isset($_POST["guardarcita"])){
        include "../vista/formCita.php";
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $consulta = $_POST["consulta"];

        $cita = new Cita();
        $cita->setIdDoctor(1);
        $cita->setIdSecretaria(1);
        $cita->setIdPaciente(1);
        $cita->setFecha($fecha);
        $cita->setHora($hora);
        $cita->setTipoConsulta($consulta);
        var_dump($cita);

        if(CitaDao::guardarCita($cita)){
            header('location: ../vista/citas.php');
        }else{
            echo "ERROR AL GUARDAR LA CITA";
        }
    }if(isset($_POST["citas"])){
        include "../vista/citashoy.php";

    }else{
        include "../vista/formCita.php";
        $arreglo = CitaDao::listarCitas(); 
        
        //var_dump($arreglo);
        echo "
        <table class='table' id='tabla'>
        <thead>
            <tr>
                <th>Nombre Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Tipo de Consulta</th>
            </tr>
        </thead>
        <tbody>
        ";  
        
            while($fila = $arreglo->fetch_assoc()){
                echo "<tr> ";
                echo "<td>" . $fila["nombreCompleto"]. "</td>";
                echo "<td>" . $fila["fecha"]. "</td>";
                echo "<td>" . $fila["hora"]. "</td>";
                echo "<td>" . $fila["tipoConsulta"]. "</td></tr>";
            }
        echo "
        </tbody>
    </table>
        ";
    }
include "../vista/footer.php";

?>