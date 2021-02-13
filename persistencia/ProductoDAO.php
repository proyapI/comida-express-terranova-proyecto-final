<?php

class ProductoDAO {
    
    private $id_prod;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $cantidad_und;
    private $valor;
    
    function ProductoDAO($pid_prod, $pnombre, $pdescripcion, $pimagen, $pcantidad_und, $pvalor){
        $this -> id_prod = $pid_prod;
        $this -> nombre = $pnombre;
        $this -> descripcion = $pdescripcion;
        $this -> imagen = $pimagen;
        $this -> cantidad_und = $pcantidad_und;
        $this -> valor = $pvalor;
    }
    
    function agregar(){
        return "insert into Producto (id_prod, nombre, descripcion, imagen, cantidad_und, valor)
                values ('".$this -> id_prod ."','".$this -> nombre . "', '".$this -> descripcion . "','" . $this -> imagen . "','" . $this -> cantidad_und ."', '".$this -> valor ."')";
    }
    
    function consultar(){
        return "select nombre, descripcion, imagen, cantidad_und, valor
                from Producto where id_prod = '" . $this-> id_prod . "'";
    }
    
    function consultarTodos(){
        return "select id_prod, nombre, descripcion, imagen, cantidad_und, valor 
                from producto";
    }
    
    function editar(){
        return "update Producto
                set nombre = '".$this -> nombre . "', descripcion ='" . $this -> descripcion . "',
                cantidad_und = '".$this -> cantidad_und . "', valor = '" . $this -> valor . "'
                where id_prod = '" . $this -> id_prod . "'";
    }
    
    function editarUnidades($id_prod,$restante){
        return "update Producto
                set cantidad_und = '". $restante . "'
                where id_prod = '" . $id_prod . "'";
    }
    
    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {        
        if($orden == "" || $dir == ""){
            return "select id_prod, nombre, descripcion, imagen, cantidad_und, valor
                from producto
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{            
            return "select id_prod, nombre, descripcion, imagen, cantidad_und, valor
                from producto
                order by " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }
    
    function consultarTotalRegistros(){
        return "select count(id_prod)
                from producto";
    }
    
    function buscar($filtro){
        return "select id_prod, nombre, descripcion, imagen, cantidad_und, valor
                from producto
                where nombre like '" . $filtro . "%'";
    }
    
    function editarFoto() {
        return "update Producto set imagen = '" . $this -> imagen . "'
                where id_prod = '" . $this -> id_prod . "'";
    }
    
    function eliminar(){
        return "delete from producto where id_prod = '".$this -> id_prod."'";
    }   
}
?>