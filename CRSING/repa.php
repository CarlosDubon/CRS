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
						<h3 class="panel-title"><b><center>VIEW REPORTS</center></b></h3>
					 </div>
			<div class="panel-body">
			   <div class="col-sm-12 col-md-3 ">

				
					<div class="thumbnail">
			   		<div class="caption">
			   			<h3><center>User</center></h3><br>
			   			<p>
			   				<center><a href="reportes.php?modo=repusuarioin" class="btn btn-warning">User</a></center><br>
			   			</p>
			   		</div>
			   		</div>
			   	</div>

			   	 <div class="col-sm-12 col-md-3">

			   	<div class="thumbnail">
			   		<div class="caption">
			   			<h3><center>Client</center></h3><br>
			   			<p>
			   				<center><a href="reportes.php?modo=repclientein" class="btn btn-warning">Client</a></center><br>
			   			</p>
			   		</div>
			   	</div>
					</div>	
					<div class="col-sm-12 col-md-3">
					<div class="thumbnail">
			   		<div class="caption">
			   			<h3><center>Reservations</center></h3><br>
			   			<p>
			   				<center><a href="reportes.php?modo=represervin" class="btn btn-warning">Reservations</a></center><br>
			   			</p>
			   		</div>
			   		</div>
			   	</div>
			   	<div class="col-sm-12 col-md-3">
			   	<div class="thumbnail">
			   		<div class="caption">
			   			<h3><center>Areas</center></h3>
			   			<p>
			   				<center><a href="reportes.php?modo=repcanchain" class="btn btn-warning">Soccer Fields</a>
			   				<a href="reportes.php?modo=repteatroin" class="btn btn-warning">Theater</a></center><br>
			   				<center><a href="reportes.php?modo=reppiscinain" class="btn btn-warning">Swimming Pool</a>
			   				<a href="reportes.php?modo=repiglesiain" class="btn btn-warning">Church</a></center>
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