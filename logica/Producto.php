<?php
require "persistencia/ProductoDAO.php";

class Producto{
    
    private $id_prod;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $cantidad_und;
    private $valor;
    private $conexion;
    private $productoDAO;

    public function getId_prod()
    {
        return $this->id_prod;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getCantidad_und()
    {
        return $this->cantidad_und;
    }

    public function getValor()
    {
        return $this->valor;
    }

    
    function Producto($pid_prod="", $pnombre="", $pdescripcion="", $pimagen="", $pcantidad_und="", $pvalor=""){
        $this -> id_prod = $pid_prod;
        $this -> nombre = $pnombre;
        $this -> descripcion = $pdescripcion;
        $this -> imagen = $pimagen;
        $this -> cantidad_und = $pcantidad_und;
        $this -> valor = $pvalor;
        $this -> conexion = new Conexion();
        $this -> productoDAO = new ProductoDAO($pid_prod, $pnombre, $pdescripcion, $pimagen, $pcantidad_und, $pvalor);
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> agregar());
        $this -> conexion -> cerrar();
    }
    
    function consultar(){             
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();        
        $this -> nombre = $resultado[0];
        $this -> descripcion = $resultado[1];
        $this -> imagen = $resultado[2];
        $this -> cantidad_und = $resultado[3];
        $this -> valor = $resultado[4];        
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $productos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($productos, new Producto($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }
        return $productos;
    }
    
    function editar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> editar());
        $this -> conexion -> cerrar();
    }
    
    function editarUnidades($id_prod,$restante){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> editarUnidades($id_prod,$restante));
        $this -> conexion -> cerrar();
    }
    
    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $productos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($productos, new Producto($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }
        return $productos;
    }
    
    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> buscar($filtro));
        $this -> conexion -> cerrar();
        $productos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($productos, new Producto($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }
        return $productos;
    }
    
    function editarFoto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> editarFoto());
        $this -> conexion -> cerrar();
    }
    
    function eliminar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> eliminar());
        $this -> conexion -> cerrar();
    }
}
?>