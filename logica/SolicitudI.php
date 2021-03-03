<?php
require "persistencia/SolicitudIDAO.php";

class SolicitudI{
    private $id_ingrediente;
    private $nombre;
    private $cantidad;
    private $conexion;
    private $SolicitudIDAO;

    public function getIdIngrediente()
    {
        return $this->id_ingrediente;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    function SolicitudI ($pId_ingrediente="", $pNombre="", $pCantidad="") {
        $this -> id_ingrediente = $pId_ingrediente;
        $this -> nombre = $pNombre;
        $this -> cantidad = $pCantidad;
        $this -> conexion = new Conexion();
        $this -> SolicitudIDAO = new SolicitudIDAO($pId_ingrediente, $pNombre, $pCantidad);
    }

    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudIDAO -> crear());
        $this -> conexion -> cerrar();
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudIDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> cantidad = $resultado[1];
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudIDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $solicitudes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($solicitudes, new SolicitudI($resultado[0], $resultado[1], $resultado[2]));
        }
        return $solicitudes;
    }

    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudIDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $solicitudes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($solicitudes, new SolicitudI($resultado[0], $resultado[1], $resultado[2]));
        }
        return $solicitudes;
    }

    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudIDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function consultarTotalRegistrosE($idP){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudIDAO -> consultarTotalRegistrosE($idP));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }

    function eliminar($id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudIDAO -> eliminar($id));
        $this -> conexion -> cerrar();
    }
    
    function actualizar($id, $sum){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> SolicitudIDAO -> actualizar($id, $sum));
        $this -> conexion -> cerrar();
    }
}


?>