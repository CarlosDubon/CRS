<?php 
include_once 'conn.php';
class Reserva{
	
	private $idhorario;
	private $costo=0;
	private $inicio;
	private $fin;
	private $fecha;
	private $lugar;

	public function __construct($id){
		$this->idhorario=$id;
		$r=horario();
	    $this->inicio=$r['inicio'];
	    $this->fin=$r['fin']; 
	    $this->fecha=$r['fecha']; 
	    $this->costo=$r['costo'];
	    $this->lugar=$r['nombre'];      
	       
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
	        $stmt = $dbh->prepare(sql);
	        
	        
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