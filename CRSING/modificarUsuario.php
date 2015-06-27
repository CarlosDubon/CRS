<?php
	session_start();
	require_once('/PasswordHash.php');
	include_once 'conn.php';
	if (isset($_SESSION['tipo'])){
		if ($_SESSION['tipo']!=1){
			header('Location: index.php');
		}
	}else{
		header('Location: index.php');
	}

	$co=true; // coincide contraseña
	$exito=false; //si da error la base
	$nada=true; //nada no entra a if
	$R=false;
	if (isset($_REQUEST['contrasena1'])) {

        $R=modif();
	}
?>
<!doctype html>
<html lang='es'>
	<?php include 'head.php'; ?>
<body role="document">
	<?php include 'cabecera.php'; ?>
	<div class="container-fluid">
		
		<div class="row">
	    	<div class=" col-md-6 col-md-offset-3 ">
	    		<?php if ($R) {?>
					<div class="alert alert-success">
			      <strong>Success!</strong> Password Changed
			    </div>

	    		<?php
	    			
	    		}elseif (!$co) {
	    			?>
					<div class="alert alert-danger">
			      <strong>Alert!</strong>  Passwords don't match, try again.
			    </div>

	    		<?php
	    			
	    		} elseif ($co && !$exito && !$nada) {
	    			?>
					<div class="alert alert-danger">
			      <strong>Alert!</strong>  User can't be created, try again.
			    </div>

	    		<?php
	    			
	    		} ?>	    		
	    		<div class="panel panel-default ">
					  <div class="panel-heading"><b>Change Password</b></div>
					  <div class="panel-body">
					    <form role="form"  style="padding: 20px;" method="post" action="modificarUsuario.php">

					  <div class="form-group has-feedback">
					    <label for="usuario" class=" control-label">User: <?=$_REQUEST['usuario']?></label>				    
					    <input type="hidden" class="form-control " id="usuario" name="usuario" value=<?="'".$_REQUEST['usuario']."'" ?> >
					    
					    <div id="resusu"></div>					    
					  </div>
					  <div class="form-group has-feedback">
					    <label for="Password1" class=" control-label">New Password</label>				    
					    <input type="Password" class="form-control" id="Password1" name= "contrasena1" placeholder="Password" required>					
						<input type="Password" class="form-control" id="Password2" name= "contrasena2" placeholder="Repeat Password" required> <span id="contval" class="glyphicon control-label"></span>					
					  </div>
					 
					  <input type="submit" id="enviar" class="btn btn-default" value='Change' disabled></input>
					  
					</form>
					  </div>
				</div>
			</div>

		</div>		
	
	</div>
	<footer>

	</footer>
</body>
<?php 
function modif()
{
	$pass=$_POST['contrasena1'];
	    $pass=create_hash($pass);
	    
	    try {
	        $dbh =conectarbase();
	        
	        /*** echo a message saying we have connected ***/
	        //echo 'Connected to database';
	        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        
	        /*** prepare the SQL statement ***/
	        $stmt = $dbh->prepare("UPDATE usuario set contrasena= :pass where usuario= :usuario ");
	        $stmt->bindParam(':usuario', $_REQUEST['usuario'], PDO::PARAM_STR, 10);
	        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR, 32);
	       
	        
	        /*** execute the prepared statement ***/
	        $stmt->execute();
	        
	        $exito=true;
	        
	        /*** close the database connection ***/
	        $dbh = null;
	    }
	    catch(PDOException $e) {
	        //echo $e->getMessage();
	        $exito=false;
	    }
	    return $exito;

}
function buscar($usuario,$contra)
{
	
	    
	    try {
	        $dbh = conectarbase();
	        
	        /*** echo a message saying we have connected ***/
	        //echo 'Connected to database';
	        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        
	        /*** prepare the SQL statement ***/
	        $stmt = $dbh->prepare("SELECT * from usuario where usuario=:usuario");
	        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR, 10);
	 
	        
	        /*** execute the prepared statement ***/
	        $stmt->execute();
	        
	         $result = $stmt->fetchAll();
					        
			$existe=false;
	        /*** loop of the results ***/
	        foreach ($result as $row) {

	        	if(strcmp($row['usuario'], $usuario)==0){
	        		if (validate_password($contra, $row['contrasena'])) {
	        		   	$existe=true;
	        		   	$resultado=$existe;
	            		break;	        			
	        		}	            
	        	}
	        }
	        
	        /*** close the database connection ***/
	        $dbh = null;
	    }
	    catch(PDOException $e) {
	        //echo $e->getMessage();
	        $exito=false;
	    }
	    return $resultado;

}?>

<script>
$(document).ready(function(){
	$("#Password2,#Password1").keyup(function (){
		//alert( "Handler for .keyup() called." );
		var Password1=$("#Password1").val();
		var Password2=$("#Password2").val();
		if (Password1 != Password2) {
			$("#contval").parent().addClass("has-error");
			$("#contval").parent().removeClass("has-success");
			$("#contval").addClass("glyphicon-remove-circle");
			$("#contval").text("Passwords don't match");
			$("#contval").removeClass(" glyphicon-ok-circle");
			$("#enviar").attr('disabled','disabled');
			
		}else if(Password1 == "" || Password2== ""){
			
			$("#contval").parent().removeClass("has-success has-error");
			$("#contval").removeClass(" glyphicon-ok-circle  glyphicon-remove-circle");			
			$("#contval").text("");
			$("#enviar").attr('disabled','disabled');
		}else{
			$("#contval").parent().addClass("has-success ");
			$("#contval").parent().removeClass("has-error");
			$("#contval").text("Passwords match");
			$("#contval").removeClass("  glyphicon-remove-circle");
			$("#contval").addClass(" glyphicon-ok-circle");
			$("#enviar").removeAttr('disabled');
			
		}

	});

	
});
	
	</script>
</html>