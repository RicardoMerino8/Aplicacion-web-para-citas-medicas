<?php 
include_once "../modelo/Usuario.php";

if(isset($_SESSION["sesion"])){
    $usuario = unserialize($_SESSION["sesion"]);
    
    if($usuario->getIdRol() == 1){
        echo '
<nav class="menu navbar">
    <ul class="navbar-nav p-4">
        <li class="nav-item">
            <a class="nav-link text-white" href="../vista/doctor.php">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="../vista/reportes.php">Reportes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="../vista/expedientes.php">Expedientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="../vista/recetas.php">Recetas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="../vista/citaspasadas.php">Historial de Citas</a>
        </li>
    </ul>
</nav>
';
    }else if($usuario->getIdRol() == 2){
        echo '
        <nav class="menu navbar">
        <ul class="navbar-nav p-4">
            <li class="nav-item">
                <a class="nav-link text-white" href="../vista/citas.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../vista/citashoy.php">Citas de Hoy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../vista/expedientes.php">Expedientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../vista/citaspasadas.php">Historial de Citas</a>
            </li>
        </ul>
    </nav>
        ';
    }
}
?>

