<?php 
include "modelo/UsuarioDao.php";
include "modelo/Usuario.php";
session_start();
if(isset($_SESSION["sesion"])){
	$usuario = unserialize($_SESSION["sesion"]);
if($usuario->getIdRol() == 1){
	header("location: vista/doctor.php");
}else if($usuario->getIdRol() == 2){
	header("location: vista/citas.php");
}
else{
	echo "ACCESO DENEGADO";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="javascript" href="javascript.css">
    <title>La Clinica | Login</title>
</head>
<body>

<div class="container" id="container">
	
	<div class="form-container sign-in-container">
		<form  method="POST">
			<h1>Ingresar</h1>
		        <br>
			<span>Completa la siguiente información</span>
			<input type="text" placeholder="Usuario" name="txtUsuario" id="txtUsuario"/>
			<input type="password" placeholder="Contraseña" name="txtPass" id="txtPass"  />
			
			<button type="submit" id="btnIngresar", name="btnIngresar">Ingresar</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			
			<div class="overlay-panel overlay-right">
				<h1>Bienvenido a <br> La Clinica</i> </h1>
				<p>Ingresa tus datos para ingresar al sistema</p>
				<button class="ghost" id="signUp">Ingresar</button>
			</div>
		</div>
	</div>
</div>


</body>
</html>
<?php 

if($_POST){
	if(isset($_POST["btnIngresar"])){
		$usuario = $_POST["txtUsuario"];
		$pass = $_POST["txtPass"];
	
		if($resultUsuario = UsuarioDao::validarUsuario($usuario, $pass)){
			$filaResult = $resultUsuario->fetch_assoc();
			$usuario = new Usuario();
			$usuario->setIdUsuario($filaResult["idUsuario"]);
			$usuario->setNombreUsuario($filaResult["nombreUsuario"]);
			$usuario->setNombreCompleto($filaResult["nombreCompleto"]);
			$usuario->setTelefono($filaResult["telefono"]);
			$usuario->setIdRol($filaResult["idRol"]);
			$usuario->setContraseña($filaResult["contrasena"]);
			
			$_SESSION["sesion"] = serialize($usuario);
			header("location: index.php");
		}
	}
	
	

}
?>
