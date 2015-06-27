	<?php
		setlocale(LC_ALL,"es_ES");
		include_once('conn.php');
		include_once 'carrito.php';
		session_start();
		$carrito;
		if (isset($_REQUEST['delete'])) {
			try {
		        $dbh = conectarbase();
		        
		        /*** echo a message saying we have connected ***/
		        //echo 'Connected to database';
		        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        
		        /*** prepare the SQL statement ***/
		        $stmt = $dbh->prepare("DELETE FROM horario where idhorario=:id ");
		               
		        $stmt->bindParam(':id', $_REQUEST['delete'], PDO::PARAM_INT);
		        
		        /*** execute the prepared statement ***/
		        $exito=$stmt->execute();
		        
		         /*** close the database connection ***/
		        $dbh = null;
		        
		    }
		    catch(PDOException $e) {
		        echo $e->getMessage();
		         

		    }
			
		}
		
		if (!isset($_SESSION['carrito'])) {
			$_SESSION['carrito']=serialize(new Carrito());
			$carrito=unserialize($_SESSION['carrito']);
		}else{
			$carrito=unserialize($_SESSION['carrito']);
		}
		if (isset($_REQUEST['espacio'])) {
			$var="?espacio=".$_REQUEST['espacio']."'";

		}else{
			$var="'";
		}
		function  fechaing($fecha){
			$y=substr($fecha, 0,4);
			$m=substr($fecha, -5,-3);
			$d=substr($fecha, -2,10);
			$fr=$d."-".$m.'-'.$y;
			return $fr;
		}


	?>
	<!doctype html>
	<html lang='es'>
		<?php include 'head.php'; ?>
	<body role="document">
		<?php include 'cabecera.php'; ?>
		<div class="container-fluid col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				  <div class="panel-heading">
						<h3> <center>HORARIOS</center></h3>
				  </div>
			<div class="panel-body">
				<div class='col-md-6'>
				<form action=<?= "'agregarCarrito.php".$var?> method="POST" role="form">					
					<label for="">Fecha</label>

					<div class="input-group">						
						<input type="text" class="form-control" id="fecha" name='fecha'placeholder="Fecha">
						<span class="input-group-btn"><button type="submit" class="btn btn-default">Ver</button></span> 
					</div>
                <div class="alignbutton" >
                 <a id="btnver" href="verCarrito.php" class="btn btn-default">Ver reservas</a>
               </div>
				</form>
				</div>
               
				</br>
				</br>
				</br>
				<?php
				 /* $fe = date("Y-m-d H:i");
				  echo $fe;
				  $fe=strtotime('+1 day', strtotime($fe));
				  $fe=date("Y-m-d",$fe);
				  echo'<br />'. $fe;*/
				  if (isset($_POST['fecha'])) {
				  	$fecha=$_POST['fecha'];
				  }else{
				  
				  	$fecha=date("Y-m-d");
				  }

				 
				  try{
				  		$dbh=conectarbase();
						$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				        
				        /*** prepara la sentencia SQL ***/
				        $ids=$carrito->idhorarios();
				        $sql="SELECT * FROM horario  WHERE fecha = :inicio and reservado=false and idhorario NOT IN($ids)";
				        if (isset($_REQUEST['espacio'])) {
				        	$sql.="and espacio_idespacio= :espacio";
				        }
				        $fe=$fecha;
				        $stmt = $dbh->prepare($sql);
				        $stmt->bindParam(':inicio', $fe, PDO::PARAM_STR, 13);
				        if (isset($_REQUEST['espacio'])) {
				        	$stmt->bindParam(':espacio', $_REQUEST['espacio'], PDO::PARAM_INT);
				        }
				        
				        /*** executar sentencia preparada ***/
				        $stmt->execute();
				        
				        /*** Mostrar resultado ***/
				        $result = $stmt->fetchAll();				        

				        
				        echo "<table class='table  table-bordered' border='1px' 	>";
				        echo"<tr><th>". fechaing($fecha) ."</th>";
				       // $f=$hoy;
				       /* for ($i=0; $i <4 ; $i++) { 
				        	$f=sumardia($f);
				        	 echo"<th> ".date('l',strtotime($f))." $f </th>";
				        }*/
				        echo"</tr> ";
				       
				        foreach ($result as $row) {
				        	$lugar='';
				        	switch ($row['espacio_idespacio']) {
				        		case '1':
				        			$lugar='Cancha';
				        			break;
				        		case '2':
				        			$lugar='Teatro';
				        			break;-
			        				$lugar='Piscina';
			        			break;
				        		default:
				        			$lugar= 'Iglesia';
				        			break;
				        	}
				        	echo '<tr> <td>';
				            echo 'Horario: '.$row['inicio'].' - '. $row['fin'].'<br /> Lugar:'. $lugar;
				            //echo $row['espacio_idespacio'];
				            echo"<br /><a href='verCarrito.php?id= ".$row['idhorario']."'>Reservar</a>";
				            if($_SESSION['tipo']==1)
                        	{ 
                        		echo"<br /><a href='agregarCarrito.php?delete=".$row['idhorario']."'>Eliminar</a>";

                        	}
                        
				            echo '</td></tr>';
				        }
				        echo '</table>';
				        
				        /*** cerrar conexion de la base de datos ***/
				        $dbh = null;
				    }
				    catch(PDOException $e) {
				        echo $e->getMessage();
			    }

				  ?>
				  <!-- <div class="col-sm-3 col-md-10  col-md-offset-1">
						<div class="table-responsive ">

							<table class="table  table-bordered" border="1px"	> <!--table table-hover table-bordered-->
								<!-- <thead>
									<tr>
										<th><center>Horario</th>
										<th><center>Lunes</th>
										<th><center>Martes</th>
										<th><center>Miércoles</th>
										<th><center>Jueves</th>
										<th><center>Viernes</th>
										<th><center>Sábado</th>
										<th><center>Domingo</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>8:00 a.m. - 8:45 a.m. </td> <td class="tred" colspan="5"><center> No Disponible</td> <td class="tverde"> <center>Espacio Libre</td> <td class="tverde"> <center>Espacio Libre</td>
									<tr>
										<td>9:00 a.m. - 9:45 a.m. </td>  <td class="tred" colspan="5"><center> No Disponible</td> <td class="tverde"> <center>Espacio Libre</td> <td class="tverde"> <center>Espacio Libre</td>
									</tr>
									<tr>
										<td>10:00 a.m. - 10:45 a.m. </td> <td class="tred" colspan="5"><center> No Disponible</td><td class="tverde"> <center>Espacio Libre</td> <td class="tverde"> <center>Espacio Libre</td>
									</tr> 
									<tr>
										<td>11:00 a.m. - 11:45 a.m.</td> <td class="tred" colspan="5"><center> No Disponible</td><td class="tverde"> <center>Espacio Libre</td> <td class="tverde"> <center>Espacio Libre</td>
									</tr> 
									<tr>
										<td>12:00 p.m. - 12:45 p.m.</td> <td class="tred" colspan="5"><center> No Disponible</td><td class="tverde"> <center>Espacio Libre</td> <td class="tverde"> <center>Espacio Libre</td>
									</tr> 
									<tr>
										<td>1:00 p.m. - 1:45 p.m. </td> <td class="tred" colspan="5"><center> No Disponible</td><td class="tverde"> <center>Espacio Libre</td> <td class="tverde"> <center>Espacio Libre</td>
									</tr> 
									<tr>
										<td>2:00 p.m. - 2:45 p.m.</td> <td class="tred" colspan="5"><center> No Disponible</td><td class="tverde"> <center>Espacio Libre</td> <td class="tverde"> <center>Espacio Libre</td>
									</tr> 
									<tr>
										<td>3:00 p.m. - 3:45 p.m.</td> <td class="tred" colspan="5"><center> No Disponible</td><td class="tverde"> <center>Espacio Libre</td> <td class="tverde"> <center>Espacio Libre</td>
									</tr> 
									<tr>
										<td>4:00 p.m. - 4:45 p.m.</td> <td class="tred" colspan="5"><center> No Disponible</td><td class="tverde"> <center>Espacio Libre</td> <td class="tverde"> <center>Espacio Libre</td>
									</tr> 
									<tr>
										<td>5:00 p.m. - 5:45 p.m.</td> <td class="tverde"> <center>Espacio Libre</td> <td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td>
									</tr> 
									<tr>
										<td>6:00 p.m. - 6:45 p.m.</td> <td class="tverde"> <center>Espacio Libre</td> <td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td>
									<tr>
										<td>7:00 p.m. - 7:45 p.m.</td> <td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td>
									</tr> 
									<tr>
										<td>8:00 p.m. - 8:45 p.m.</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td>
									</tr>
									<tr>
										<td>9:00 p.m. - 9:45 p.m.</td> <td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td><td class="tverde"> <center>Espacio Libre</td>

								</tbody>
							</table>
						</div>
				  </div>
				 </div>
			</div> --> 
			
			
			
		
			
		
		</div>
		<footer>
		<link rel="stylesheet" type="text/css" href="js/datetimepicker.css"/ >
		<script type="text/javascript" src="js/datetimepicker.js"></script>
		<script type="text/javascript">
		 //$(document).ready(function() {
			//$('#hinicio').clockpicker();
			$('#fecha').datetimepicker({ minDate:0,lang:'es',format:'Y-m-d',timepicker:false, mask:true});
			//$('#hinicio,#hfin').datetimepicker({lang:'es',mask:true,format:'H:i',datepicker:false,step:5});
			

			//});
					
			
		</script>

		</footer>
        <a id="btnreg" href="areas.php" class="btn btn-warning">Regresar</a>
	</body>
	</html>
	<?php 
	function sumardia($fe){
		$fe=strtotime('+1 day', strtotime($fe));
		$fe=date("Y-m-d",$fe);
		return $fe;
	}
	?>