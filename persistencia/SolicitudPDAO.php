<?php

class SolicitudPDAO{
    private $id;
    private $nombre;    
    private $correo;
    private $clave;    
    
    function SolicitudPDAO ($pId, $pNombre, $pCorreo, $pClave) {
        $this -> id = $pId;
        $this -> nombre = $pNombre;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;        
    }       
    
    function crear () {
        return "insert into Solicitudp (id, nombre, correo, clave)
                values ('" . $this -> id . "','" . $this -> nombre . "','" . $this -> correo . "','" .  md5 ($this -> clave) . "')";
    }    
           
    function consultar(){
        return "select nombre, correo, clave
                from Solicitudp where id = '" . $this -> id . "'";
    }
    
    function consultarTodos () {
        return "select id, nombre, correo, clave
                from Solicitudp";
    }

    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {
        if($orden == "" || $dir == ""){
            return "select id, nombre, correo, clave
                from Solicitudp
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select id, nombre, correo, clave
                from Solicitudp
                order by " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }
    
    function consultarTotalRegistros(){
        return "select count(id)
                from Solicitudp";
    }
    
    function eliminar($id){
        return "delete from solicitudp where id = '".$id."'";
    }   
  }
?>