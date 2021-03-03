<?php

class Lista_ingredienteDAO{
    private $id_prod;
    private $id_ingrediente;
    private $cantidad;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $cantidad_und;
    private $valor;

    function Lista_ingredienteDAO($pid_prod, $pid_ingrediente, $pcantidad, $pnombre, $pdescripcion, $pimagen, $pcantidad_und, $pvalor){
        $this -> id_prod = $pid_prod;
        $this -> id_ingrediente = $pid_ingrediente;
        $this -> cantidad = $pcantidad;
        $this -> nombre = $pnombre;
        $this -> descripcion = $pdescripcion;
        $this -> imagen = $pimagen;
        $this -> cantidad_und = $pcantidad_und;
        $this -> valor = $pvalor;
    }

    function agregar(){
        return "insert into lista_ingrediente (id_prod, id_ingrediente, cantidad, nombre, descripcion, imagen, cantidad_und, valor) 
                values ('".$this -> id_prod."','".$this -> id_ingrediente."','".$this -> cantidad."','".$this -> nombre . "', '".$this -> descripcion . "','" . $this -> imagen . "','" . $this -> cantidad_und ."', '".$this -> valor ."')";
    }

    function consultarTodos(){
        return "select id_prod, id_ingrediente, cantidad, nombre, descripcion, imagen, cantidad_und, valor from lista_ingrediente";
    }

    function consultar($idprod){
        return "select id_prod, id_ingrediente, cantidad, nombre, descripcion, imagen, cantidad_und, valor from lista_ingrediente where id_prod='" . $idprod . "'";
    }

    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        if($orden == "" || $dir == ""){
            return "select id_prod, id_ingrediente, cantidad, nombre, descripcion, imagen, cantidad_und, valor
                from lista_ingrediente
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select id_prod, id_ingrediente, cantidad, nombre, descripcion, imagen, cantidad_und, valor
                from lista_ingrediente
                order by " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }

    function consultarTotalRegistros(){
        return "select count(id_prod)
                from lista_ingrediente";
    }
    
    function consultarTotalRegistrosA($idIngrediente,$prod){
        return "select count(id_ingrediente)
                from lista_ingrediente where id_ingrediente='" . $idIngrediente  . "' and id_prod='" . $prod . "'";
    }

    function eliminar(){
        return "delete from lista_ingrediente";
    }

    function eliminarE($id){
        return "delete from lista_ingrediente where id_ingrediente = '".$id."'";
    }

    function eliminarPI($idProd, $idIngrediente){
        return "delete from lista_ingrediente where id_prod = ' " . $idProd . " '  AND id_ingrediente = ' " . $idIngrediente . " ' ";
    }
    
    function consultarID($idIngrediente,$prod){
        return "select cantidad from lista_ingrediente where id_ingrediente='" . $idIngrediente  . "' and id_prod='" . $prod . "'";
    }
    
    function actualizarU($suma,$idIngrediente,$prod){
        return "update lista_ingrediente set cantidad='" . $suma . "' where id_ingrediente='" . $idIngrediente  . "' and id_prod='" . $prod . "'";
    }
    
    function actualizar($id,$idP,$canti){
        return "update lista_ingrediente set id_ingrediente='" . $id . "', cantidad='" . $canti . "' where id_prod='" . $idP . "'";
    }
}
?>