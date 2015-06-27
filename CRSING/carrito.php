<?php
include_once 'conn.php';
class Carrito{
	public $idcliente;
	public $reservas=array();
	public $total;
	
	public function __construct()
	{
	    $this->total=0;
	    try {
		        $dbh = conectarbase();
		        
		        /*** echo a message saying we have connected ***/
		        //echo 'Connected to database';
		        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        $sql="SELECT idcliente FROM cliente join usuario on(idusuario=usuario_idusuario)  WHERE usuario='".$_SESSION['usuario']."'";
		        /*** prepare the SQL statement ***/
		        $stmt = $dbh->prepare($sql);
	
		        /*** execute the prepared statement ***/
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);


		        
		        /*** close the database connection ***/
		        $dbh = null;
		        $this->idcliente= $result['idcliente'];
		    }
		    catch(PDOException $e) {
		        //echo $e->getMessage();
		        $exito=false;
		    }
	    
	}
	public static function  porUsuario($usuario)
	{	$instance = new self();
	    $instance->total=0;
	    try {
		        $dbh = conectarbase();
		        
		        /*** echo a message saying we have connected ***/
		        //echo 'Connected to database';
		        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        $sql="SELECT idcliente FROM cliente join usuario on(idusuario=usuario_idusuario)  WHERE usuario='".$usuario."'";
		        /*** prepare the SQL statement ***/
		        $stmt = $dbh->prepare($sql);
	
		        /*** execute the prepared statement ***/
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);


		        
		        /*** close the database connection ***/
		        $dbh = null;
		        $instance->idcliente= $result['idcliente'];
		    }
		    catch(PDOException $e) {
		        //echo $e->getMessage();
		        $exito=false;
		    }
		    return $instance;
	    
	}

	public function total(){
		return $this->total;
	}
	public function add($id){
		
		$existe=false;
		foreach ($this->reservas as $r) {
			
			if ($r->idhorario==$id) {
				$existe=true;
			}
		}
		if (!$existe) {
			$reserva= new Reserva($id);
			$this->reservas[]=$reserva;
			$suma=0;
			foreach ($this->reservas as $r) {
				$suma=$suma + $r->costo;
			}
			$this->total=$suma;
		}
		
	}

	public function delete($indice){

		unset($this->reservas[$indice]);
		$this->reservas = array_values($this->reservas);
		$suma=0;
			foreach ($this->reservas as $r) {
				$suma=$suma + $r->costo;
			}
			$this->total=$suma;
	}
	public function guardar(){
		$exito;
		try {
	        $dbh = conectarbase();
	        
	        /*** echo a message saying we have connected ***/
	        //echo 'Connected to database';
	        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $fecha=date("Y-m-d H:i:s");
	        $sql="INSERT into factura (fecha,total, cliente_idcliente) values('$fecha','0','$this->idcliente')";
	        $sql2=" SELECT idfactura FROM factura WHERE fecha='$fecha' and cliente_idcliente='$this->idcliente'";
	        /*** prepare the SQL statement ***/
	        $stmt = $dbh->prepare($sql);
	        
	        
	        /*** execute the prepared statement ***/
	        $stmt->execute();
	        $stmt = $dbh->prepare($sql2);
	        $stmt->execute();
	        $result = $stmt->fetch(PDO::FETCH_ASSOC);
	        $idfactura= $result['idfactura'];
	        foreach ($this->reservas as $r) {
	        	$r->guardar($idfactura);
	        }
	        
	        /*** close the database connection ***/
	        
	        $sql3="SELECT idfactura,total,fecha FROM factura where idfactura=$idfactura";
	        $stmt = $dbh->prepare($sql3);
	        $stmt->execute();
	        $dbh = null;
	        $exito=true;
	        $res['factura']= $stmt->fetch();


	    }
	    catch(PDOException $e) {
	        echo $e->getMessage();
	        $exito=false;
	    }
	    $res['exito']=$exito;
	    
	    $res['tabla']=$this->tablaFactura(PDO::FETCH_ASSOC);
	    return $res;

		
	}

	public function getReservas(){
		return $this->reservas;
	}
	public function tabla(){
		$tabla="<table class='table table-hover'>
	<thead>
		<tr>
			<th>Area</th>
			<th>Cost</th>
			<th>Date</th>
			<th>Start</th>
			<th>End</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>";
		$i=0;
		foreach ($this->reservas as $r) {
			$tabla=$tabla."<tr>
			<th>".$r->lugar."</th>
			<th>".$r->costo."</th>
			<th>".$r->fecha."</th>
			<th>".$r->inicio."</th>
			<th>$r->fin</th>
			<th><a href='verCarrito.php?quitar=$i' class='quitar'>Delete</a></th>
		</tr>";
			$i++;
		}
		$tabla=$tabla."</tbody></table>";
		return $tabla;
	}
	public function tablaFactura(){
		$tabla="<table class='table table-hover'>
	<thead>
		<tr>
			<th>Area</th>
			<th>Cost</th>
			<th>Date</th>
			<th>Start</th>
			<th>End</th>
			
		</tr>
	</thead>
	<tbody>";
		$i=0;
		foreach ($this->reservas as $r) {
			$tabla=$tabla."<tr>
			<td>".$r->lugar."</td>
			<td>".$r->costo."</td>
			<td>".$r->fecha."</td>
			<td>".$r->inicio."</td>
			<td>$r->fin</td>
			
		</tr>";
			$i++;
		}
		$tabla=$tabla."</tbody></table>";
		return $tabla;
	}

	public function idhorarios()
	{
		$respuesta="";
		$i=0;
		foreach ($this->reservas as $r) {
			if ($i==0) {
				$respuesta.=$r->idhorario;
			}else{
				$respuesta.=",".$r->idhorario;
			}
			$i++;
		}
		if (strcmp($respuesta,"")==0) {
			$respuesta="-1";
		}
		return $respuesta;
	}


}



