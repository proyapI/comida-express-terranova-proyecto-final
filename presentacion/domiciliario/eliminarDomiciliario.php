<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if($_SESSION["rol"] == "administrador"){
    $domiciliario = new Domiciliario($_GET["idDomiciliario"]);
    $domiciliario -> eliminar();
    $log = new Log($_SESSION["id"],"eliminar","eliminar domiciliario" , date('Y-m-d'),date('H:i:s'),"administrador");
    $log -> crear();
    echo "<script>alert('Domiciliario Eliminado');window.location = 'index.php?pid=".base64_encode("presentacion/domiciliario/consultarDomiciliario.php")."';</script>";
}else{
    echo "Lo siento. Usted no tiene permisos";
}

?>
