<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script type="text/javascript">
$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>
<?php 
require "logica/Administrador.php";
require "logica/Cliente.php";
require "logica/Cliente_producto.php";
require "logica/Domiciliario.php";
require "logica/Pedido.php";
require "logica/Producto.php";
require "logica/Proveedor.php";
require "logica/Log.php";
require "logica/Inventario.php";
require "logica/Ingrediente.php";
require "logica/Producto_ingrediente.php";
require "logica/Lista_ingrediente.php";
require "persistencia/Conexion.php";

$pid = base64_decode($_GET["pid"]);
include $pid;
?>