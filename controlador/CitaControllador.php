<?php
include_once "../vista/componentes/head.php";
include_once "../modelo/Cita.php";
include_once "../modelo/CitaDao.php";
include_once "../modelo/PacienteDao.php";
include "../vista/componentes/head.php";


    if(isset($_POST["guardarcita"])){  //Se ejecuta al agendar una cita
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $consulta = $_POST["consulta"];
        $idPaciente = $_POST["txtIdPaciente"];

        $cita = new Cita();
        $cita->setIdDoctor(1);
        $cita->setIdSecretaria(1);
        $cita->setIdPaciente($idPaciente);
        $cita->setFecha($fecha);
        $cita->setHora($hora);
        $cita->setTipoConsulta($consulta);
        $cita->setEstado(1);

        if(CitaDao::guardarCita($cita)){
            header('location: ../vista/citas.php');
        }else{
            echo "ERROR AL GUARDAR LA CITA";
        }
    }if(isset($_POST["btnGuardar"])){ //Se ejecuta al reprogramar una cita ya hecha
        $fecha = $_POST["txtFecha"];
        $hora = $_POST["txtHora"];
        $idCita = $_POST["txtId"];
        if(CitaDao::editarCita($fecha, $hora, $idCita)){
            header("location:../vista/citas.php");
        }else{
            echo "NO SE REALIZO LA MODIFICACION";
        }
    }
include "../vista/componentes/footer.php";

?>