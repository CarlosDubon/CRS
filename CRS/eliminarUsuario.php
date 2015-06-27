<?php
	session_start();
		if (isset($_SESSION['tipo'])){
		if ($_SESSION['tipo']!=1){
			header('Location: index.php');
		}
	}else{
		header('Location: index.php');
	}
?>
<!doctype html>
<html lang='es'>
	<?php include 'head.php'; ?>
<body role="document">
	<?php include 'cabecera.php'; ?>
	<div class="container-fluid">
		
		<div class="panel panel-default">
			  <div class="panel-heading">
					<h3 class="panel-title">Eliminar Usuario</h3>
			  </div>
			  <div class="panel-body">
					¿Está seguro de eliminar el usuario seleccionado? <br>
					<button type="button" class="btn btn-danger">Aceptar</button>
					<button type="button" class="btn btn-default">Cancelar</button>

			  </div>
		</div>
		
		
	
		
	
	</div>
	<footer>

	</footer>
</body>
</html>