<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if($_SESSION["rol"] == "administrador"){
    $producto = new Producto($_GET["id_prod"]);
    $producto -> eliminar();    
    echo "<script>alert('Producto Eliminado');window.location = 'index.php?pid=".base64_encode("presentacion/producto/consultarProducto.php")."';</script>";
    $log = new Log($_SESSION["id"],"eliminar","eliminar producto: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
    $log -> crear();
}else{
    echo "Lo siento. Usted no tiene permisos";
}
?>
