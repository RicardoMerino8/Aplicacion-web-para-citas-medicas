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
		<form action="conexion/Conexion.php" method="POST">
			<h1>Ingresar</h1>
		        <br>
			<span>Completa la siguiente información</span>
			<input type="text" placeholder="Usuario" name="txtUsuario"/>
			<input type="password" placeholder="Contraseña" name="txtPass"  />
			
			<button>Ingresar</button>
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