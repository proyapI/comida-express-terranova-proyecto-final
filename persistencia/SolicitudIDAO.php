<?php

class SolicitudIDAO{
    private $id_ingrediente;
    private $nombre;
    private $cantidad;

    function SolicitudIDAO ($pId_ingrediente, $pNombre, $pCantidad) {
        $this -> id_ingrediente = $pId_ingrediente;
        $this -> nombre = $pNombre;
        $this -> cantidad = $pCantidad;
    }

    function crear () {
        return "insert into SolicitudI (id_ingrediente, nombre, cantidad)
                values ('" . $this -> id_ingrediente . "','" . $this -> nombre . "','" . $this -> cantidad . "')";
    }

    function consultar(){
        return "select nombre, cantidad
                from SolicitudI where id_ingrediente = '" . $this -> id_ingrediente . "'";
    }
    
    function consultarI(){
        return "select id_ingrediente, nombre, cantidad
                from SolicitudI where id_ingrediente = '" . $this -> id_ingrediente . "'";
    }

    function consultarTodos () {
        return "select id_ingrediente, nombre, cantidad
                from SolicitudI";
    }

    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {
        if($orden == "" || $dir == ""){
            return "select id_ingrediente, nombre, cantidad
                from SolicitudI
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select id_ingrediente, nombre, cantidad
                from SolicitudI
                order by " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }

    function consultarTotalRegistros(){
        return "select count(id_ingrediente)
                from SolicitudI";
    }
    
    function consultarTotalRegistrosE($idP){
        return "select count(s.id_ingrediente) FROM ingrediente i, solicitudi s WHERE s.id_ingrediente = i.id_ingrediente and i.idProveedor = '".$idP."'";
    }

    function eliminar($id){
        return "delete from solicitudI where id_ingrediente = '".$id."'";
    }
    
    function actualizar($id, $sum){
        return "update solicitudI set cantidad = '".$sum."' where id_ingrediente = '".$id."'";
    }    
}
?>
