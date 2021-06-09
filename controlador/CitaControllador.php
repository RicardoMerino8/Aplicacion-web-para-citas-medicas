<?php
include_once "../modelo/Cita.php";
include_once "../modelo/CitaDao.php";
include_once "../modelo/PacienteDao.php";
include "../vista/componentes/head.php";


    //Controlador de Cita
    if(isset($_POST["guardarcita"])){
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

        if(CitaDao::guardarCita($cita)){
            header('location: ../vista/citas.php');
        }else{
            echo "ERROR AL GUARDAR LA CITA";
        }
    }if(isset($_POST["btnGuardar"])){
        $fecha = $_POST["txtFecha"];
        $hora = $_POST["txtHora"];
        $idCita = $_POST["txtId"];
        if(CitaDao::editarCita($fecha, $hora, $idCita)){
            echo "$fecha : $hora : $idCita";
            header("location:../vista/citas.php");
        }else{
            echo "NO SE REALIZO LA MODIFICACION";
        }
    }
    else{
        include "../vista/componentes/header.php";
        include "../vista/componentes/contenedor.php";
        include "../vista/formCita.php";
        $arreglo = CitaDao::listarCitas(); 
    }
include "../vista/componentes/footer.php";





?>