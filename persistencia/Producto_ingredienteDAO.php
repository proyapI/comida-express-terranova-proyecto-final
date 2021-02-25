<?php

class Producto_ingredienteDAO{
    private $id_prod;
    private $id_ingrediente;
    private $cantidad;

    function Producto_ingredienteDAO($pid_prod, $pid_ingrediente, $pcantidad){
        $this -> id_prod = $pid_prod;
        $this -> id_ingrediente = $pid_ingrediente;
        $this -> cantidad = $pcantidad;
    }

    function agregar(){
        return "insert into producto_ingrediente (id_prod, id_ingrediente, cantidad) 
                values ('".$this -> id_prod."','".$this -> id_ingrediente."','".$this -> cantidad."')";
    }

    function consultarTodos(){
        return "select id_prod, id_ingrediente, cantidad from producto_ingrediente";
    }

    function consultar(){
        return "select cantidad from producto_ingrediente where id_prod = '".$this -> id_prod."' and id_ingrediente = '".$this -> id_ingrediente."'";
    }

    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        if($orden == "" || $dir == ""){
            return "select id_prod, id_ingrediente, cantidad
                from producto_ingrediente
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select id_prod, id_ingrediente, cantidad
                from producto_ingrediente
                order by " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }

    function consultarTotalRegistros(){
        return "select count(id_ingrediente)
                from producto_ingrediente";
    }
    
    function consultarTotalRegistrosA($idIngrediente,$prod){
        return "select count(id_ingrediente)
                from producto_ingrediente where id_ingrediente='" . $idIngrediente  . "' and id_prod='" . $prod . "'";
    }

    function eliminar($id){
        return "delete from producto_ingrediente where id_prod = '".$id."'";
    }

    function eliminarE($id){
        return "delete from producto_ingrediente where id_ingrediente = '".$id."'";
    }

    function eliminarPI($idProd, $idIngrediente){
        return "delete from producto_ingrediente where id_prod = ' " . $idProd . " '  AND id_ingrediente = ' " . $idIngrediente . " ' ";
    }
    
    function consultarID($idIngrediente,$prod){
        return "select cantidad from producto_ingrediente where id_ingrediente='" . $idIngrediente  . "' and id_prod='" . $prod . "'";
    }
    
    function actualizarU($suma,$idIngrediente,$prod){
        return "update producto_ingrediente set cantidad='" . $suma . "' where id_ingrediente='" . $idIngrediente  . "' and id_prod='" . $prod . "'";
    }
}
?>