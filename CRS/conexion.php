<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php


/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

try {
    $dbh = new PDO("mysql:host=".$hostname.";dbname=cssreservation", $username, $password);
    
    /*** echo a message saying we have connected ***/
    echo 'Connected to database';
    
    /*** The SQL SELECT statement ***/
    
    /*** set the error reporting attribute ***/
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    /*** some variables ***/
    
    /*  $animal_id = 6;
    
    $animal_name = 'bruce';*/
    $id = 2;
    
    /*** prepare the SQL statement ***/
    $stmt = $dbh->prepare("SELECT * FROM usuario ");

    //$stmt = $dbh->prepare("SELECT * FROM usuario WHERE idusuario = :id ");
    /*** bind the paramaters ***/
    //$stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    // $stmt->bindParam(':animal_name', $animal_name, PDO::PARAM_STR, 5);
    
    /*** execute the prepared statement ***/
    $stmt->execute();
    
    /*** fetch the results ***/
    $result = $stmt->fetchAll();
    
    /*** loop of the results ***/
    foreach ($result as $row) {
        echo $row['idusuario'] . '<br />';
        echo $row['usuario'] . '<br />';
        echo $row['contrasena'] . '<br />';
        echo $row['correo'];
    }
    
    /*** close the database connection ***/
    $dbh = null;
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>
    
</body>
</html>
