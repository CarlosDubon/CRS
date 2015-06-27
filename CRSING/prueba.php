<html>
<head>
	<title>has</title>
</head>
<body>
<?php 
echo "'".trim("          auwewe             ")."'<br>";
echo "'".rtrim("         auwewe             ")."'<br>";
echo "'".ltrim("         auwewe             ")."'<br>";
	$dato=$_REQUEST["dato"];
	echo "dato enviado: ".$dato."<br>";

	if( $dato==1)
	{
		echo "El valor enviado fue 1 ";
	}elseif ($dato==2) {
?>
		<ul><li>vlor1</li>
		<li>valor2</li> </ul>
<?php
	}else{
		echo "valor no coincide";
	}
	$v[0]=0;
	echo "<br>";
	for ($i=0; $i < $dato ; $i++) { 
		echo "iteracion: ".$i."<BR>";
		$v[$i]=$i+$i;
	}
	for ($j=0; $j < $i ; $j++) { 
		echo " v[".$j."]=".$v[$j]."<br>";
	}
	$p["nombre"]="minero";
	echo "nombre: ".$p["nombre"];
 ?>
</body>
</html>

