<?php
require "persistencia/Producto_ingredienteDAO.php";

class Producto_ingrediente{
    private $id_prod;
    private $id_ingrediente;
    private $cantidad;
    private $conexion;
    private $producto_ingredienteDAO;

    public function getIdProd()
    {
        return $this->id_prod;
    }

    public function getIdIngrediente()
    {
        return $this->id_ingrediente;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    function Producto_ingrediente($pid_prod = "", $pid_ingrediente = "", $pcantidad = ""){
        $this -> id_prod = $pid_prod;
        $this -> id_ingrediente = $pid_ingrediente;
        $this -> cantidad = $pcantidad;
        $this -> conexion = new Conexion();
        $this -> producto_ingredienteDAO = new Producto_ingredienteDAO($pid_prod, $pid_ingrediente, $pcantidad);
    }

    function agregar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> producto_ingredienteDAO -> agregar());
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> producto_ingredienteDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $productoI = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($productoI, new Producto_ingrediente($resultado[0], $resultado[1], $resultado[2]));
        }
        return $productoI;
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> producto_ingredienteDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> cantidad = $resultado[0];
    }

    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> producto_ingredienteDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $productoI = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($productoI, new Producto_ingrediente($resultado[0], $resultado[1], $resultado[2]));
        }
        return $productoI;
    }

    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> producto_ingredienteDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }

    function consultarTotalRegistrosA($idIngrediente,$prod){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> producto_ingredienteDAO -> consultarTotalRegistrosA($idIngrediente,$prod));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function eliminar($id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> producto_ingredienteDAO -> eliminar($id));
        $this -> conexion -> cerrar();
    }

    function eliminarE($id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> producto_ingredienteDAO -> eliminarE($id));
        $this -> conexion -> cerrar();
    }

    function eliminarPI($idProd, $idIngrediente)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->producto_ingredienteDAO->eliminarPI($idProd, $idIngrediente));
        $this->conexion->cerrar();
    }
    
    function consultarID($idIngrediente,$prod){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> producto_ingredienteDAO -> consultarID($idIngrediente,$prod));
        $this -> conexion -> cerrar();
        $resultado = $this->conexion->extraer();
        return $resultado[0];
    }
    
    function actualizarU($suma,$idIngrediente,$prod){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> producto_ingredienteDAO -> actualizarU($suma,$idIngrediente,$prod));
        $this -> conexion -> cerrar();        
    }
}
?>
