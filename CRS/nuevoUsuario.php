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
	require_once('/PasswordHash.php');
	$co=true; // coincide contraseña
	$exito=false; //si da error la base
	$nada=true; //nada no entra a if
	if (isset($_POST['contrasena1'])) {
		if(strcmp ($_POST['contrasena1'], $_POST['contrasena2'])==0){
			$exito=agregar();
		$nada=false;
			
		}else {
			$co=false;
			$nada=false;
		}	
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
	    		<?php if ($co && $exito ) {?>
					<div class="alert alert-success">
			      <strong>¡Éxito!</strong> Usuario Creado Satisfactoriamente
			    </div>

	    		<?php
	    			
	    		}elseif (!$co) {
	    			?>
					<div class="alert alert-danger">
			      <strong>¡Alerta!</strong>  Contraseñas no coinciden, vuelva a intentarlo
			    </div>

	    		<?php
	    			
	    		} elseif ($co && !$exito && !$nada) {
	    			?>
					<div class="alert alert-danger">
			      <strong>¡Alerta!</strong>  No se ha podido crear usuario, intente con otro nombre
			    </div>

	    		<?php
	    			
	    		} ?>	    		
	    		<div class="panel panel-default ">
					  <div class="panel-heading">
						<h3 class="panel-title"><b>Crear Nuevo Usuario</b></h3>
					  </div>
					  <div class="panel-body">
					    <form role="form"  style="padding: 20px;" method="post" action="nuevoUsuario.php">

                        <div class="form-group">
					    <label for="tipo" class=" control-label">Tipo de Usuario</label>
						  <select class="form-control" id="tipo" name="tipo" required>
					          <option value="1">Administrador</option>
					          <option value="2">Cliente</option>
					        </select>					  
					  	</div>
					  <div class="form-group has-feedback">
					    <label for="usuario" class=" control-label">Usuario</label>				    
					    <input type="text" class="form-control " id="usuario" name="usuario" placeholder="Usuario" required >
					    <div id="resusu"></div>					    
					  </div>
					  <div class="form-group has-feedback">
					    <label for="Password1" class=" control-label">Contraseña</label>				    
					    <input type="Password" class="form-control" id="Password1" name= "contrasena1" placeholder="Contraseña" required>					
						<input type="Password" class="form-control" id="Password2" name= "contrasena2" placeholder="Repetir Contraseña" required> 
                        <span id="contval" class="glyphicon control-label"></span>					
					  </div>
					  <div class="form-group has-feedback">
					    <label for="email" class=" control-label">Correo Electrónico</label>				    
					    <input type="email" class="form-control " id="email" name="email" placeholder="Correo Electrónico" required >				    
					  </div>
				  
					
					<div class="cliente" hidden="true">
					  	<div class="form-group has-feedback">
					    <label for="usuario" class=" control-label">Nombre</label>				    
					    <input type="text" class="form-control " id="nombre" name="nombre" placeholder="Nombre"  >			    
					  </div>
					  <div class="form-group has-feedback">
					    <label for="usuario" class=" control-label">Apellido</label>				    
					    <input type="text" class="form-control " id="apellido" name="apellido" placeholder="Apellido"  >			    
					  </div>
					  <div class="form-group has-feedback">
					    <label for="usuario" class=" control-label">DUI</label>				    
					    <input type="text" class="form-control " id="dui" name="DUI" placeholder="DUI"  maxlength="10">			    
					  </div>
					  <div class="form-group has-feedback">
					    <label for="usuario" class=" control-label">Teléfono</label>				    
					    <input type="text" class="form-control " id="tel" name="telefono" placeholder="Teléfono"  maxlength="9">			    
					  </div>
					  <div class="form-group has-feedback">
					    <label for="usuario" class=" control-label">Dirección</label>				    
					    <input type="text" class="form-control " id="adress" name="direccion" placeholder="Dirección"  >			    
					  </div>
					  <div class="form-group has-feedback">
					    <label for="usuario" class=" control-label">Fecha de Nacimiento</label>				    
					    <input type="text" class="form-control " id="fechanac" name="fecha_nac" placeholder="Fecha de Nacimiento"  >			    
					  </div>
						<div class="form-group has-feedback">
					    <label for="usuario" class=" control-label">NIT</label>				    
					    <input type="text" class="form-control " id="nit" name="NIT" placeholder="NIT"  maxlength="17">			    
					  </div>
					  <div class="form-group has-feedback">
					    <label for="usuario" class=" control-label">Fecha de Membresía</label>				    
					    <input type="text" class="form-control " id="fechamem" name="fecha_mem" placeholder="Fecha de Membresía"  >
					  </div>
					</div>
					  <input type="submit" id="enviar" class="btn btn-default" value='Crear'>
					  
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

function agregar()
{	
	
	    $pass=$_POST['contrasena1'];
	    $pass=create_hash($pass);
	    //echo $password;
	    try {

	        $dbh =conectarbase(); // new PDO("mysql:host=" . $hostname . ";dbname=cssreservation", $username, $password);
	        
	        /*** echo a message saying we have connected ***/
	        //echo 'Connected to database';
	        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        
	        /*** prepare the SQL statement ***/
	        $stmt = $dbh->prepare("INSERT into usuario (usuario,contrasena,correo,tipo) values (:usuario,:contrasena,:correo,:tipo) ");
	        $stmt->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_STR, 10);
	        $stmt->bindParam(':contrasena', $pass, PDO::PARAM_STR, 32);
	        $stmt->bindParam(':correo', $_POST['email'], PDO::PARAM_STR, 32);
	        $stmt->bindParam(':tipo', $_POST['tipo'], PDO::PARAM_INT);
	        
	        /*** execute the prepared statement ***/
	        $stmt->execute();

	        if (isset($_POST['DUI'])) {
	        	if ($_POST['DUI']!="") {
	        		
	        	
	        	
	        
			        $fecha=date("Y-m-d");
			        $stmt = $dbh->prepare("INSERT into cliente (nombre, apellido, DUI, telefono, direccion, fecha_nac, NIT, fecha_mem,usuario_idusuario, saldo, total) values (:nombre, :apellido, :dui, :tel, :adress, :fechanac, :nit, :fechamem,(select idusuario from usuario where usuario=:usuario), 100, 100) ");
			        $stmt->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR, 50);
			        $stmt->bindParam(':apellido', $_POST['apellido'], PDO::PARAM_STR, 50);
			        $stmt->bindParam(':dui', $_POST['DUI'], PDO::PARAM_STR, 10);
			        $stmt->bindParam(':tel', $_POST['telefono'], PDO::PARAM_STR, 9);
			        $stmt->bindParam(':adress', $_POST['direccion'], PDO::PARAM_STR, 100);
			        $stmt->bindParam(':fechanac', $_POST['fecha_nac'], PDO::PARAM_STR, 10);
			        $stmt->bindParam(':nit', $_POST['NIT'], PDO::PARAM_STR, 17);
			        $stmt->bindParam(':fechamem', $fecha, PDO::PARAM_STR, 15);
			        $stmt->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_STR, 15);

			        $stmt->execute();
	        
	    		}
	        }
	        
	        $exito=true;
	        
	        /*** close the database connection ***/
	        $dbh = null;
	    }
	    catch(PDOException $e) {
	        echo $e->getMessage();
	        $exito=false;
	    }
	    return $exito;

} ?>

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
			$("#contval").text("Contraseñas no Coinciden");
			$("#contval").removeClass(" glyphicon-ok-circle");
			boton();
			
		}else if(Password1 == "" || Password2== ""){
			
			$("#contval").parent().removeClass("has-success has-error");
			$("#contval").removeClass(" glyphicon-ok-circle  glyphicon-remove-circle");			
			$("#contval").text("");
		}else{
			$("#contval").parent().addClass("has-success ");
			$("#contval").parent().removeClass("has-error");
			$("#contval").text("Contraseñas coinciden");
			$("#contval").removeClass("  glyphicon-remove-circle");
			$("#contval").addClass(" glyphicon-ok-circle");
			boton();
		}

	});

	$("#usuario").change(function (){
		if ($("#usuario").val()!="") {
	        var parametros = {"usuario" : $("#usuario").val() };
	        $.ajax({
                	data:  parametros,
	                url:   'serv_usuario.php',
	                type:  'post',
	                beforeSend: function () {
	                        $("#resusu").html("Procesando, espere por favor...");
	                },
	                success:  function (response) {
	                	if (response=="si") {
	                		$("#resusu").parent().addClass("has-error");
	                		$("#resusu").parent().removeClass("has-success");
                            $("#resusu").html("El usuario existe. Elija otro");
                            boton();
                            
	                	}else{
	                		$("#resusu").parent().addClass("has-success");
	                		$("#resusu").parent().removeClass("has-error");
	                		$("#resusu").html("El usuario no existe.");
                            boton();
	                	}
	                        
	                }
	        });
	    }else{

	    	$("#resusu").parent().removeClass("has-error has-success");
	        $("#resusu").html("");
	    }
	});
    
    	function boton() {
    
      activo=true;
      if ($("#resusu").parent().hasClass("has-error")) {

      	activo=false;
      }
      if ($("#contval").parent().hasClass("has-error")) {

      	activo=false;
      }

      if (activo) {
      	$("#enviar").removeAttr('disabled'); 
      }else{
      	$("#enviar").attr('disabled','disabled');

      }
         
	}
    
});
	
	</script>

