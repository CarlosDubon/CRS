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
					<div class="panel-heading">
						<h3 class="panel-title"><b><center>VER REPORTES</center></b></h3>
					 </div>
			<div class="panel-body">
			   <div class="col-sm-12 col-md-3 ">

				
					<div class="thumbnail">
			   		<div class="caption">
			   			<h3><center>Usuario</center></h3><br>
			   			<p>
			   				<center><a href="reportes.php?modo=repusuarioes" class="btn btn-warning">Usuario</a></center><br>
			   			</p>
			   		</div>
			   		</div>
			   	</div>

			   	 <div class="col-sm-12 col-md-3">

			   	<div class="thumbnail">
			   		<div class="caption">
			   			<h3><center>Cliente</center></h3><br>
			   			<p>
			   				<center><a href="reportes.php?modo=repclientees" class="btn btn-warning">Cliente</a></center><br>
			   			</p>
			   		</div>
			   	</div>
					</div>	
					<div class="col-sm-12 col-md-3">
					<div class="thumbnail">
			   		<div class="caption">
			   			<h3><center>Reservas</center></h3><br>
			   			<p>
			   				<center><a href="reportes.php?modo=represerves" class="btn btn-warning">Reservas</a></center><br>
			   			</p>
			   		</div>
			   		</div>
			   	</div>
			   	<div class="col-sm-12 col-md-3">
			   	<div class="thumbnail">
			   		<div class="caption">
			   			<h3><center>Áreas</center></h3>
			   			<p>
			   				<center><a href="reportes.php?modo=repcanchaes" class="btn btn-warning">Canchas</a>
			   				<a href="reportes.php?modo=repteatroes" class="btn btn-warning">Teatro</a></center><br>
			   				<center><a href="reportes.php?modo=reppiscinaes" class="btn btn-warning">Piscina</a>
			   				<a href="reportes.php?modo=repiglesiaes" class="btn btn-warning">Iglesia</a></center>
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