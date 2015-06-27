<?php
	
	if (isset($_POST['usuario']) ) {
	    
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
	        $stmt = $dbh->prepare("SELECT usuario FROM usuario  WHERE usuario = :usuario");
	        $stmt->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_STR, 10);
	        	        
	        /*** execute the prepared statement ***/
	        $stmt->execute();
	        
	        /*** fetch the results ***/
	        $result = $stmt->fetchAll();
	        
	        if (count($result) != 0) {
			    echo "si"; //existe 
			} else {
			    echo "no";//no existe
			}
	        /*** close the database connection ***/
	        $dbh = null;
	    }
	    catch(PDOException $e) {
	        echo $e->getMessage();
	    }
	}else{
		echo "no if";
	}
?>