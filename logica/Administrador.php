<?php
require "persistencia/AdministradorDAO.php";

class Administrador{
    private $idAdministrador;
    private $nombre;
    private $apellido;
    private $imagen;
    private $correo;
    private $clave;
    private $conexion;
    private $administradorDAO;
    
    public function getIdAdministrador()
    {
        return $this->idAdministrador;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getApellido()
    {
        return $this->apellido;
    }
    
    public function getImagen()
    {
        return $this->imagen;
    }
    
    public function getCorreo()
    {
        return $this->correo;
    }
    
    public function getClave()
    {
        return $this->clave;
    }
    
    function Administrador ($pIdAdministrador="", $pNombre="", $pApellido="", $pImagen="", $pCorreo="", $pClave="") {
        $this -> idAdministrador = $pIdAdministrador;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> imagen = $pImagen;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;
        $this -> conexion = new Conexion();
        $this -> administradorDAO = new AdministradorDAO ($pIdAdministrador, $pNombre, $pApellido, $pImagen, $pCorreo, $pClave);
    }
    
    function autenticar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> autenticar());
        $this -> conexion -> cerrar();
        if($this -> conexion -> numFilas() == 1){
            $this -> idAdministrador = $this -> conexion -> extraer()[0];
            return true;
        }else{
            return false;
        }
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> imagen = $resultado[2];
        $this -> correo = $resultado[3];
        $this -> clave = $resultado[4];
    }
    
    function editar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> editar());
        $this -> conexion -> cerrar();
    }
    
    function editarFoto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> editarFoto());
        $this -> conexion -> cerrar();
    }
}
?>