<?php
require "persistencia/IngredienteDAO.php";

class Ingrediente{
    private $id_ingrediente;
    private $nombre;
    private $cantidad_und;
    private $idProveedor;
    private $conexion;
    private $ingredienteDAO;        

    public function getIdIngrediente()
    {
        return $this->id_ingrediente;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCantidadUnd()
    {
        return $this->cantidad_und;
    }
    
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    function Ingrediente ($pid_ingrediente = "", $pnombre = "", $pcantidad_und = "",$pIdProveedor=""){
        $this -> id_ingrediente = $pid_ingrediente;
        $this -> nombre = $pnombre;
        $this -> cantidad_und = $pcantidad_und;
        $this->idProveedor = $pIdProveedor;
        $this -> conexion = new Conexion();
        $this -> ingredienteDAO = new IngredienteDAO($pid_ingrediente, $pnombre, $pcantidad_und,$pIdProveedor);
    }

    function agregar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ingredienteDAO -> agregar());
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ingredienteDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $ingredientes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($ingredientes, new Ingrediente($resultado[0], $resultado[1], $resultado[2],$resultado[3]));
        }
        return $ingredientes;
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ingredienteDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> cantidad_und = $resultado[1];
    }

    function consultarPorPagina($cantidad, $pagina, $orden, $dir,$rol,$id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ingredienteDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir,$rol,$id));
        $this -> conexion -> cerrar();
        $ingredientes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($ingredientes, new Ingrediente($resultado[0], $resultado[1], $resultado[2],$resultado[3]));
        }
        return $ingredientes;
    }

    function consultarTotalRegistros($rol,$id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ingredienteDAO -> consultarTotalRegistros($rol,$id));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }

    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ingredienteDAO -> buscar($filtro));
        $this -> conexion -> cerrar();
        $ingredientes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($ingredientes, new Ingrediente($resultado[0], $resultado[1], $resultado[2],$resultado[3]));
        }
        return $ingredientes;
    }

    function eliminar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ingredienteDAO -> eliminar());
        $this -> conexion -> cerrar();
    }

    function editarUnidades($idI, $cant){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ingredienteDAO -> editarUnidades($idI, $cant));
        $this -> conexion -> cerrar();
    }

    function consultarE($idProd){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ingredienteDAO -> consultarE($idProd));
        $this -> conexion -> cerrar();
        $ingredientes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($ingredientes, new Ingrediente($resultado[0], $resultado[1], $resultado[2],""));
        }
        return $ingredientes;
    }
}
?>