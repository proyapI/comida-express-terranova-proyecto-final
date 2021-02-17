<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if($_SESSION["rol"] == "cliente"){
    $idpedido = $_GET["id_pedido"];    
    $domiciliario = $_GET["id_domiciliario"];    
    $producto = new Producto();
    $consultar = $producto -> consultarTodos();
    $pedido = new Pedido();
    $consultas = $pedido -> consultar($idpedido);
    foreach ($consultas as $c){
        foreach ($consultar as $ct){
            if ($c -> getId_prod() == $ct -> getId_prod()){            
                $unidadesP = $ct -> getCantidad_und();            
                $suma = $unidadesP + $c -> getUnidades();
                $ct -> editarUnidades($ct -> getId_prod(),$suma);                
            }           
        }            
        $proceso = new Proceso("","eliminar pedido: " . $idpedido , date('Y-m-d'),date('H:i:s'),$c -> getId_prod(),"cliente",$_SESSION["id"]);
        $proceso -> crear();
        $pedido -> eliminar($idpedido,$_SESSION["id"], $c -> getId_prod(),$domiciliario);
    }
    $log = new Log($_SESSION["id"],"eliminar","eliminar pedido" , date('Y-m-d'),date('H:i:s'),"cliente");
    $log -> crear();
    echo "<script>alert('Pedido eliminado');window.location = 'index.php?pid=".base64_encode("presentacion/pedido/consultarPedido.php")."';</script>";   
}else{
    echo "Lo siento. Usted no tiene permisos";
}
?>
