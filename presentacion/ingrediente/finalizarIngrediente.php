<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "administrador"){
    $idprod = $_GET["id_prod"];
    $ingrediente = new Ingrediente();
    $lista = new Lista_ingrediente();
    $consulta = $ingrediente -> consultarTodos();
    $consultar = $lista ->consultarTodos();
    $lista -> consultar($idprod);
    $b = 0;
    $resta = 0;
    foreach ($consultar as $ct){
        if($ct->getIdIngrediente() == ""){
            echo "<script>alert('No selecciono ningun ingrediente, por lo tanto no se puede crear el producto');window.location = 'index.php?pid=".base64_encode("presentacion/producto/crearProducto.php")."';</script>";
        }else {
            foreach ($consulta as $c) {
                    if ($c->getIdIngrediente() == $ct->getIdIngrediente()) {
                        $unidadesI = $c->getCantidadUnd();
                        $unidadesPI = $ct->getCantidad();
                        if ($c->getCantidadUnd() != 0 && $ct->getCantidad() <= $c->getCantidadUnd()) {
                            $resta = $unidadesI - $unidadesPI;
                            $c->editarUnidades($ct->getIdIngrediente(), $resta);
                        } else {
                            $b = 1;
                        }
                    }
            }
        }
    }

    if ($b == 1){
        echo "<script>alert('Ya no hay unidades disponibles');window.location = 'index.php?pid=".base64_encode("presentacion/producto/crearProducto.php")."';</script>";        
    }elseif($b == 0){
        $producto = new Producto($lista->getIdProd(),$lista->getNombre(),$lista->getDescripcion(),$lista->getImagen(),$lista->getCantidad_und(),$lista->getValor());
        $producto -> crear();
        foreach ($consultar as $ct){
            $pi = new Producto_ingrediente($ct->getIdProd(),$ct->getIdIngrediente(),$ct->getCantidad());
            $pi ->agregar();
        }
        $lista->eliminar();
        $log = new Log($_SESSION["id"],"crear","Finalizar creacion de producto" , date('Y-m-d'),date('H:i:s'),"administrador");
        $log -> crear();
        echo "<script>alert('Realizado con exito');window.location = 'index.php?pid=".base64_encode("presentacion/producto/consultarProducto.php") ."';</script>";
    }


} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>