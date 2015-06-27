<?php
	session_start();
		if (isset($_SESSION['tipo'])){
		if ($_SESSION['tipo']!=1){
			header('Location: index.php');
		}
	}else{
		header('Location: index.php');
	}
	if (isset($_REQUEST['usuario'])) {
		    /*** mysql hostname ***/
		    $hostname = 'localhost';
		    
		    /*** mysql username ***/
		    $username = 'root';
		    
		    /*** mysql password ***/
		    $password = '';
		    
		    try {
		        $dbh = new PDO("mysql:host=" . $hostname . ";dbname=cssreservation", $username, $password);
		        
		        /*** echo a message saying we have connected ***/
		        //echo 'Connected to database';
		        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        
		        /*** prepare the SQL statement ***/
		        $stmt = $dbh->prepare("DELETE FROM cliente WHERE usuario_idusuario=(SELECT idusuario FROM USUARIO WHERE usuario=:usuario);DELETE FROM usuario WHERE usuario=:usuario");
		        
		        $stmt->bindParam(':usuario', $_REQUEST['usuario'], PDO::PARAM_STR, 10);
		        /*** execute the prepared statement ***/
		        $stmt->execute();   
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
	<div class="container-fluid col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
					<h3 class="panel-title"><b><span class="glyphicon glyphicon-list-alt"></span> Mostrar Usuarios</b></h3>
			</div>
			  <div class="panel-body">
			  	<table class="table table-hover">
			  			<thead>
							<tr>
								<th><span class="glyphicon glyphicon-user"></span> Usuario</th>
								<th><span class="glyphicon glyphicon-question-sign"></span> Tipo</th> 
								<th><span class="glyphicon glyphicon-envelope"></span> Correo</th>
								<th><span class="glyphicon glyphicon-refresh"></span> Modificar</th>
								<th><span class="glyphicon glyphicon-trash"></span> Eliminar</th>
								<th><span class="glyphicon glyphicon-usd"></span> Saldo</th>
							</tr>
						</thead>
						<tbody>
<?php


					    //echo '<br /> <br /> <h1> ' . $_POST['usuario'] . '</h1>';
					    
					    /*** mysql hostname ***/
					    $hostname = 'localhost';
					    
					    /*** mysql username ***/
					    $username = 'root';
					    
					    /*** mysql password ***/
					    $password = '';
					    
					    try {
					        $dbh = new PDO("mysql:host=" . $hostname . ";dbname=cssreservation", $username, $password);
					        
					        /*** echo a message saying we have connected ***/
					        //echo 'Connected to database';
					        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					        
					        /*** prepare the SQL statement ***/
					        $stmt = $dbh->prepare("SELECT usuario,tipo,correo FROM usuario WHERE tipo!=1 ");
					        
					        /*** execute the prepared statement ***/
					        $stmt->execute();
					        
					        /*** fetch the results ***/
					        $result = $stmt->fetchAll();
					        
					        /*** loop of the results ***/
					        foreach ($result as $row) {
					            ?>
					            			<tr>
												<td><?=$row ["usuario"]?></td><td><?=$row ["tipo"]==1?"Administrador":"Cliente"?></td>
												<td><?=$row ["correo"]?></td>
												<td><a <?="href='modificarUsuario.php?usuario=".$row ["usuario"]."'"?>>Modificar</a></td>
												<td><a <?="href='mostrarUsuario.php?usuario=".$row ["usuario"]."'"?> onclick="return confirm('¿Está seguro?');">Eliminar</a></td>
												<td><a <?="href='agregarsaldo.php?usuario=".$row ["usuario"]."'"?>>Agregar</a></td>
											</tr>
					        <?php
                            }
					        /*** close the database connection ***/
					        $dbh = null;
					    }
					    catch(PDOException $e) {
					        echo $e->getMessage();
					    }
				?>
					

							
						</tbody>
					</table>
			  </div>
		</div>
		
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Eliminar Usuario</h4>
                            </div>
                            <div class="modal-body">
                                ¿Está seguro de eliminar el usuario seleccionado?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
		
	
	</div>
	<footer>

	</footer>
</body>
</html>