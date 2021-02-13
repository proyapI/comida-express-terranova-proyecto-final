<?php
require "persistencia/SolicitudPDAO.php";

class SolicitudP{
    private $id;
    private $nombre;
    private $correo;
    private $clave;
    private $telefono;    
    private $conexion;
    private $solicitudpDAO;

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
            
    public function getCorreo()
    {
        return $this->correo;
    }
    
    public function getClave()
    {
        return $this->clave;
    }
        
    
    function SolicitudP($pId="", $pNombre="",$pCorreo="", $pClave="") {
        $this -> id = $pId;
        $this -> nombre = $pNombre;        
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;
        $this -> conexion = new Conexion();
        $this -> solicitudpDAO = new SolicitudPDAO ($pId, $pNombre, $pCorreo, $pClave);
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudpDAO -> crear());
        $this -> conexion -> cerrar();
    }        
    
    function consultar(){        
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> solicitudpDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> correo = $resultado[1];
        $this -> clave = $resultado[2];              
    }
        
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudpDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $solicitudes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($solicitudes, new SolicitudP($resultado[0], $resultado[1], $resultado[2], $resultado[3]));
        }
        return $solicitudes;
    }
        
    function consultarPorPagina($cantidad, $pagina, $orden, $dir){        
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudpDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $solicitudes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($solicitudes, new SolicitudP($resultado[0], $resultado[1], $resultado[2], $resultado[3]));
        }
        return $solicitudes;
    }
    
    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudpDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function eliminar($id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudpDAO -> eliminar($id));
        $this -> conexion -> cerrar();
    }  
}
?>