<?php

class IngredienteDAO{
    private $id_ingrediente;
    private $nombre;
    private $cantidad_und;
    private $idProveedor;
    
    function IngredienteDAO($pid_ingrediente, $pnombre, $pcantidad_und,$pIdProveedor){
        $this -> id_ingrediente = $pid_ingrediente;
        $this -> nombre = $pnombre;
        $this -> cantidad_und = $pcantidad_und;
        $this->idProveedor = $pIdProveedor;
    }

    function agregar(){
        return "insert into ingrediente (id_ingrediente, nombre, cantidad_und,idProveedor)
                values ('".$this -> id_ingrediente."','".$this -> nombre."','".$this -> cantidad_und."','" . $this->idProveedor . "')";
    }

    function consultarTodos(){
        return "select id_ingrediente, nombre, cantidad_und,idProveedor from ingrediente";
    }

    function consultar(){
        return "select nombre, cantidad_und from ingrediente where id_ingrediente = '".$this -> id_ingrediente."'";
    }

    function consultarPorPagina($cantidad, $pagina, $orden, $dir,$rol,$id){
        if ($rol == "administrador"){
            if($orden == "" || $dir == ""){
                return "select id_ingrediente, nombre, cantidad_und, idProveedor
                    from ingrediente
                    limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }else{
                return "select id_ingrediente, nombre, cantidad_und, idProveedor
                    from ingredientess
                    order by " . $orden . " " . $dir . "
                    limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }
        }else{
            if($orden == "" || $dir == ""){
                return "select id_ingrediente, nombre, cantidad_und,idProveedor
                    from ingrediente where idProveedor = '" . $id . "'
                    limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }else{
                return "select id_ingrediente, nombre, cantidad_und,idProveedor
                    from ingredientes
                    order by " . $orden . " " . $dir . "
                    limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }
        }
    }

    function consultarTotalRegistros($rol,$id){
        if ($rol=="administrador"){
            return "select count(id_ingrediente)
                    from ingrediente";
        }else{
            return "select count(id_ingrediente)
                    from ingrediente where idProveedor = '" . $id . "'";
        }
    }

    function buscar($filtro){
        return "select id_ingrediente, nombre, cantidad_und,idProveedor
                from ingrediente
                where nombre like '" . $filtro . "%'";
    }

    function eliminar(){
        return "delete from ingrediente where id_ingrediente = '".$this -> id_ingrediente."'";
    }

    function editarUnidades($idI,$cant){
        return "update ingrediente set cantidad_und = '".$cant."' where id_ingrediente = '".$idI."'";
    }

    function consultarE($idProd){
        return "select i.id_ingrediente, i.nombre, pi.cantidad from ingrediente as i, producto_ingrediente as pi where i.id_ingrediente = pi.id_ingrediente and pi.id_prod = $idProd";
    }
}

?>
