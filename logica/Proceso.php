<?php
require "persistencia/ProcesoDAO.php";

class Proceso{
    private $id;
    private $datos;
    private $fecha;
    private $hora;
    private $idProducto;
    private $actor;
    private $idActor;
    private $conexion;
    private $ProcesoDAO;

    public function getId()
    {
        return $this->id;
    }
    
    public function getDatos()
    {
        return $this->datos;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function getActor()
    {
        return $this->actor;
    }

    public function getIdActor()
    {
        return $this->idActor;
    }

    function Proceso($pidP="", $pdatos="", $pfecha="", $phora="", $pidProducto="", $pactor="", $pidActor=""){
        $this->id = $pidP;        
        $this->datos = $pdatos;
        $this->fecha = $pfecha;
        $this->hora = $phora;
        $this->idProducto = $pidProducto;
        $this->actor = $pactor;
        $this->idActor = $pidActor;
        $this->conexion = new Conexion();
        $this->ProcesoDAO = new ProcesoDAO($pidP, $pdatos, $pfecha, $phora, $pidProducto ,$pactor,$pidActor);
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProcesoDAO -> agregar());
        $this -> conexion -> cerrar();
    }
    
    function consultar(){        
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProcesoDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> datos = $resultado[0];
        $this -> fecha = $resultado[1];
        $this -> hora = $resultado[2];
        $this -> idProducto = $resultado[3];
        $this -> actor = $resultado[4];
        $this -> idActor = $resultado[5];
    }      

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProcesoDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $Proceso = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($Proceso, new Proceso($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5],$resultado[6]));
        }
        return $Proceso;
    }
    
    function consultarPorPagina($cantidad, $pagina, $orden, $dir, $rol,$id){        
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ProcesoDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir,$rol,$id));
        $this -> conexion -> cerrar();
        $Procesos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($Procesos, new Proceso($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5],$resultado[6]));
        }
        return $Procesos;
    }
    
    function consultarTotalRegistros($rol,$id){
        $this -> conexion -> abrir();                          
        $this -> conexion -> ejecutar($this -> ProcesoDAO -> consultarTotalRegistros($rol,$id));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();        
        return $resultado[0];
    }
      
}    
?>
