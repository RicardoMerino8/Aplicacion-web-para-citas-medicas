<?php 
    class Func{

        public function __construct(){

        }

        public function obtenerFechaEspanol(){
            $dia = date('l');
            $diaNum= date('j');
            $mes = date('F');
            $anio= date('Y');
            $fecha = "";
            switch($dia){
                case 'Monday': $dia = 'Lunes';
                break;
                case 'Tuesday': $dia = 'Martes';
                break;
                case 'Wednesday': $dia = 'Miercoles';
                break;
                case 'Thursay': $dia = 'Jueves';
                break;
                case 'Friday': $dia = 'Viernes';
                break;
                case 'Saturday': $dia = 'Sabado';
                break;
                case ' Sunday': $dia = 'Domingo';
            }

            switch($mes){
                case 'January': $mes = 'Enero';
                break;
                case 'February': $mes = 'Febrero';
                break;
                case 'March': $mes = 'Marzo';
                break;
                case 'April': $mes = 'Abril';
                break;
                case 'May': $mes = 'Mayo';
                break;
                case 'June': $mes = 'Junio';
                break;
                case ' July': $mes = 'Julio';
                break;
                case ' August': $mes = 'Agosto';
                break;
                case ' September': $mes = 'Septiembre';
                break;
                case ' October': $mes = 'Octubre';
                break;
                case ' November': $mes = 'Noviembre';
                break;
                case ' December': $mes = 'Diciembre';
                break;
            }

            $fecha = "$dia $diaNum de $mes de $anio";
            return $fecha;
        }

    }
?>