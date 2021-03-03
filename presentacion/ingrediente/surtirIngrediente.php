<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "proveedor"){
    $idIngrediente = $_GET["idIngrediente"];
    $cantidadUnd = $_GET["cantidad"];
    $ingrediente = new Ingrediente($idIngrediente, "", "", "");
    $solicitud = new SolicitudI();
    $ingrediente -> consultar();
    $inventario = new Inventario($idIngrediente,$ingrediente->getNombre(),$cantidadUnd,$ingrediente->getIdProveedor());
    $inventario ->agregar();
    $suma = 0;
    $suma = $ingrediente -> getCantidadUnd() - $cantidadUnd;
    $ingrediente -> editarUnidades($idIngrediente, $suma);
    $solicitud -> eliminar($idIngrediente);
    echo "<script>alert('Unidades enviadas y cargadas');window.location = 'index.php?pid=".base64_encode("presentacion/ingrediente/consultarIngrediente.php")."';</script>";
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>