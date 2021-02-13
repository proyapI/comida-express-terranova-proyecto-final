<?php
require "persistencia/cambioClaveDAO.php";

class cambioClave{
    
    private $correo;
    private $cambioClaveDAO;
    
    public function getCorreo()
    {
        return $this->correo;
    }
    
    function cambioClave ($pCorreo="") {
        $this -> correo = $pCorreo;
        $this -> conexion = new Conexion();
        $this -> cambioClaveDAO = new cambioClaveDAO ($pCorreo);
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> cambioClaveDAO -> crear());
        $this -> conexion -> cerrar();
    }
    
    function eliminar($correo){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> cambioClaveDAO -> eliminar($correo));
        $this -> conexion -> cerrar();
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> cambioClaveDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> correo = $resultado[0];
        return $resultado[0];
    }
}
?>