<script>
$( "select" ).change(function () {
    var str = "";
    $( "select option:selected" ).each(function() {
      str += $( this ).text();
    });
    if (str=="Cliente") {
    	$( ".cliente" ).show();
    	$(".cliente div input").attr('required', '');
    }else{
    	$( ".cliente" ).hide();
    	$(".cliente div input").removeAttr('required');
    	$(".cliente div input").val("");
    }
    
  });
  
</script>

<link rel="stylesheet" type="text/css" href="js/datetimepicker.css"/ >
		
	<script type="text/javascript" src="js/jquery.maskedinput.js"></script>	
    <script type="text/javascript" src="js/datetimepicker.js"></script>
		<script type="text/javascript">
		 //$(document).ready(function() {
			//$('#hinicio').clockpicker();
			$('#fechanac').datetimepicker({value:'1996-12-31' ,lang:'es',maxDate:'1996/12/31',format:'Y-m-d',timepicker:false, mask:true});
            $('#fechamem').datetimepicker({value: hoy(), minDate:0,lang:'es',format:'Y-m-d',timepicker:false, mask:true});
            $("#dui").mask("99999999-9");
            $("#tel").mask("9999-9999");
            $("#nit").mask("9999-999999-999-9");
            
            function hoy(){
				var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();

				if(dd<10) {
				    dd='0'+dd
				} 

				if(mm<10) {
				    mm='0'+mm
				} 

				today = yyyy+'-'+mm+'-'+dd;
				return today;
			}
		</script>
</html>