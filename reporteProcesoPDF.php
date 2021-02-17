<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require 'logica/Log.php';
require 'logica/Proceso.php';
require 'logica/Cliente.php';
require 'logica/Domiciliario.php';
require 'logica/Producto.php';
require 'logica/Pedido.php';
require 'persistencia/Conexion.php';
session_start();
if ($_SESSION["id"]!=0){    
    require 'fpdf/fpdf.php';
    
    class reporteProcesoPDF extends FPDF
    {
        function Header()
        {
            $this->SetFont('Arial','B',15);
            $this->Image('img/logo.jpg',10,8,33);            
            $this->Cell(30);
            $this->Cell(160,10, 'COMIDA EXPRESS TERRANOVA',0,0,'C');
            $this->Ln(10);
            $this->Cell(30);
            $this->Cell(160,10, 'TRAZABILIDAD DEL PROCESO COMPRAR PRODUCTOS',0,0,'C');
            $this->Ln(20);
        }
        
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I', 8);
            $this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
        }
    }
    
    $proceso = new Proceso();
    $procesos= $proceso -> consultarTodos();    
    foreach ($procesos as $p){
        $actor = $p-> getActor();        
        if ($actor=="cliente"){
            $cliente = new Cliente($p -> getIdActor());
            $cliente ->consultar();
        }else{
            $domiciliario = new Domiciliario($p -> getIdActor());
            $domiciliario ->consultar();
        }
    }
    
    $pdf = new reporteProcesoPDF('P', 'mm', array(260,310));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    $pdf->SetFont('Arial','B', 12);    
    $pdf->Cell(21,6,"CLIENTE: ",0,0,'C');
    $pdf->SetFont('Arial','', 12); 
    $pdf->Cell(36,6,$cliente->getNombre() . " " . $cliente->getApellido() . ".",0,1,'C');
    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(27,6,"DIRECCION: ",0,0,'C');
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(35,6,$cliente->getDireccion() . ".",0,1,'C');
    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(47,6,"LOCALIDAD, CIUDAD: ",0,0,'C');
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(35,6,$cliente->getLocalidad() . ", " . $cliente->getCiudad() . ".",0,1,'C');
    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(26,6,"TELEFONO: ",0,0,'C');
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(20,6,$cliente->getTelefono() . ".",0,1,'C');
    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(21,6,"CORREO: ",0,0,'C');
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(67,6,$cliente->getCorreo() . ".",0,1,'C');    
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B', 12);
    $pdf->SetFillColor(229,229,229);
    $pdf->Cell(25,6,"#PROCESO",1,0,'C',1);
    $pdf->Cell(90,6,"DATOS",1,0,'C',1);
    $pdf->Cell(25,6,"FECHA",1,0,'C',1);
    $pdf->Cell(25,6,"HORA",1,0,'C',1);
    $pdf->Cell(30,6,"#PRODUCTO",1,0,'C',1);
    $pdf->Cell(25,6,"ACTOR",1,0,'C',1);
    $pdf->Cell(20,6,"#ACTOR",1,1,'C',1);
    
    $pdf->SetFont('Arial','', 12);
    foreach ($procesos as $p){
        $pdf->Cell(25,6,$p -> getId(),1,0,'C');
        $pdf->Cell(90,6,$p -> getDatos(),1,0,'C');
        $pdf->Cell(25,6,$p -> getFecha(),1,0,'C');
        $pdf->Cell(25,6,$p -> getHora(),1,0,'C');
        $pdf->Cell(30,6,$p -> getIdProducto(),1,0,'C');
        $pdf->Cell(25,6,$p -> getActor(),1,0,'C');
        $pdf->Cell(20,6,$p -> getIdActor(),1,1,'C');
    }  
    
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(31,6,"DOMICILIARIO: ",0,0,'C');
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(30,6,$domiciliario->getNombre() . " " . $domiciliario->getApellido() . ".",0,1,'C');
    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(46,6,"LOCALIDAD, CIUDAD: ",0,0,'C');
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(35,6,$domiciliario->getLocalidad() . ", " . $cliente->getCiudad() . ".",0,1,'C');
    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(25,6,"TELEFONO: ",0,0,'C');
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(25,6,$domiciliario->getTelefono() . ".",0,1,'C');
    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(21,6,"CORREO: ",0,0,'C');
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(30,6,$domiciliario->getCorreo() . ".",0,1,'C');
    $pdf->Ln(6);
    
    $pdf->Output();  
}else{
    header("Location: index.php");
}

?>