class Reserva{
	
	public $idhorario;
	public $costo=0;
	public $inicio;
	public $fin;
	public $fecha;
	public $lugar;

	public function __construct($id){
		$this->idhorario=$id;
		$r=$this->horario();
	    $this->inicio=$r['inicio'];
	    $this->fin=$r['fin']; 
	    $this->fecha=$r['fecha']; 
	    $this->costo=$r['costo'];
	    $this->lugar=$r['nombre'];      
	       
	}
	public function guardar($id){
		try {
	        $dbh = conectarbase();
	        
	        /*** echo a message saying we have connected ***/
	        //echo 'Connected to database';
	        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        
	        $sql="INSERT into reserva (factura_idfactura,horario_idhorario) values('$id','$this->idhorario')";
	        
	        /*** prepare the SQL statement ***/
	        $stmt = $dbh->prepare($sql);
	        
	        
	        /*** execute the prepared statement ***/
	        $stmt->execute();
	        /*** close the database connection ***/
	        $dbh = null;
	         
	    }
	    catch(PDOException $e) {
	        echo $e->getMessage();
	        $exito=false;
	    }
	}

	public function horario(){
		$respuesta;
		try {
	        $dbh = conectarbase();
	        
	        /*** echo a message saying we have connected ***/
	        //echo 'Connected to database';
	        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql="SELECT inicio,fin,fecha,costo,nombre FROM horario,espacio  WHERE idespacio=espacio_idespacio and idhorario='".$this->idhorario."'";
	        /*** prepare the SQL statement ***/
	        $stmt = $dbh->prepare($sql);
	        
	        
	        /*** execute the prepared statement ***/
	        $stmt->execute();
	        $result = $stmt->fetch(PDO::FETCH_ASSOC);


	        
	        /*** close the database connection ***/
	        $dbh = null;
	        return $result;
	    }
	    catch(PDOException $e) {
	        //echo $e->getMessage();
	        $exito=false;
	    }
	    return NULL;
	}
}

		
	