<?php

class SolicitudDAO{
    private $id;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $localidad;
    private $direccion;
    private $telefono; 
    private $correo;
    
    function SolicitudDAO ($pId, $pNombre, $pApellido, $pCiudad, $pLocalidad, $pDireccion, $pTelefono, $pCorreo) {
        $this -> id = $pId;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> localidad = $pLocalidad;
        $this -> direccion = $pDireccion;
        $this -> telefono = $pTelefono;
        $this -> correo = $pCorreo;
    }       
    
    function crear () {
        return "insert into Solicitud (id, nombre, apellido, ciudad, localidad, direccion, telefono, correo)
                values ('" . $this -> id . "','" . $this -> nombre . "', '" . $this -> apellido . "','" . $this -> ciudad . "',
                '" . $this -> localidad . "','" . $this -> direccion . "','" . $this -> telefono . "','" . $this -> correo . "')";
    }    
           
    function consultar(){
        return "select nombre, apellido, ciudad, localidad, direccion, telefono, correo
                from Solicitud where id = '" . $this -> id . "'";
    }
    
    function consultarTodos () {
        return "select id, nombre, apellido, ciudad, localidad, direccion, telefono, correo
                from Solicitud";
    }

    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {
        if($orden == "" || $dir == ""){
            return "select id, nombre, apellido, ciudad, localidad, direccion, telefono, correo
                from Solicitud
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select id, nombre, apellido, ciudad, localidad, direccion, telefono, correo
                from Solicitud
                order by " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }
    
    function consultarTotalRegistros(){
        return "select count(id)
                from Solicitud";
    }
    
    function eliminar($id){
        return "delete from solicitud where id = '".$id."'";
    }   
  }
?>