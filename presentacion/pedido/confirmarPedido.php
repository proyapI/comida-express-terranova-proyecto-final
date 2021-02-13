<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "domiciliario"){
$idped = $_GET["id_pedido"];
$pedido = new Pedido();
echo $_GET["accion"];
if ($_GET["accion"] == "proceso"){
    $estado = "proceso";
    $pedido -> actualizarEstado($idped, $estado);
    echo "<script>window.location = 'index.php?pid=".base64_encode("presentacion/pedido/consultarPedido.php")."';</script>";
    $log = new Log($_SESSION["id"],"actualizar","proceso de envio del pedido" , date('Y-m-d'),date('H:i:s'),"domiciliario");
    $log -> crear();
}elseif ($_GET["accion"] == "confirmar"){
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

