<?php
session_start();
require "logica/Administrador.php";
require "logica/Cliente.php";
require "logica/Cliente_producto.php";
require "logica/Domiciliario.php";
require "logica/Pedido.php";
require "logica/Producto.php";
require "logica/Solicitud.php";
require "logica/cambioClave.php";
require "logica/Proveedor.php";
require "logica/Proceso.php";
require "logica/SolicitudP.php";
require "persistencia/Conexion.php";
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if ($_SESSION["rol"]=='cliente'){
    require 'fpdf/fpdf.php';
    
    class reportePedidoPDF extends FPDF
    {
        function Header()
        {
            $this->SetFont('Arial','B',15);
            $this->Image('img/logo.jpg',10,8,33);
            $this->Cell(30);
            $this->Cell(120,10, 'Comida express Terranova',0,0,'C');
            $this->Ln(10);
            $this->Cell(30);
            $this->Cell(120,10, 'Factura',0,0,'C');
            $this->Ln(20);
        }
        
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I', 8);
            $this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
        }
    }
    
    $idpedido = $_GET["id_pedido"];
    $prod = $_GET["id_producto"];
    $domiciliario = $_GET["id_domiciliario"];
    $dom = new Domiciliario($domiciliario);
    $dom -> consultar();
    $pedido = new Pedido();
    $pedidos = $pedido -> consultarF($idpedido,$_SESSION["id"], $prod,$domiciliario);
    $pedidos2 = $pedido->consultar($idpedido);
    $producto = new Producto($_GET["id_producto"]);
    $producto -> consultar();
    $cliente = new Cliente($_SESSION["id"]);
    $cliente -> consultar();
    
    $pdf = new reportePedidoPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(22,6,'PEDIDO: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(10,6,$idpedido,0,0,'C');
    $pdf->Ln(6);
    
    foreach ($pedidos as $p){
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(38,6,'FECHA Y HORA: ',0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(40,6,$p -> getFecha_hora(),0,0,'C');
        $pdf->Ln(6);
    }
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(54,6,'NOMBRE DEL CLIENTE: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(15,6,$cliente -> getNombre(),0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(56,6,'APELLIDO DEL CLIENTE: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(17,6,$cliente -> getApellido(),0,0,'C');
    $pdf->Ln(6);                    
    
    foreach ($pedidos2 as $p){
        $producto = new Producto($p->getId_prod());
        $producto->consultar();
        if ($p->getId_prod() == $producto->getId_prod()){
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(60,6,'NOMBRE DEL PRODUCTO: ',0,0,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(27,6,$producto -> getNombre(),0,0,'C');
            $pdf->Ln(6);
            
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(71,6,'DESCRIPCIÓN DEL PRODUCTO: ',0,0,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(20,6,$producto -> getDescripcion(),0,0,'C');
            $pdf->Ln(6);
            
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(40,6,'VALOR_UNIDAD: ',0,0,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(10,6,$producto-> getValor(),0,0,'C');
            $pdf->Ln(6);
            
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(28,6,'UNIDADES: ',0,0,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(4,6,$p -> getUnidades(),0,0,'C');
            $pdf->Ln(6);            
        }
        
    }
    
    
    foreach ($pedidos as $p){                        
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(38,6,'VALOR_TOTAL: ',0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10,6,$p -> getValor_total(),0,0,'C');
        $pdf->Ln(6);
    }
        
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(65,6,'NOMBRE DEL DOMICILIARIO: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(15,6,$dom -> getNombre(),0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(67,6,'APELLIDO DEL DOMICILIARIO: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(15,6,$dom -> getApellido(),0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(61,6,'CIUDAD DEL DOMICILIARIO: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(19,6,$dom -> getCiudad(),0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(70,6,'LOCALIDAD DEL DOMICILIARIO: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(19,6,$dom -> getLocalidad(),0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(68,6,'TELEFONO DEL DOMICILIARIO: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(23,6,$dom -> getTelefono(),0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(63,6,'CORREO DEL DOMICILIARIO: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(24,6,$dom -> getCorreo(),0,0,'C');
    
    $pdf->Output();
    $log = new Log($_SESSION["id"],"generar","generar factura" , date('Y-m-d'),date('H:i:s'),"cliente");
    $log -> crear();
}else{
    header("Location: index.php");
}

?>
