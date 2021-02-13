<?php
class AdministradorDAO{
    private $idAdministrador;
    private $nombre;
    private $apellido;
    private $imagen;
    private $correo;
    private $clave;
    
    function AdministradorDAO ($pIdAdministrador, $pNombre, $pApellido, $pImagen, $pCorreo, $pClave) {
        $this -> idAdministrador = $pIdAdministrador;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> imagen = $pImagen;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;
    }
    
    function autenticar () {        
        return "select idAdministrador 
                from Administrador 
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')"; 
    }
    
    function consultar () {
        return "select nombre, apellido, imagen, correo, clave
                from administrador
                where idAdministrador = '" . $this -> idAdministrador . "'";
    }
    
    function editarFoto() {
        return "update Administrador set imagen = '" . $this -> imagen . "'
                where idAdministrador = '" . $this -> idAdministrador . "'";
    }
    
    function editar(){
        return "update administrador
                set nombre = '".$this -> nombre . "', apellido ='" . $this -> apellido . "', imagen ='" .
                $this -> imagen . "',correo = '".$this -> correo . "', clave = '" . $this -> clave . "'
                where idAdministrador = '" . $this -> idAdministrador . "'";
    }
}
?>