	<?php
		include_once 'conn.php';
		session_start();
	   if (isset($_SESSION['tipo'])){
		  if ($_SESSION['tipo']!=1){
			header('Location: index.php');
		  }
	   }else{
		    header('Location: index.php');
	   }
		$tr="";
		try {

			        $dbh = conectarbase();
			        
			        /*** echo a message saying we have connected ***/
			        //echo 'Connected to database';
			        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			        $sql="SELECT cliente.nombre as nombre, horario.fecha as fecha, inicio, fin, espacio.nombre as espacio  FROM cliente join factura on(idcliente=cliente_idcliente) join reserva on(idfactura=factura_idfactura) join horario on(idhorario=horario_idhorario) join espacio on(idespacio=espacio_idespacio)";
			        /*** prepare the SQL statement ***/
			        $stmt = $dbh->prepare($sql);
		
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
			        //echo $e->getMessage();
			        $exito=false;
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
						<h3 class="panel-title">REPORTES</h3>
				  </div>
				  <div class="panel-body">
					<div class="page">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Nombre</th>
										
										<th>Fecha</th>
										<th>Hora Inicio</th>
										<th>Hora Fin</th>
										<th>Área</th>
									</tr>
						<p>
			   				<a href="" class="btn btn-warning">Usuario</a>
			   				<a href="" class="btn  btn-warning">Cliente</a>
			   				<a href="" class="btn btn-warning">Reserva</a>
			   			</p>
								</thead>
								<tbody>
									<?= $tr?>
								</tbody>
							</table>
						</div>	
                        <a href="javascript:window.print()" id="ocultar" onclick="hide();return false;">Imprimir Reporte</a>
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