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
require "logica/SolicitudI.php";
require "logica/Ingrediente.php";
require "logica/Inventario.php";
require "logica/Producto_ingrediente.php";
require "logica/Lista_ingrediente.php";
require "persistencia/Conexion.php";


$pagSinSesion = array(
    "presentacion/registrarCliente.php",
    "presentacion/recuperarClave.php",
    "presentacion/autenticar.php",
    "presentacion/Solicitar.php",
    "presentacion/consultarCatalogo.php",
    "presentacion/enviarCorreo.php",
    "presentacion/cambioContraseña.php",
    "presentacion/SolicitarP.php"
);

if (isset($_GET["sesion"]) && $_GET["sesion"] == 0) {
    $_SESSION["id"] = null;
}
$pid = null;
if (isset($_GET["pid"])) {
    $pid = base64_decode($_GET["pid"]);
}

?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
<link href="https://bootswatch.com/4/minty/bootstrap.css"
	rel="stylesheet" />	
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script
	src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<title>Comida express Terranova</title>
<link rel="icon" type="image/jpg" href="img/logo.jpg">
<script type="text/javascript">
$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>
</head>
<body>

<?php 

if (isset($pid)) {
    if (isset($_SESSION["id"])) {
        if($_SESSION["rol"] == "administrador"){
            include "presentacion/menuAdministrador.php";
        }elseif ($_SESSION["rol"] == "cliente") {
            include "presentacion/menuCliente.php";
        }elseif ($_SESSION["rol"] == "domiciliario") {
            include "presentacion/menuDomiciliario.php";
        }elseif ($_SESSION["rol"] == "proveedor") {
            include "presentacion/menuProveedor.php";
        }
        include $pid;
    } else if (in_array($pid, $pagSinSesion)) {
        include $pid;
    } else {
        header("Location: index.php");
    }
} else {
    include "presentacion/inicio.php";
}

?>

</body>
</html>