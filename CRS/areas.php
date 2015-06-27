<?php
	session_start();
?>
<!doctype html>
<html lang='es'>
	<?php include 'head.php'; ?>
<body role="document">
	<?php include 'cabecera.php'; ?>
	<div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-body">
			   <div class="col-sm-12 col-md-3 ">

				
					<div class="thumbnail">
			   		<img  src="img/Canchas2.jpg"  heigth='300'  class="img-rounded" alt="canchas">
			   		<div class="caption">
			   			<h3>Canchas</h3>
			   			<p align="justify">
			   				Canchas sintéticas de fútbol 5 para encuentros deportivos, torneos y amistosos.<br><br><b>Costo:</b> $15 por 45 minutos.
			   			</p>
			   			<p>
			   				<a href="agregarCarrito.php?espacio=1" class="btn btn-warning">Ver Horarios</a>
			   				<a href="infcanchas.php" class="btn  btn-default">Descripción</a>

			   			</p>
			   		</div>
			   		</div>
			   	</div>

			   	 <div class="col-sm-12 col-md-3">

			   	<div class="thumbnail">
			   		<img src="img/Teatro1.jpg"  heigth='300'  class="img-rounded"  alt="Teatro">
			   		<div class="caption">
			   			<h3>Teatro</h3>
			   			<p align="justify">
			   				Teatro para eventos como graduaciones, celebraciones, obras teatrales, eventos culturales, entre otros.<br><br><b>Costo:</b> $50 por 1 hora.
			   			</p>
			   			<p>
			   				<a href="agregarCarrito.php?espacio=2" class="btn btn-warning">Ver Horarios</a>
			   				<a href="infteatro.php" class="btn  btn-default">Descripción</a>
			   			</p>
			   		</div>
			   	</div>
					</div>	
					<div class="col-sm-12 col-md-3">
					<div class="thumbnail">
			   		<img src="img/Piscina3.jpg"   heigth='300'  class="img-rounded" alt="Piscina">
			   		<div class="caption">
			   			<h3>Piscina</h3>
			   			<p align="justify">
			   				Piscina semi-olímpica para competencias, diversión, entre otros. <br><br><b>Costo:</b> $15 por 1 hora.
			   			</p>
                        <br/>
			   			<p>
			   				<a href="agregarCarrito.php?espacio=3" class="btn btn-warning">Ver Horarios</a>
			   				<a href="infpiscina.php" class="btn  btn-default">Descripción</a>
			   			</p>
			   		</div>
			   		</div>
			   	</div>
			   	<div class="col-sm-12 col-md-3">
			   	<div class="thumbnail">
			   		<img src="img/Iglesia3.jpg" heigth='300'   class="img-rounded" alt="Iglesia">
			   		<div class="caption">
			   			<h3>Iglesia</h3>
			   			<p align="justify">
			   				Iglesia para bautismo, matrimonio, confirmación, novenas, entre otros. <br><br><b>Costo:</b> $75 por 1 hora.
			   			</p>
                        <br/>
			   			<p>
			   				<a href="agregarCarrito.php?espacio=4" class="btn btn-warning">Ver Horarios</a>
			   				<a href="infiglesia.php" class="btn  btn-default">Descripción</a>
			   			</p>
			   		</div>
			   		</div>
			   	</div>


				
			   	

			   </div>
			</div>
		</div>
		
		
		
	
		
	
	</div>
	<footer>

	</footer>
</body>
</html>