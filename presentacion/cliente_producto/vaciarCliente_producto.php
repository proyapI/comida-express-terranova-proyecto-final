<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if($_SESSION["rol"] == "cliente"){
    $carrito = new Cliente_producto();
    $consulta = $carrito -> consultarTodos();    
    foreach ($consulta as $c){                
        $proceso = new Proceso("","vaciar carrito: " . $c->getNombre_producto() , date('Y-m-d'),date('H:i:s'),$c->getId_prod(),"cliente",$_SESSION["id"]);
        $proceso -> crear();
    }          
    $log = new Log($_SESSION["id"],"vaciar","vaciar carrito" , date('Y-m-d'),date('H:i:s'),"cliente");
    $log -> crear();    
    $carrito->vaciar($_SESSION["id"]);
    echo "<script>alert('Carrito vaciado');window.location = 'index.php?pid=".base64_encode("presentacion/cliente_producto/consultarCliente_producto.php")."';</script>";
}else{
    echo "Lo siento. Usted no tiene permisos";
}
?>
