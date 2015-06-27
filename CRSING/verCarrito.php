	<?php
		include_once 'conn.php';
		include_once 'carrito.php';
		session_start();
		
		
		if (!isset($_SESSION['carrito'])) {
			$_SESSION['carrito']=serialize(new Carrito());
		}
		$carrito=unserialize($_SESSION['carrito']);
		
		if (isset($_REQUEST['id'])) {
			
			$carrito->add($_REQUEST['id']);
			$_SESSION['carrito']=serialize($carrito);
		}
		if (isset($_REQUEST['quitar'])) {
			
			$carrito->delete($_REQUEST['quitar']);
			$_SESSION['carrito']=serialize($carrito);
		}
		function saldo(){
			$respuesta;
			try {
		        $dbh = conectarbase();
		        
		        /*** echo a message saying we have connected ***/
		        //echo 'Connected to database';
		        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        $sql="SELECT saldo FROM cliente join usuario on(idusuario=usuario_idusuario)  WHERE usuario='".$_SESSION['usuario']."'";
		        /*** prepare the SQL statement ***/
		        $stmt = $dbh->prepare($sql);
	
		        /*** execute the prepared statement ***/
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);


		        
		        /*** close the database connection ***/
		        $dbh = null;
		        return $result['saldo'];
		    }
		    catch(PDOException $e) {
		        //echo $e->getMessage();
		        $exito=false;
		    }
		    return NULL;
		}
		$saldo=saldo();
		$total=$carrito->total;
		$restante= $saldo-$total;
		$desactivado= $restante <0?"disabled":"";

	?>
	<!doctype html>
	<html lang='es'>
		<?php include 'head.php'; ?>
	<body role="document">
		<?php include 'cabecera.php'; ?>
		<div class="container-fluid col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				  <div class="panel-heading">
						<h3> <center><strong>Reservations</strong></center></h3>
				  </div>
			<div class="panel-body">
				<div class='col-md-6'>
					
				<?php
					echo "Last Balance: $saldo<BR/>Total: $total <BR/>Remaining Balance: $restante<BR/>
					<form action='reservar.php' method='post'>
						<input type='hidden' name='reservar' value='true' /> 
						<input type='submit' $desactivado />
					</form>";
					$tabla=$carrito->tabla();
				 	echo $tabla;
                    
				  ?>
			<a href="areas.php" class="btn btn-warning" >Back</a><BR/>
			
		
			
		
		</div></div></div></div>
		<footer>
		<link rel="stylesheet" type="text/css" href="js/datetimepicker.css"/ >
		<script type="text/javascript" src="js/datetimepicker.js"></script>
		<script type="text/javascript">
		 $(document).ready(function() {
		 	$("a.quitar").click(function() {	 		
				    
				    if (confirm("Are you sure to remove the reservation?") == true) {
				       
				    } else {
				        return false;
				    }
				    
				});

			

			});

					
			
		</script>


		</footer>
	</body>
	</html>
	<?php 
	function sumardia($fe){
		$fe=strtotime('+1 day', strtotime($fe));
		$fe=date("Y-m-d",$fe);
		return $fe;
	}
	?>
   