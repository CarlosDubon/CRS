	<?php
		include_once 'conn.php';
		session_start();
		$tr="";
		try {

			        $dbh = conectarbase();
			        
			        /*** echo a message saying we have connected ***/
			        //echo 'Connected to database';
			        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			        $sql="SELECT cliente.nombre as nombre, horario.fecha as fecha, inicio, fin, espacio.nombre as espacio  
			        FROM usuario join cliente on(idusuario=usuario_idusuario) join factura 
			        on(idcliente=cliente_idcliente) join reserva on(idfactura=factura_idfactura) join horario 
			        on(idhorario=horario_idhorario) join espacio on(idespacio=espacio_idespacio) 
			        WHERE usuario=:usuario" ;
			        /*** prepare the SQL statement ***/
			        $usu=trim($_SESSION['usuario']);
			        $stmt = $dbh->prepare($sql);
			        $stmt->bindParam(':usuario', $usu, PDO::PARAM_STR, 30);
					
			        /*** execute the prepared statement ***/
					$stmt->execute();
					$result = $stmt->fetchAll();


			        
			        /*** close the database connection ***/
			        $dbh = null;
			        foreach ($result as $row) {
                        $hinicio = strtotime($row['inicio']);
						$hinicio = date("h:i:00 a", $hinicio);
						$hfin = strtotime($row['fin']);
						$hfin = date("h:i:00 a", $hfin);
						$tr.="<tr><td>".$row['nombre']."</td><td>".$row['fecha']."</td><td>".$hinicio."</td><td>".$hfin."</td><td>".$row['espacio']."</td></tr>";
						        
	                            }
			    }
			    catch(PDOException $e) {
			        echo $e->getMessage();
			        $exito=false;
			    }
	?>
	<!doctype html>
	<html lang='es'>
		<?php include 'head.php'; ?>
	<body role="document">
		<?php include 'cabecera.php'; ?>
		<div class="container-fluid">

			<div class="panel panel-default" id="reporte">
				  <div class="panel-heading">
						<h3 class="panel-title">REPORTS</h3>
				  </div>
				  <div class="panel-body">		  	
					<div class="page">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Name</th>
										
										<th>Date</th>
										<th>Start Hour</th>
										<th>End Hour</th>
										<th>Area</th>
									</tr>
								</thead>
								<tbody>
									<?= $tr?>
								</tbody>
							</table>
						</div>
                        <a href="javascript:window.print()" id="ocultar" onclick="hide();return false;">Print Report</a>
					</div>
				</div>
			</div>
		</div>
        
		<footer>
<script type="text/javascript">
function hide(){
document.getElementById('ocultar').style.display = 'none';
javascript:window.print();
document.getElementById('ocultar').style.display = 'block';
}
</script>
		</footer>
	</body>
	</html>

