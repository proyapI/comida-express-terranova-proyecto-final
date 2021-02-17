<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
date_default_timezone_set('America/Bogota');
require "logica/Log.php";
if($_SESSION["rol"] == "domiciliario"){
$idped = $_GET["id_pedido"];
$pedido = new Pedido();
$pedidos = $pedido ->consultar($idped);
if ($_GET["accion"] == "proceso"){
    foreach ($pedidos as $c){
        $proceso = new Proceso("","proceso de envio del pedido: " . $idped , date('Y-m-d'),date('H:i:s'),$c -> getId_prod(),"domiciliario",$_SESSION["id"]);
        $proceso -> crear();
    }
    $estado = "proceso";
    $pedido -> actualizarEstado($idped, $estado);
    echo "<script>window.location = 'index.php?pid=".base64_encode("presentacion/pedido/consultarPedido.php")."';</script>";
    $log = new Log($_SESSION["id"],"actualizar","proceso de envio del pedido" , date('Y-m-d'),date('H:i:s'),"domiciliario");
    $log -> crear();
}elseif ($_GET["accion"] == "confirmar"){
    foreach ($pedidos as $c){
        $proceso = new Proceso("","confirmar entrega del pedido: " . $idped , date('Y-m-d'),date('H:i:s'),$c -> getId_prod(),"domiciliario",$_SESSION["id"]);
        $proceso -> crear();
    }
    $estado = "confirmar";
    $pedido -> actualizarEstado($idped, $estado);        
    echo "<script>window.location = 'index.php?pid=".base64_encode("presentacion/pedido/consultarPedido.php")."';</script>";
    $log = new Log($_SESSION["id"],"actualizar","confirmar entrega del pedido" , date('Y-m-d'),date('H:i:s'),"domiciliario");
    $log -> crear();
}
}else {
    echo "Lo siento. Usted no tiene permisos";
}
?>

