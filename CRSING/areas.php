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
			   			<h3>Soccer Fields</h3>
			   			<p align="justify">
			   				Soccer Fields for 5 people, for tournaments and friendly matches.<br><br><b>Cost:</b> $15 per 45 minutes.
			   			</p>
                        <br/>
			   			<p>
			   				<a href="agregarCarrito.php?espacio=1" class="btn btn-warning">Schedule</a>
			   				<a href="infcanchas.php" class="btn  btn-default">Description</a>

			   			</p>
			   		</div>
			   		</div>
			   	</div>

			   	 <div class="col-sm-12 col-md-3">

			   	<div class="thumbnail">
			   		<img src="img/Teatro1.jpg"  heigth='300'  class="img-rounded"  alt="Teatro">
			   		<div class="caption">
			   			<h3>Theater</h3>
			   			<p align="justify">
			   				Theater for events such as graduations, celebrations, plays, cultural events, among others.<br><br><b>Cost:</b> $50 per hour.
			   			</p>
			   			<p>
			   				<a href="agregarCarrito.php?espacio=2" class="btn btn-warning">Schedule</a>
			   				<a href="infteatro.php" class="btn  btn-default">Description</a>
			   			</p>
			   		</div>
			   	</div>
					</div>	
					<div class="col-sm-12 col-md-3">
					<div class="thumbnail">
			   		<img src="img/Piscina3.jpg"   heigth='300'  class="img-rounded" alt="Piscina">
			   		<div class="caption">
			   			<h3>Swimming Pool</h3>
			   			<p align="justify">
			   				Semi-Olympic pool for competitions, fun and others.<br><br><b>Cost:</b> $15 per hour.
			   			</p>
                        <br/>
			   			<p>
			   				<a href="agregarCarrito.php?espacio=3" class="btn btn-warning">Schedule</a>
			   				<a href="infpiscina.php" class="btn  btn-default">Description</a>
			   			</p>
			   		</div>
			   		</div>
			   	</div>
			   	<div class="col-sm-12 col-md-3">
			   	<div class="thumbnail">
			   		<img src="img/Iglesia3.jpg" heigth='300'   class="img-rounded" alt="Iglesia">
			   		<div class="caption">
			   			<h3>Church</h3>
			   			<p align="justify">
			   				Church for baptism, matrimony, confirmation, among others.<br><br><b>Cost:</b> $75 per hour.
			   			</p>
                        <br/>
			   			<p>
			   				<a href="agregarCarrito.php?espacio=4" class="btn btn-warning">Schedule</a>
			   				<a href="infiglesia.php" class="btn  btn-default">Description</a>
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