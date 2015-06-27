<?php
require "connsql.php";
require "fpdf17/fpdf.php";
if(isset($_GET['modo'])){
$modo = $_GET['modo']; 
     
    function repclientees(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT * FROM cliente"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("REPORTES CLIENTES"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(10, 5, utf8_decode("ID"), 0, 1, 'L',0);
        $pdf->SetXY($x + 10, $y);
        $pdf->MultiCell(35, 5, utf8_decode("NOMBRE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 45, $y);
        $pdf->MultiCell(35, 5, utf8_decode("APELLIDO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 80, $y);
        $pdf->MultiCell(30, 5, utf8_decode("DUI"), 0, 1, 'L',0);
        $pdf->SetXY($x + 110, $y);
        $pdf->MultiCell(35, 5, utf8_decode("TELEFONO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 145, $y);
        $pdf->MultiCell(40, 5, utf8_decode("NIT"), 0, 1, 'L',0);
        $pdf->SetXY($x + 185, $y);
        $pdf->MultiCell(20, 5, utf8_decode("SALDO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $id = $row['0'];
            $nombre= $row['1'];
            $apellido = $row['2'];
            $dui = $row['3'];
            $telefono = $row['4'];
            $nit = $row['7'];
            $saldo = "$ ".$row['9'];

                $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(10, 5, utf8_decode($id), 1, 1, 'L',0);
        $pdf->SetXY($x + 10, $y);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 45, $y);
        $pdf->MultiCell(35, 5, utf8_decode($apellido), 1, 1, 'L',0);
        $pdf->SetXY($x + 80, $y);
        $pdf->MultiCell(30, 5, utf8_decode($dui), 1, 1, 'L',0);
        $pdf->SetXY($x + 110, $y);
        $pdf->MultiCell(35, 5, utf8_decode($telefono), 1, 1, 'L',0);
        $pdf->SetXY($x + 145, $y);
        $pdf->MultiCell(40, 5, utf8_decode($nit), 1, 1, 'L',0);
        $pdf->SetXY($x + 185, $y);
        $pdf->MultiCell(20, 5, utf8_decode($saldo), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();


        }

        $pdf->Output();
    }
    


    function repclientein(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT * FROM cliente"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("CLIENT REPORTS"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(10, 5, utf8_decode("ID"), 0, 1, 'L',0);
        $pdf->SetXY($x + 10, $y);
        $pdf->MultiCell(35, 5, utf8_decode("NAME"), 0, 1, 'L',0);
        $pdf->SetXY($x + 45, $y);
        $pdf->MultiCell(35, 5, utf8_decode("LASTNAME"), 0, 1, 'L',0);
        $pdf->SetXY($x + 80, $y);
        $pdf->MultiCell(30, 5, utf8_decode("DUI"), 0, 1, 'L',0);
        $pdf->SetXY($x + 110, $y);
        $pdf->MultiCell(35, 5, utf8_decode("TELEPHONE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 145, $y);
        $pdf->MultiCell(40, 5, utf8_decode("NIT"), 0, 1, 'L',0);
        $pdf->SetXY($x + 185, $y);
        $pdf->MultiCell(20, 5, utf8_decode("BALANCE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $id = $row['0'];
            $nombre= $row['1'];
            $apellido = $row['2'];
            $dui = $row['3'];
            $telefono = $row['4'];
            $nit = $row['7'];
            $saldo = "$ ".$row['9'];

                $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(10, 5, utf8_decode($id), 1, 1, 'L',0);
        $pdf->SetXY($x + 10, $y);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 45, $y);
        $pdf->MultiCell(35, 5, utf8_decode($apellido), 1, 1, 'L',0);
        $pdf->SetXY($x + 80, $y);
        $pdf->MultiCell(30, 5, utf8_decode($dui), 1, 1, 'L',0);
        $pdf->SetXY($x + 110, $y);
        $pdf->MultiCell(35, 5, utf8_decode($telefono), 1, 1, 'L',0);
        $pdf->SetXY($x + 145, $y);
        $pdf->MultiCell(40, 5, utf8_decode($nit), 1, 1, 'L',0);
        $pdf->SetXY($x + 185, $y);
        $pdf->MultiCell(20, 5, utf8_decode($saldo), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();
        }
        $pdf->Output();
    }
    
        function repusuarioes(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT usuario.idusuario, usuario.usuario, usuario.correo, usuario.tipo, cliente.nombre, cliente.apellido, cliente.saldo FROM usuario                                     INNER JOIN cliente ON  usuario.idusuario = cliente.usuario_idusuario"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("REPORTES USUARIO"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(10, 5, utf8_decode("ID"), 0, 1, 'L',0);
        $pdf->SetXY($x + 10, $y);
        $pdf->MultiCell(35, 5, utf8_decode("USUARIO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 45, $y);
        $pdf->MultiCell(45, 5, utf8_decode("CORREO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(15, 5, utf8_decode("TIPO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 105, $y);
        $pdf->MultiCell(35, 5, utf8_decode("NOMBRE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 140, $y);
        $pdf->MultiCell(35, 5, utf8_decode("APELLIDO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 175, $y);
        $pdf->MultiCell(15, 5, utf8_decode("Saldo"), 0, 1, 'L',0);
        $pdf->SetXY($x + 190, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $id = $row['0'];
            $usuario= $row['1'];
            $correo = $row['2'];
            $tipo = $row['3'];
            $nombre = $row['4'];
            $apellido = $row['5'];
            $saldo= "$ " .$row['6'];
          

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(10, 5, utf8_decode($id), 1, 1, 'L',0);
        $pdf->SetXY($x + 10, $y);
        $pdf->MultiCell(35, 5, utf8_decode($usuario), 1, 1, 'L',0);
        $pdf->SetXY($x + 45, $y);
        $pdf->MultiCell(45, 5, utf8_decode($correo), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(15, 5, utf8_decode($tipo), 1, 1, 'L',0);
        $pdf->SetXY($x + 105, $y);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 140, $y);
        $pdf->MultiCell(35, 5, utf8_decode($apellido), 1, 1, 'L',0);
        $pdf->SetXY($x + 175, $y);
        $pdf->MultiCell(15, 5, utf8_decode($saldo), 1, 1, 'L',0);
        $pdf->SetXY($x + 190, $y);
        $pdf->Ln();


        }

        $pdf->Output();
    }

    function repusuarioin(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT usuario.idusuario, usuario.usuario, usuario.correo, usuario.tipo, cliente.nombre, cliente.apellido, cliente.saldo FROM usuario                                     INNER JOIN cliente ON  usuario.idusuario = cliente.usuario_idusuario"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("USER REPORTS"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(10, 5, utf8_decode("ID"), 0, 1, 'L',0);
        $pdf->SetXY($x + 10, $y);
        $pdf->MultiCell(35, 5, utf8_decode("USER"), 0, 1, 'L',0);
        $pdf->SetXY($x + 45, $y);
        $pdf->MultiCell(45, 5, utf8_decode("E-MAIL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(15, 5, utf8_decode("TYPE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 105, $y);
        $pdf->MultiCell(35, 5, utf8_decode("NAME"), 0, 1, 'L',0);
        $pdf->SetXY($x + 140, $y);
        $pdf->MultiCell(35, 5, utf8_decode("LASTNAME"), 0, 1, 'L',0);
        $pdf->SetXY($x + 175, $y);
        $pdf->MultiCell(20, 5, utf8_decode("BALANCE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 200, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $id = $row['0'];
            $usuario= $row['1'];
            $correo = $row['2'];
            $tipo = $row['3'];
            $nombre = $row['4'];
            $apellido = $row['5'];
            $saldo= "$ " .$row['6'];
          

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(10, 5, utf8_decode($id), 1, 1, 'L',0);
        $pdf->SetXY($x + 10, $y);
        $pdf->MultiCell(35, 5, utf8_decode($usuario), 1, 1, 'L',0);
        $pdf->SetXY($x + 45, $y);
        $pdf->MultiCell(45, 5, utf8_decode($correo), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(15, 5, utf8_decode($tipo), 1, 1, 'L',0);
        $pdf->SetXY($x + 105, $y);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 140, $y);
        $pdf->MultiCell(35, 5, utf8_decode($apellido), 1, 1, 'L',0);
        $pdf->SetXY($x + 175, $y);
        $pdf->MultiCell(20, 5, utf8_decode($saldo), 1, 1, 'L',0);
        $pdf->SetXY($x + 200, $y);
        $pdf->Ln();


        }

        $pdf->Output();
    }
    
        function represerves(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT cliente.nombre, horario.fecha, horario.inicio, horario.fin, espacio.nombre, factura.total FROM cliente INNER JOIN factura on                                      idcliente=cliente_idcliente INNER JOIN reserva on idfactura=factura_idfactura INNER JOIN horario                                                           on idhorario=horario_idhorario INNER JOIN espacio on idespacio=espacio_idespacio"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("REPORTES RESERVA"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(35, 5, utf8_decode("NOMBRE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode("FECHA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode("HORA INICIO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode("HORA FIN"), 0, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode("ÁREA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode("COSTO TOTAL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $nombre = $row['0'];
            $fecha = $row['1'];
            $horaini= $row['2'];
            $horafini = $row['3'];
            $area = $row['4'];
            $total = "$ ". $row['5'];
            

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode($fecha), 1, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horaini), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horafini), 1, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode($area), 1, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode($total), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        }

        $pdf->Output();
    }
    
            function represervin(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT cliente.nombre, horario.fecha, horario.inicio, horario.fin, espacio.nombre, factura.total FROM cliente INNER JOIN              factura on                                      idcliente=cliente_idcliente INNER JOIN reserva on idfactura=factura_idfactura INNER JOIN horario                                                           on idhorario=horario_idhorario INNER JOIN espacio on idespacio=espacio_idespacio"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("RESERVATION REPORTS"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(35, 5, utf8_decode("NAME"), 0, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode("DATE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode("START HOUR"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode("END HOUR"), 0, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode("AREA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode("TOTAL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $nombre = $row['0'];
            $fecha = $row['1'];
            $horaini= $row['2'];
            $horafini = $row['3'];
            $area = $row['4'];
            $total = "$ " .$row['5'];
            

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode($fecha), 1, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horaini), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horafini), 1, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode($area), 1, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode($total), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        }

        $pdf->Output();
}
    
        function repcanchaes(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT cliente.nombre, horario.fecha, horario.inicio, horario.fin, espacio.nombre, factura.total FROM cliente INNER JOIN factura on                                      idcliente=cliente_idcliente INNER JOIN reserva on idfactura=factura_idfactura INNER JOIN horario                                                           on idhorario=horario_idhorario INNER JOIN espacio on idespacio=espacio_idespacio WHERE espacio.idespacio=1"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("REPORTES CANCHAS SINTETICAS"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(35, 5, utf8_decode("NOMBRE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode("FECHA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode("HORA INICIO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode("HORA FIN"), 0, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode("ÁREA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode("COSTO TOTAL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $nombre = $row['0'];
            $fecha = $row['1'];
            $horaini= $row['2'];
            $horafini = $row['3'];
            $area = $row['4'];
            $total = "$ ". $row['5'];
            

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode($fecha), 1, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horaini), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horafini), 1, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode($area), 1, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode($total), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        }

        $pdf->Output();
    }

        function repcanchain(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT cliente.nombre, horario.fecha, horario.inicio, horario.fin, espacio.nombre, factura.total FROM cliente INNER JOIN              factura on                                      idcliente=cliente_idcliente INNER JOIN reserva on idfactura=factura_idfactura INNER JOIN horario                                                           on idhorario=horario_idhorario INNER JOIN espacio on idespacio=espacio_idespacio WHERE espacio.idespacio=1"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("SOCCER FIELD REPORTS"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(35, 5, utf8_decode("NAME"), 0, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode("DATE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode("START HOUR"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode("END HOUR"), 0, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode("AREA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode("TOTAL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $nombre = $row['0'];
            $fecha = $row['1'];
            $horaini= $row['2'];
            $horafini = $row['3'];
            $area = $row['4'];
            $total = "$ " .$row['5'];
            

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode($fecha), 1, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horaini), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horafini), 1, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode($area), 1, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode($total), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        }

        $pdf->Output();
}
        function repteatroes(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT cliente.nombre, horario.fecha, horario.inicio, horario.fin, espacio.nombre, factura.total FROM cliente INNER JOIN factura on                                      idcliente=cliente_idcliente INNER JOIN reserva on idfactura=factura_idfactura INNER JOIN horario                                                           on idhorario=horario_idhorario INNER JOIN espacio on idespacio=espacio_idespacio WHERE espacio.idespacio=2"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("REPORTES TEATRO"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(35, 5, utf8_decode("NOMBRE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode("FECHA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode("HORA INICIO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode("HORA FIN"), 0, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode("ÁREA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode("COSTO TOTAL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $nombre = $row['0'];
            $fecha = $row['1'];
            $horaini= $row['2'];
            $horafini = $row['3'];
            $area = $row['4'];
            $total = "$ ". $row['5'];
            

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode($fecha), 1, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horaini), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horafini), 1, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode($area), 1, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode($total), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        }

        $pdf->Output();
}
            function repteatroin(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT cliente.nombre, horario.fecha, horario.inicio, horario.fin, espacio.nombre, factura.total FROM cliente INNER JOIN              factura on                                      idcliente=cliente_idcliente INNER JOIN reserva on idfactura=factura_idfactura INNER JOIN horario                                                           on idhorario=horario_idhorario INNER JOIN espacio on idespacio=espacio_idespacio WHERE espacio.idespacio=2"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("THEATER REPORTS"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(35, 5, utf8_decode("NAME"), 0, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode("DATE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode("START HOUR"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode("END HOUR"), 0, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode("AREA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode("TOTAL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $nombre = $row['0'];
            $fecha = $row['1'];
            $horaini= $row['2'];
            $horafini = $row['3'];
            $area = $row['4'];
            $total = "$ " .$row['5'];
            

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode($fecha), 1, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horaini), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horafini), 1, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode($area), 1, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode($total), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        }

        $pdf->Output();
}
        function reppiscinaes(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT cliente.nombre, horario.fecha, horario.inicio, horario.fin, espacio.nombre, factura.total FROM cliente INNER JOIN factura on                                      idcliente=cliente_idcliente INNER JOIN reserva on idfactura=factura_idfactura INNER JOIN horario                                                           on idhorario=horario_idhorario INNER JOIN espacio on idespacio=espacio_idespacio WHERE espacio.idespacio=3"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("REPORTES PISCINA"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(35, 5, utf8_decode("NOMBRE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode("FECHA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode("HORA INICIO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode("HORA FIN"), 0, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode("ÁREA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode("COSTO TOTAL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $nombre = $row['0'];
            $fecha = $row['1'];
            $horaini= $row['2'];
            $horafini = $row['3'];
            $area = $row['4'];
            $total = "$ ". $row['5'];
            

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode($fecha), 1, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horaini), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horafini), 1, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode($area), 1, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode($total), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        }

        $pdf->Output();
}
            function reppiscinain(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT cliente.nombre, horario.fecha, horario.inicio, horario.fin, espacio.nombre, factura.total FROM cliente INNER JOIN              factura on                                      idcliente=cliente_idcliente INNER JOIN reserva on idfactura=factura_idfactura INNER JOIN horario                                                           on idhorario=horario_idhorario INNER JOIN espacio on idespacio=espacio_idespacio WHERE espacio.idespacio=3"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("SWIMMING POOL REPORTS"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(35, 5, utf8_decode("NAME"), 0, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode("DATE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode("START HOUR"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode("END HOUR"), 0, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode("AREA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode("TOTAL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $nombre = $row['0'];
            $fecha = $row['1'];
            $horaini= $row['2'];
            $horafini = $row['3'];
            $area = $row['4'];
            $total = "$ " .$row['5'];
            

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode($fecha), 1, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horaini), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horafini), 1, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode($area), 1, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode($total), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        }

        $pdf->Output();
}
        function repiglesiaes(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT cliente.nombre, horario.fecha, horario.inicio, horario.fin, espacio.nombre, factura.total FROM cliente INNER JOIN factura on                                      idcliente=cliente_idcliente INNER JOIN reserva on idfactura=factura_idfactura INNER JOIN horario                                                           on idhorario=horario_idhorario INNER JOIN espacio on idespacio=espacio_idespacio WHERE espacio.idespacio=3"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("REPORTES IGLESIA"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(35, 5, utf8_decode("NOMBRE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode("FECHA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode("HORA INICIO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode("HORA FIN"), 0, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode("ÁREA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode("COSTO TOTAL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $nombre = $row['0'];
            $fecha = $row['1'];
            $horaini= $row['2'];
            $horafini = $row['3'];
            $area = $row['4'];
            $total = "$ ". $row['5'];
            

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode($fecha), 1, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horaini), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horafini), 1, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode($area), 1, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode($total), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        }

        $pdf->Output();
}
            function repiglesiain(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT cliente.nombre, horario.fecha, horario.inicio, horario.fin, espacio.nombre, factura.total FROM cliente INNER JOIN              factura on                                      idcliente=cliente_idcliente INNER JOIN reserva on idfactura=factura_idfactura INNER JOIN horario                                                           on idhorario=horario_idhorario INNER JOIN espacio on idespacio=espacio_idespacio WHERE espacio.idespacio=3"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("CHURCH REPORTS"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(35, 5, utf8_decode("NAME"), 0, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode("DATE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode("START HOUR"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode("END HOUR"), 0, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode("AREA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode("TOTAL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $nombre = $row['0'];
            $fecha = $row['1'];
            $horaini= $row['2'];
            $horafini = $row['3'];
            $area = $row['4'];
            $total = "$ " .$row['5'];
            

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode($fecha), 1, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horaini), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horafini), 1, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode($area), 1, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode($total), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        }

        $pdf->Output();
}
        function reppropioses(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT cliente.nombre, horario.fecha, horario.inicio, horario.fin, espacio.nombre  
			        FROM usuario join cliente on(idusuario=usuario_idusuario) join factura 
			        on(idcliente=cliente_idcliente) join reserva on(idfactura=factura_idfactura) join horario 
			        on(idhorario=horario_idhorario) join espacio on(idespacio=espacio_idespacio) 
			        WHERE usuario"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("REPORTE DE SU USUARIO"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(35, 5, utf8_decode("NOMBRE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode("FECHA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode("HORA INICIO"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode("HORA FIN"), 0, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode("ÁREA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode("COSTO TOTAL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $nombre = $row['0'];
            $fecha = $row['1'];
            $horaini= $row['2'];
            $horafini = $row['3'];
            $area = $row['4'];
            $total = "$ ". $row['5'];
            

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode($fecha), 1, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horaini), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horafini), 1, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode($area), 1, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode($total), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        }

        $pdf->Output();
}
        function reppropiosin(){

        class PDF extends FPDF{}

        $pdf=new PDF ('P', 'mm', 'Letter');
        $pdf->SetMargins(8, 10);
        $pdf->AliasNbPages();
        $pdf->AddPage();


        $query = mysql_query("SELECT cliente.nombre, horario.fecha, horario.inicio, horario.fin, espacio.nombre  
			        FROM usuario join cliente on(idusuario=usuario_idusuario) join factura 
			        on(idcliente=cliente_idcliente) join reserva on(idfactura=factura_idfactura) join horario 
			        on(idhorario=horario_idhorario) join espacio on(idespacio=espacio_idespacio) 
			        WHERE usuario=usuario"); 


        $pdf->Image("img/letras.png");
        $pdf->SetFont("Arial", "b", 12);
        $pdf->Cell(0, 19, utf8_decode("USER REPORTS"), 0, 1,'C');

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetTextColor(255, 255, 255);
        $pdf->SetFont("Arial", "b", 10);
        $pdf->MultiCell(35, 5, utf8_decode("NAME"), 0, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode("DATE"), 0, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode("START HOUR"), 0, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode("END HOUR"), 0, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode("AREA"), 0, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode("TOTAL"), 0, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        while($row = mysql_fetch_row($query)){
            $nombre = $row['0'];
            $fecha = $row['1'];
            $horaini= $row['2'];
            $horafini = $row['3'];
            $area = $row['4'];
            $total = "$ ". $row['5'];
            

        $x =$pdf->GetX();
        $y =$pdf->GetY();
        $pdf-> SetFillColor(255, 255, 255);    
        $pdf-> SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", "b", 9);
        $pdf->MultiCell(35, 5, utf8_decode($nombre), 1, 1, 'L',0);
        $pdf->SetXY($x + 35, $y);
        $pdf->MultiCell(25, 5, utf8_decode($fecha), 1, 1, 'L',0);
        $pdf->SetXY($x + 60, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horaini), 1, 1, 'L',0);
        $pdf->SetXY($x + 90, $y);
        $pdf->MultiCell(30, 5, utf8_decode($horafini), 1, 1, 'L',0);
        $pdf->SetXY($x + 120, $y);
        $pdf->MultiCell(50, 5, utf8_decode($area), 1, 1, 'L',0);
        $pdf->SetXY($x + 170, $y);
        $pdf->MultiCell(35, 5, utf8_decode($total), 1, 1, 'L',0);
        $pdf->SetXY($x + 205, $y);
        $pdf->Ln();

        }

        $pdf->Output();
}
    
    switch($modo){
        case "repclientees":
            repclientees();
            break;
        case "repclientein":
            repclientein();
            break;
        case "repusuarioes":
            repusuarioes();
            break;
        case "repusuarioin":
            repusuarioin();
            break;
        case "represerves":
            represerves();
            break;
        case "represervin":
            represervin();
            break;
        case "repcanchaes":
            repcanchaes();
            break;
        case "repcanchain":
            repcanchain();
            break;
        case "repteatroes":
            repteatroes();
        break;
        case "repteatroin":
            repteatroin();
            break;
        case "reppiscinaes":
            reppiscinaes();
            break;
        case "reppiscinain":
            reppiscinain();
            break;
        case "repiglesiaes":
            repiglesiaes();
            break;
        case "repiglesiain":
            repiglesiain();
            break;
        case "reppropioses":
            reppropioses();
            break;
        case "reppropiosin":
            reppropioses();
            break;
}
    

    
}else{
    echo "<script>alert('hola')</script>";
}
?>