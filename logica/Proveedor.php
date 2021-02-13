<?php
require "persistencia/ProveedorDAO.php";

class Proveedor{
    private $id;
    private $nombre;
    private $imagen;
    private $correo;
    private $clave;        
    private $conexion;
    private $ProveedorDAO;

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
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
        
    
    function Proveedor($pId="", $pNombre="",$pImagen="",$pCorreo="", $pClave="") {
        $this -> id = $pId;
        $this -> nombre = $pNombre;
        $this -> imagen = $pImagen;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;
        $this -> conexion = new Conexion();
        $this -> ProveedorDAO = new ProveedorDAO($pId, $pNombre,$pImagen ,$pCorreo, $pClave);
    }
    
    function consultar_existe($id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProveedorDAO -> consultar_existe($id));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProveedorDAO -> crear());
        $this -> conexion -> cerrar();
    }     
    
    function autenticar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProveedorDAO -> autenticar());
        $this -> conexion -> cerrar();
        if($this -> conexion -> numFilas() == 1){
            $this -> id = $this -> conexion -> extraer()[0];
            return true;
        }else{
            return false;
        }
    }
    
    function editar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProveedorDAO -> editar());
        $this -> conexion -> cerrar();
    }
    
    function editarClave($clave,$correo){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProveedorDAO -> editarClave($clave,$correo));
        $this -> conexion -> cerrar();
    }
    
    function consultar(){        
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> ProveedorDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> imagen = $resultado[1];
        $this -> correo = $resultado[2];
        $this -> clave = $resultado[3];              
    }
        
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProveedorDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $solicitudes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($solicitudes, new Proveedor($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4],""));
        }
        return $solicitudes;
    }
        
    function consultarPorPagina($cantidad, $pagina, $orden, $dir){        
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProveedorDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $solicitudes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($solicitudes, new Proveedor($resultado[0], $resultado[1], $resultado[2], $resultado[3],$resultado[4],""));
        }
        return $solicitudes;
    }
    
    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProveedorDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function eliminar($id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProveedorDAO -> eliminar($id));
        $this -> conexion -> cerrar();
    }
    
    function editarFoto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProveedorDAO -> editarFoto());
        $this -> conexion -> cerrar();
    }     
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProveedorDAO -> buscar($filtro));
        $this -> conexion -> cerrar();
        $proveedores = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($proveedores, new Proveedor($resultado[0], $resultado[1], $resultado[2], $resultado[3],$resultado[4],""));
        }
        return $proveedores;
    }
}
?>