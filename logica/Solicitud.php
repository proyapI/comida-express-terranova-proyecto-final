<?php
require "persistencia/SolicitudDAO.php";

class Solicitud{
    private $id;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $localidad;
    private $direccion;
    private $telefono;
    private $correo;   
    private $conexion;
    private $solicitudDAO;

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getApellido()
    {
        return $this->apellido;
    }
    
    public function getCiudad()
    {
        return $this->ciudad;
    }
    
    public function getLocalidad()
    {
       return $this->localidad;
    }    
    
    public function getDireccion()
    {
        return $this->direccion;
    }
    
    public function getTelefono()
    {
        return $this->telefono;
    }
    
    public function getCorreo()
    {
        return $this->correo;
    }
        
    
    function Solicitud($pId="", $pNombre="", $pApellido="", $pCiudad="", $pLocalidad="",$pDireccion="", $pTelefono="",$pCorreo="") {
        $this -> id = $pId;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> localidad = $pLocalidad;
        $this -> direccion = $pDireccion;
        $this -> telefono = $pTelefono;
        $this -> correo = $pCorreo;
        $this -> conexion = new Conexion();
        $this -> solicitudDAO = new SolicitudDAO($pId, $pNombre, $pApellido, $pCiudad, $pLocalidad, $pDireccion, $pTelefono,$pCorreo);
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudDAO -> crear());
        $this -> conexion -> cerrar();
    }        
    
    function consultar(){        
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> solicitudDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> ciudad = $resultado[2];
        $this -> localidad = $resultado[3];
        $this -> direccion = $resultado[4];
        $this -> telefono = $resultado[5];
        $this -> correo = $resultado[6];  
    }
        
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $solicitudes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($solicitudes, new Solicitud($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], 
                $resultado[5],$resultado[6],$resultado[7]));
        }
        return $solicitudes;
    }
        
    function consultarPorPagina($cantidad, $pagina, $orden, $dir){        
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $solicitudes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($solicitudes, new Solicitud($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4],
                $resultado[5],$resultado[6],$resultado[7]));
        }
        return $solicitudes;
    }
    
    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function eliminar($id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudDAO -> eliminar($id));
        $this -> conexion -> cerrar();
    }  
}
?>