<?php
class LogDAO{
    private $idLog;
    private $accion;
    private $datos;
    private $fecha;
    private $hora;
    private $actor;
    
    function LogDAO ($pIdLog, $pAccion, $pDatos, $pFecha, $pHora, $pActor) {
        $this -> idLog = $pIdLog;
        $this -> accion = $pAccion;
        $this -> datos = $pDatos;
        $this -> fecha = $pFecha;
        $this -> hora = $pHora;
        $this -> actor = $pActor;
    }
    
    function agregar(){
        return "insert into log (idLog, accion, datos,  fecha, hora, actor)
                values ('".$this -> idLog ."','".$this -> accion . "', '".$this -> datos . "','" . $this -> fecha . "','" . $this -> hora ."', '".$this -> actor ."')";
    }
    
    function consultar(){
        return "select accion, datos, fecha, hora, actor
                from Log where idLog = '" . $this -> idLog . "'";
    }
    
    function consultarLog($consultar){
        return "select idLog, accion, datos, fecha, hora
                from log where actor = '" . $consultar . "'";
    }       
    
    function consultarTodos () {
        return "select idLog, accion, datos, fecha, hora, actor from log";
    }
    
    function consultarPorPagina ($cantidad, $pagina, $orden, $dir,$rol,$id) {
        if ($rol == "administrador"){
            if($orden == "" || $dir == ""){
                return "select idLog, accion, datos, fecha, hora, actor
                        from log
                        limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }else{
                return "select idLog, accion, datos, fecha, hora, actor
                        from log
                        order by " . $orden . " " . $dir . "
                        limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }     
        }elseif ($rol == "cliente"){
            if($orden == "" || $dir == ""){
                return "select * from log where idLog = '" . $id . "' and actor= '" . "cliente" . "'
                        limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }else{
                return "select * from log where where idLog = '" . $id . "' and actor= '" . "cliente" . "'
                        order by " . $orden . " " . $dir . "
                        limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }     
        }elseif ($rol == "domiciliario"){
            if($orden == "" || $dir == ""){
                return "select * from log where idLog = '" . $id . "' and actor= '" . "domiciliario" . "'
                        limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }else{
                return "select * from log where idLog = '" . $id . "' and actor= '" . "domiciliario" . "'
                        order by " . $orden . " " . $dir . "
                        limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }
        }
    }    
    
    function consultarTotalRegistros($rol,$id){
        if ($rol == "administrador"){
            return "select count(idLog) from log";
        }elseif ($rol == "cliente"){
            return "select count(idLog) from log WHERE idLog = '" . $id . "' and actor= '" . "cliente" . "'";
        }elseif ($rol == "domiciliario"){
            return "select count(idLog) from log WHERE idLog = '" . $id . "' and actor= '" . "domiciliario" . "'";
        }
    }      
}
?>