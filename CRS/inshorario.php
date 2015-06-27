<?php
	session_start();
	if (isset($_SESSION['tipo'])){
		if ($_SESSION['tipo']!=1){
			header('Location: index.php');
		}
	}else{
		header('Location: index.php');
	}

	$mensaje="";
	function  fechaesp($fecha){
		$p = explode("-", $fecha);
			$y=$p[2];
			$m=$p[1];;
			$d=$p[0];;
			$fr=$y.'-'.$m."-".$d;
			return $fr;
		}
	if (isset($_POST['fecha'])) {
		include 'conn.php';
        $anio=fechaesp($_POST['fecha']);
	    
	    try {
	        $dbh = conectarbase();
	        
	        /*** echo a message saying we have connected ***/
	        //echo 'Connected to database';
	        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        /*foreach ($_POST as $key ) {
	        	print $key;
	        }*/
	        
			$hinicio = strtotime($_POST['hinicio']);
			$hinicio = date("H:i:00", $hinicio);
			$hfin = strtotime($_POST['hfin']);
			$hfin = date("H:i:00", $hfin);
	        /*** prepare the SQL statement ***/
	        $stmt = $dbh->prepare("INSERT into horario (fecha,inicio,fin,espacio_idespacio) values (:fecha,:inicio,:fin,:espacio) ");
	        $stmt->bindParam(':fecha', $anio, PDO::PARAM_STR, 10);
	        $stmt->bindParam(':inicio', $hinicio, PDO::PARAM_STR, 9);
	        $stmt->bindParam(':fin', $hfin, PDO::PARAM_STR, 9);	        
	        $stmt->bindParam(':espacio', $_POST['espacio'], PDO::PARAM_INT);
	        
	        /*** execute the prepared statement ***/
	        $exito=$stmt->execute();
	        
	         /*** close the database connection ***/
	        $dbh = null;
	        $mensaje="<div class='alert alert-success'>
			      <strong>¡Éxito! </strong>Horario insertado exitósamente 
			    </div>";
	    }
	    catch(PDOException $e) {
	        echo $e->getMessage();
	         $mensaje="<div class='alert alert-danger'>
			      <strong>¡Alerta!</strong>  error
			    </div>";

	    }
	   
	}
?>
<!doctype html>
<html lang='es'>
	<?php include 'head.php'; ?>
<body role="document">
	<?php include 'cabecera.php'; ?>
	<div class="container-fluid">
		<div class="panel panel-default col-md-6 col-md-offset-3">
			  <div class="panel-heading">
					<h3 class="panel-title"><b>Nuevo Horario</b></h3>
			  </div>
			  <div class="panel-body">
			  	<?=$mensaje?>
					<form action="inshorario.php" method="POST" role="form">
						<div class="form-group">
							<label for="f1">Fecha</label>
							<input type="text" class="form-control" id="fecha" name='fecha' placeholder="Input field"required>
						</div>
					
						<div class="form-group">
							<label for="hinicio">Inicio</label>
							<input type="text" class="form-control" id="hinicio" name='hinicio' placeholder="Hora Inicio"required>
						</div>
							<div class="form-group">
							<label for="hfin">Fin</label>
							<input type="text" class="form-control" id="hfin" name='hfin' placeholder="Hora fin" required>
						</div>
						<div class='dhora'></div>
						<div class="form-group">
							<label for="esp">Espacio</label>
						<select name="espacio" id="esp" class="form-control" required="required">
							<option value="1">Cancha</option>
							<option value="2">Teatro</option>
							<option value="3">Piscina</option>
							<option value="4">Iglesia</option>
						</select></div>
					
						
					
						<button type="submit" id="enviar" disabled class="btn btn-warning">Insertar</button>
					</form>
			  </div>
		</div>
		
		
	
		
	
	</div>
	<footer>
		<!--<link rel="stylesheet" type="text/css" href="js/clockpicker.css"/ >
		
		<script type="text/javascript" src="js/clockpicker.js"></script>-->
		<link rel="stylesheet" type="text/css" href="js/datetimepicker.css"/ >
		
		<script type="text/javascript" src="js/datetimepicker.js"></script>
		<script type="text/javascript">
		 //$(document).ready(function() {
			//$('#hinicio').clockpicker();
			$('#fecha').datetimepicker({value: hoy() , minDate:0,lang:'es',format:'d-m-Y',timepicker:false, mask:true});
			$('#hinicio,#hfin').datetimepicker({lang:'es',mask:true,format:'h:i:00 a',datepicker:false,step:5});
			
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

				today = dd +'-'+mm+'-'+ yyyy;
				return today;
			}
			function hora(){
				var today = new Date();
				var H = today.getHours();
				var m = today.getMinutes();
				var ampm = hours >= 12 ? 'pm' : 'am';
				H = hours % 12;
				H = hours ? hours : 12; // the hour '0' should be '12'
				m = minutes < 10 ? '0'+minutes : minutes; 
				

				

				hora = H+':'+m+':00'+ ' ' + ampm;
				return hora;
			}
			function compare_horas(hora1, hora2)  
			 {  // si es true hora1 mayor
			 	var time1 = hora1;
				var hours1 = Number(time1.match(/^(\d+)/)[1]);
				var minutes1 = Number(time1.match(/:(\d+)/)[1]);
				var xsegundo=Number(time1.match(/:(\d+)/)[2]);
				//var AMPM1 = time1.match(/\s(.*)$/)[1];
				
				var AMPM1 = hora1.search("pm");
				//alert(AMPM1);

				var time2 = hora2;
				var hours2 = Number(time2.match(/^(\d+)/)[1]);
				var minutes2 = Number(time2.match(/:(\d+)/)[1]);
				var ysegundo=Number(time2.match(/:(\d+)/)[2]);
				//var AMPM2 = time2.match(/\s(.*)$/)[1];
				var AMPM2 = hora2.search("am");
				//alert(AMPM2);
				/*
			    var xhora=hora1.substring(0, 2);  
			    var xminuto=hora1.substring(3, 5);  
			    var xsegundo=hora1.substring(6, 8);  
			    var yhora=hora2.substring(0, 2);  
			    var yminuto=hora2.substring(3, 5);  
			    var ysegundo=hora2.substring(6, 8); */

			    //var msg= "1:"+AMPM1+"  2:"+AMPM2;
			    //alert(msg);
			    if (AMPM2==AMPM1) {
			    	return(true);
			    }  
			    if (hours1> hours2)  
			    {  
			        return(true);
			        $('.dhora').text('true');  
			    }  
			    else  
			    {  
			      if (hours1 == hours2)  
			      {   
			        if (minutes1> minutes2)  
			        {  
			            return(true) ; 
			        }  
			        else  
			        {   
			          if (minutes1 == minutes2)  
			          {  
			            if (xsegundo> ysegundo)  
			              return(true);  
			            else  
			              return(false);  
			          }  
			          else  
			            return(false);  
			        }  
			      }  
			      else  
			        return(false);  
			    $('.dhora').text('false');
			    }  
			} 	
			//});
$('#hinicio,#hfin').change(function(){
	var ini= $('#hinicio').val();
	var fin= $('#hfin').val();
	$('.dhora').text('');
	var mayor=compare_horas(fin,ini);
	if (mayor) {
		$('.dhora').text('');
		$("#enviar").removeAttr('disabled');
			
	}else{
		$('.dhora').text('');
		$("#enviar").attr('disabled','disabled');

	}
});
					

		</script>


	</footer>
</body>
</html>