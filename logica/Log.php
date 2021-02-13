<?php
require "persistencia/LogDAO.php";

class Log{
    private $idLog;
    private $accion;
    private $datos;
    private $fecha;
    private $hora;
    private $actor;
    private $conexion;
    private $logDAO;

    public function getIdLog()
    {
        return $this->idLog;
    }

    public function getAccion()
    {
        return $this->accion;
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

    public function getActor()
    {
        return $this->actor;
    }

    function Log($pidLog="", $paccion="", $pdatos="", $pfecha="", $phora="", $pactor=""){
        $this->idLog = $pidLog;
        $this->accion = $paccion;
        $this->datos = $pdatos;
        $this->fecha = $pfecha;
        $this->hora = $phora;
        $this->actor = $pactor;
        $this->conexion = new Conexion();
        $this->logDAO = new LogDAO($pidLog, $paccion, $pdatos, $pfecha, $phora, $pactor);
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> logDAO -> agregar());
        $this -> conexion -> cerrar();
    }
    
    function consultar(){        
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> logDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> accion = $resultado[0];
        $this -> datos = $resultado[1];
        $this -> fecha = $resultado[2];
        $this -> hora = $resultado[3];
        $this -> actor = $resultado[4];
    }      
    
    function consultarLog($consultar){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> logDAO -> consultarLog($consultar));
        $this -> conexion -> cerrar();
        $logs = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($logs, new Log($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4],
                $resultado[5]));
        }
        return $logs;
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> logDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $log = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($log, new Log($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }
        return $log;
    }
    
    function consultarPorPagina($cantidad, $pagina, $orden, $dir, $rol,$id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> logDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir,$rol,$id));
        $this -> conexion -> cerrar();
        $logs = array();
        if ($rol == "administrador"){
            while(($resultado = $this -> conexion -> extraer()) != null){
                array_push($logs, new Log($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
            }
        }elseif ($rol == "cliente"){
            if ($this -> actor = "cliente"){                
                while(($resultado = $this -> conexion -> extraer()) != null){
                    array_push($logs, new Log($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
                }      
            }
        }elseif ($rol == "domiciliario"){
            if ($this -> actor = "domiciliario"){
                while(($resultado = $this -> conexion -> extraer()) != null){
                    array_push($logs, new Log($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
                }
            }
        }
        return $logs;
    }
    
    function consultarTotalRegistros($rol,$id){
        $this -> conexion -> abrir();      
        if ($rol == "administrador"){            
            $this -> conexion -> ejecutar($this -> logDAO -> consultarTotalRegistros($rol,$id));
        } elseif ($rol == "cliente"){
            $this -> conexion -> ejecutar($this -> logDAO -> consultarTotalRegistros($rol,$id));
        } elseif ($rol == "domiciliario"){
            $this -> conexion -> ejecutar($this -> logDAO -> consultarTotalRegistros($rol,$id));
        }
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();        
        return $resultado[0];
    }
      
}    
?>
