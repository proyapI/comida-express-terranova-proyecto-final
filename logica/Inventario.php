<?php
require "persistencia/InventarioDAO.php";

class Inventario{
    private $id_ingrediente;
    private $nombre;
    private $cantidad_und;
    private $idProveedor;
    private $conexion;
    private $inventarioDAO;        

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

    function Inventario($pid_ingrediente = "", $pnombre = "", $pcantidad_und = "",$pIdProveedor=""){
        $this -> id_ingrediente = $pid_ingrediente;
        $this -> nombre = $pnombre;
        $this -> cantidad_und = $pcantidad_und;
        $this->idProveedor = $pIdProveedor;
        $this -> conexion = new Conexion();
        $this -> inventarioDAO = new InventarioDAO($pid_ingrediente, $pnombre, $pcantidad_und,$pIdProveedor);
    }

    function agregar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> inventarioDAO -> agregar());
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> inventarioDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $inventarios = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($inventarios, new Inventario($resultado[0], $resultado[1], $resultado[2],$resultado[3]));
        }
        return $inventarios;
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> inventarioDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> cantidad_und = $resultado[1];
    }

    function consultarPorPagina($cantidad, $pagina, $orden, $dir,$rol,$id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> inventarioDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir,$rol,$id));
        $this -> conexion -> cerrar();
        $inventarios = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($inventarios, new Inventario($resultado[0], $resultado[1], $resultado[2],$resultado[3]));
        }
        return $inventarios;
    }

    function consultarTotalRegistros($rol,$id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> inventarioDAO -> consultarTotalRegistros($rol,$id));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }

    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> inventarioDAO -> buscar($filtro));
        $this -> conexion -> cerrar();
        $inventarios = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($inventarios, new Inventario($resultado[0], $resultado[1], $resultado[2],$resultado[3]));
        }
        return $inventarios;
    }

    function editarUnidades($idI, $cant){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> inventarioDAO -> editarUnidades($idI, $cant));
        $this -> conexion -> cerrar();
    }

    function consultarE($idProd){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> inventarioDAO -> consultarE($idProd));
        $this -> conexion -> cerrar();
        $inventarios = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($inventarios, new Inventario($resultado[0], $resultado[1], $resultado[2],$resultado[3]));
        }
        return $inventarios;
    }
}
?>