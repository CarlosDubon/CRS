<?php
// "hola mundo" ;

	session_start();
?>
<!doctype html>
<html lang='es'>
<head>
	<meta charset='utf-8'>
	<title>CSSC RESERVATION</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<header> 
			<div class="cabecera">
				<h1>CSSC RESERVATION</h1>
			</div> 
	</header>
	<nav> 
		<ul>
			<li> <a href="index.php">INICIO</a></li>
			<li>	<a href="prueba.php?dato=hola+adads">ESPACIOS Y HORARIOS</a></li>
			<li>¿CÓMO OBTENER TU MEMBRESÍA?</li>
	<?php
	if(isset($_SESSION['usuario'])){
		?>		
			<li><a href="loggin.php">Cerrar SESIÓN</a> </li>
		</ul>
	</nav>
	
		<p>Has iniciado sesion: <?= $_SESSION['usuario']?> </p>
		<p><a href='cerrar.php'>Cerrar Sesion</a></p>
	<?php
	}else { 
?>

	<img src="images.jpg" >
	<form method = "post" action="INDEX.php"> 

		usuario <input type = "text" placeholder="Ingrese su usuario" name = "usuario" required> <br>
		
		contraseña <input type = "password" placeholder="Ingrese su contraseña" name = "contrasena"   required> <br>
		<input type = "submit"> 



	</form>
	<?php
	}
?>
	<footer>

	</footer>
</body>
</html>