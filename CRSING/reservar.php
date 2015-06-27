<?php 
	include_once 'conn.php';
		include_once 'carrito.php';
		session_start();
		$res['exito']=false;
		if (isset($_POST['reservar'])) {
			if ($_POST['reservar']) {
				if (isset($_SESSION['carrito'])) {
					$carrito=unserialize($_SESSION['carrito']);
					$res=$carrito->guardar();
					
				}
			
			}
		}
		if ($res['exito']) {
			$_SESSION['carrito']=serialize(new Carrito());
		}
		
 ?>
<!DOCTYPE HTML>
 <html lang="es">
     <?php include'head.php';?>
 <head>
 	<title>CSSC RESERVATION</title>
 </head>
 <body role="document">
     <?php include'cabecera.php';?>
     <div class="container-fluid">
    <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-warning">
    <div class="panel-heading">
       </font><h3 class="panel-title3"><b>Reservation</b></h3>
    </div>
        
 	<?php 
 	if ($res['exito']) {
 	 	echo'<font color="green"><h3><center> Success! The reservation was made succesfully </h3></font>';
 	 	echo '<b>Ticket: </b>'.$res['factura']['idfactura'];
 	 	echo '<br><b>Total: </b>'.$res['factura']['total'];
 	 	echo '<br><b>Date: </b>'.$res['factura']['fecha'];

 	 	echo $res['tabla'];
 	 }else {
 	 	echo'<font color="#b41212"><h3><center> Sorry! The reservation cannot be made, please try again. </h3></font>	';
 	 }
 	 	 	  ?>
        <span class="center"><center><a href="javascript:window.print()" id="ocultar" onclick="hide();return false;">Print Ticket</a></center></span>         
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