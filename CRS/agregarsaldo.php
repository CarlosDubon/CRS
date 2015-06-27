<?php
	session_start();
	if (isset($_SESSION['tipo'])){
		if ($_SESSION['tipo']!=1){
			header('Location: index.php');
		}
	}else{
		header('Location: index.php');
	}

	include_once 'conn.php';
	if (isset($_POST['monto'])) {
		try {
	        $dbh = conectarbase();
	        
	        /*** echo a message saying we have connected ***/
	        //echo 'Connected to database';
	        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        
	        /*** prepare the SQL statement ***/
	        $stmt = $dbh->prepare("UPDATE cliente set total= total+ :monto,saldo= saldo+ :monto  where usuario_idusuario= (select idusuario from usuario               where usuario=:usuario) ");
	        $stmt->bindParam(':monto', $_POST['monto'], PDO::PARAM_STR, 10);
	        $stmt->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_STR, 10);
	       
	        
	        /*** execute the prepared statement ***/
	        $stmt->execute();
	        
	        $exito=true;
	        
	        /*** close the database connection ***/
	        $dbh = null;
	    }
	    catch(PDOException $e) {
	        echo $e->getMessage();
	        $exito=false;
	    }
	}
?>
<!doctype html>
<html lang='es'>
	<?php include 'head.php'; ?>
<body role="document">
	<?php include 'cabecera.php'; ?>
	<div class="row">
	    	<div class=" col-md-5 col-md-offset-3 ">	    		
	    		<div class="panel panel-default ">
					  <div class="panel-heading"><b>Agregar Saldo</b></div>
					  <div class="panel-body">
					  <form action='agregarsaldo.php' method="post">
					  	Cantidad:
					  	<div class="input-group col-lg-6 " >
	  						<span class="input-group-addon">$</span>
	  						<input type="number" min="1" max="90000000" value="1" name='monto' class="form-control">
	  						<span class="input-group-addon">.00</span>
						</div>
						<br>
                          <div>
						<input type="text" name='usuario' value=<?="'".$_REQUEST['usuario']."'" ?>  hidden>
						<input class="btn btn-success" id="toptop" type="submit" onclick="return confirm('¿Está seguro?');">
						</div>
					    
					</form>
					 
				</div>
			</div>

		</div>		
	
	</div>
		
		
	
		
	

	<footer>

	</footer>
</body>
</html>