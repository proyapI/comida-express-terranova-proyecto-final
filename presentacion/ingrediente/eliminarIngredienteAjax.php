<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
session_start();
if($_SESSION["rol"] == "administrador") {
    $pi = new Producto_ingrediente();
    $pi->eliminarPI($_GET["id_prod"], $_GET["id_ingrediente"]);
}
