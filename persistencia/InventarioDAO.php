<?php

class InventarioDAO{
    private $id_ingrediente;
    private $nombre;
    private $cantidad_und;
    private $idProveedor;
    
    function InventarioDAO($pid_ingrediente, $pnombre, $pcantidad_und,$pIdProveedor){
        $this -> id_ingrediente = $pid_ingrediente;
        $this -> nombre = $pnombre;
        $this -> cantidad_und = $pcantidad_und;
        $this->idProveedor = $pIdProveedor;
    }

    function agregar(){
        return "insert into inventario (id_ingrediente, nombre, cantidad_und,idProveedor)
                values ('".$this -> id_ingrediente."','".$this -> nombre."','".$this -> cantidad_und."','" . $this->idProveedor . "')";
    }

    function consultarTodos(){
        return "select id_ingrediente, nombre, cantidad_und,idProveedor from inventario";
    }

    function consultar(){
        return "select nombre, cantidad_und from inventario where id_ingrediente = '".$this -> id_ingrediente."'";
    }

    function consultarPorPagina($cantidad, $pagina, $orden, $dir,$rol,$id){
        if ($rol == "administrador"){
            if($orden == "" || $dir == ""){
                return "select id_ingrediente, nombre, cantidad_und, idProveedor
                    from inventario
                    limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }else{
                return "select id_ingrediente, nombre, cantidad_und, idProveedor
                    from inventarioss
                    order by " . $orden . " " . $dir . "
                    limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }
        }else{
            if($orden == "" || $dir == ""){
                return "select id_ingrediente, nombre, cantidad_und,idProveedor
                    from inventario where idProveedor = '" . $id . "'
                    limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }else{
                return "select id_ingrediente, nombre, cantidad_und,idProveedor
                    from inventarios
                    order by " . $orden . " " . $dir . "
                    limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }
        }
    }

    function consultarTotalRegistros($rol,$id){
        if ($rol=="administrador"){
            return "select count(id_ingrediente)
                    from inventario";
        }else{
            return "select count(id_ingrediente)
                    from inventario where idProveedor = '" . $id . "'";
        }
    }

    function buscar($filtro){
        return "select id_ingrediente, nombre, cantidad_und,idProveedor
                from inventario
                where nombre like '" . $filtro . "%'";
    }

    function editarUnidades($idI,$cant){
        return "update inventario set cantidad_und = '".$cant."' where id_ingrediente = '".$idI."'";
    }

    function consultarE($idProd){
        return "select i.id_ingrediente, i.nombre, pi.cantidad from inventario as i, producto_inventario as pi where i.id_ingrediente = pi.id_ingrediente and pi.id_prod = $idProd";
    }
}

?>
