<?php

class ProveedorDAO{
    private $id;
    private $nombre;
    private $imagen;  
    private $correo;
    private $clave;    
    
    function ProveedorDAO ($pId, $pNombre, $pImagen,$pCorreo, $pClave) {
        $this -> id = $pId;
        $this -> nombre = $pNombre;
        $this -> imagen = $pImagen;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;        
    }       
    
    function consultar_existe($id){
        return "select id
                from proveedor where id = '" . $id . "'";
    }
    
    function crear () {
        return "insert into proveedor (id, nombre, imagen, correo, clave)
                values ('" . $this -> id . "','" . $this -> nombre . "','" . $this -> imagen . "','" . $this -> correo . "',
                '" . $this -> clave . "')";
    }    
    
    function autenticar () {
        return "select id from proveedor
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
           
    function consultar(){
        return "select nombre, imagen ,correo, clave
                from proveedor where id = '" . $this -> id . "'";
    }
    
    function consultarTodos () {
        return "select id, nombre, imagen, correo, clave
                from proveedor";
    }

    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {
        if($orden == "" || $dir == ""){
            return "select id, nombre, imagen, correo, clave
                from proveedor
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select id, nombre, imagen, correo, clave
                from proveedor
                order by " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }
    
    function consultarTotalRegistros(){
        return "select count(id)
                from proveedor";
    }
    
    function editar(){
        return "update proveedor
                set nombre = '".$this -> nombre . "', imagen ='" . $this -> imagen . "', correo ='" .
                $this -> correo . "',clave ='" . $this -> clave . "'
                where id = '" . $this -> id . "'";
    }
    
    function editarFoto() {
        return "update proveedor set imagen = '" . $this -> imagen . "'
                where id = '" . $this -> id . "'";
    }  
    
    function editarClave($clave,$correo){
        return "update proveedor
                set clave = '" . md5 ($clave) . "'
                where correo = '" . $correo . "'";
    }
    
    function eliminar($id){
        return "delete from proveedor where id = '".$id."'";
    }
    
    function buscar($filtro){
        return "select id, nombre, imagen, correo, clave
                from proveedor
                where nombre like '" . $filtro . "%'";
    }
  }
?>