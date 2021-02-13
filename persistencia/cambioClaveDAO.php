<?php

class cambioClaveDAO{
    
    private $correo;
    
    function cambioClaveDAO ($pCorreo) {
        $this -> correo = $pCorreo;
    }
    
    function crear () {
        return "insert into cambio_clave (correo)
                values ('" . $this -> correo . "')";
    }
    
    function eliminar ($correo) {
        return "delete from cliente producto where correo= '".$correo."'";
    }
    
    function consultar(){
        return "select correo from cambio_clave";
    }
    
}
?>