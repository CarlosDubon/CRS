<?php

	// "hola mundo" ;

	session_start();
	require_once('/PasswordHash.php');
	include 'conn.php';
	$saldo=0;
	$noexiste=false;
	if (isset($_POST['usuario'])) {
		
		$usuario= trim($_POST['usuario']);
		$pass= $_POST['contrasena'];
	    
	    try {
	        $dbh = conectarbase();
	        
	        /*** echo a message saying we have connected ***/
	        //echo 'Connected to database';
	        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        
	        /*** prepare the SQL statement ***/
	        $stmt = $dbh->prepare("SELECT usuario,contrasena,tipo,idcliente FROM usuario left join cliente on idusuario=usuario_idusuario  WHERE usuario = :usuario");
	        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR, 10);
	        
	        
	        /*** execute the prepared statement ***/
	        $stmt->execute();
	        
	        /*** fetch the results ***/
	        $result = $stmt->fetchAll();
	        $noexiste=true;
	        /*** loop of the results ***/
	        foreach ($result as $row) {

	        	if(strcmp($row['usuario'], $usuario)==0){
	        		if (validate_password($pass, $row['contrasena'])) {
	        			$_SESSION['usuario'] = $row['usuario'];
	           			$_SESSION['tipo'] = $row['tipo'];

	           			if (isset($row['idcliente'])) {
	           				$_SESSION['idcliente'] = $row['idcliente'];
	           			}
	           			
	    
	            		$noexiste=false;
	            		break;	        			
	        		}	            
	        	}
	        }
	        
	        /*** close the database connection ***/
	        $dbh = null;
	    }
	    catch(PDOException $e) {
	        echo $e->getMessage();
	    }
	}
?>
<!doctype html>
<html lang='es'>
<?php include 'head.php'; ?>
<body role="document">
	<?php include 'cabecera.php'; ?>
	<div class="container-fluid">
		
		
		
		<?php

			if (isset($_SESSION['idcliente'])) {
				$cliente=null;
					 try {
				        $dbh = conectarbase();
				        
				        /*** echo a message saying we have connected ***/
				        //echo 'Connected to database';
				        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				        
				        /*** prepare the SQL statement ***/
				        $id=trim($_SESSION['idcliente']);
				        $stmt = $dbh->prepare("SELECT * FROM cliente WHERE idcliente ='$id'");
				        
				        
				        
				        /*** execute the prepared statement ***/
				        $stmt->execute();
				        
				        /*** fetch the results ***/
				        $cliente = $stmt->fetch();
				        $noexiste=true;
				                   
				        
				        /*** close the database connection ***/
				        $dbh = null;
				    }
				    catch(PDOException $e) {
				        echo $e->getMessage();
				    }
		

				    echo "<center><FONT SIZE=5 COLOR=yellow><h2>¡BIENVENIDO/A! SESIÓN <br> INICIADA CON ÉXITO: </h2><h3>".$_SESSION['usuario']."</h3> <br> SU SALDO DISPONIBLE ES: $ ".$cliente['saldo']."</FONT></center>";
				   
				    ?>
					<center><img src="img/crs.png" width='300' alt=""></center>

			    <?php
			} else if(isset($_SESSION['usuario'])){
				echo "<FONT ALIGN=center SIZE=5 COLOR=yellow><h2>¡BIENVENIDO/A! SESIÓN <br> INICIADA CON ÉXITO: </h2><h3>".$_SESSION['usuario']."</h3> <br></FONT>";
				   
				    ?>
					<center><img src="img/crs.png" width='300' alt=""></center>

			    <?php

			}else {
			   // echo "Acceso Restringido";
			    ?>
			    <div class="row">
			    	<div class="col-md-6 col-md-offset-3">
			    		<?php if ($noexiste) {
			    			
			    		?>
			    		<div class="alert alert-danger">
					     <strong>¡Alerta!</strong>  El usuario o contraseña están incorrectas.
					    </div>

			    		<?php }   ?>
					    
						    <div class="panel panel-default ">
							  <div class="panel-heading"><b>Iniciar Sesión</b></div>
							  <div class="panel-body">
					    <form role="form"  style="padding: 20px;" method="post" action="home.php">

					  <div class="form-group">
					    <label for="usuario" class=" control-label">Usuario</label>				    
					    <input type="text" class="form-control " id="usuario" name="usuario" placeholder="Usuario" required >				    
					  </div>
					  <div class="form-group">
					    <label for="Password" class=" control-label">Contraseña</label>				    
					    <input type="Password" class="form-control" id="Password" name= "contrasena" placeholder="Contraseña" required>					
					  </div>				  
					  	
					  <button type="submit" class="btn btn-default">Ingresar</button>
					  
					</form>
					  </div>
					</div>
					</div>

				</div>
			    
		<?php

			}
			?>
	
		
	
	</div>
	<footer>

	</footer>
</body>
</html>