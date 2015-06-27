<?php

function conectarbase(){
    /*** mysql hostname ***/
    $hostname = 'localhost';
    $port=3036;
    /*** mysql username ***/
    $username = 'root';
    $port=
    /*** mysql password ***/
    $password = '';
    $base='cssreservation';

    try {
        $dbh = new PDO("mysql:host=$hostname;port=$port;dbname=$base", $username, $password);
        
    }
    catch(PDOException $e) {
        echo $e->getMessage();
         $dbh=null;
    }
    return $dbh;
}
?>
    

