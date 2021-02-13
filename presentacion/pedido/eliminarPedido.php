<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if($_SESSION["rol"] == "cliente"){
    $idpedido = $_GET["id_pedido"];
    $prod = $_GET["id_producto"];
    $domiciliario = $_GET["id_domiciliario"];
    $unidades = $_GET["unidades"];
    $producto = new Producto();
    $consultar = $producto -> consultarTodos();
    $pedido = new Pedido();
    $pedido -> consultar($idpedido,$_SESSION["id"], $prod,$domiciliario);    
    foreach ($consultar as $ct){
        if ($prod == $ct -> getId_prod()){            
            $unidadesP = $ct -> getCantidad_und();            
            $suma = $unidadesP + $unidades;
            $ct -> editarUnidades($ct -> getId_prod(),$suma);
        }
        $pedido -> eliminar($idpedido,$_SESSION["id"], $prod,$domiciliario);
    }    
    $log = new Log($_SESSION["id"],"eliminar","eliminar pedido" , date('Y-m-d'),date('H:i:s'),"cliente");
    $log -> crear();
    echo "<script>alert('Pedido eliminado');window.location = 'index.php?pid=".base64_encode("presentacion/pedido/consultarPedido.php")."';</script>";   
}else{
    echo "Lo siento. Usted no tiene permisos";
}
?>
