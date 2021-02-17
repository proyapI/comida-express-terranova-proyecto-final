<?php
class ProcesoDAO{
    private $id;
    private $datos;
    private $fecha;
    private $hora;
    private $idProducto;
    private $actor;
    private $idActor;
    
    function ProcesoDAO ($pidP, $pdatos, $pfecha, $phora, $pidProducto ,$pactor,$pidActor) {
        $this->id = $pidP;
        $this->datos = $pdatos;
        $this->fecha = $pfecha;
        $this->hora = $phora;
        $this->idProducto = $pidProducto;
        $this->actor = $pactor;
        $this->idActor = $pidActor;
    }
    
    function agregar(){
        return "insert into proceso (id, datos,  fecha, hora,idProducto ,actor, idActor)
                values ('".$this -> id ."','".$this -> datos . "', '".$this -> fecha . "','" . $this -> hora . "','" . $this -> idProducto ."', '".$this -> actor ."', '".$this -> idActor ."')";
    }
    
    function consultar(){
        return "select datos, fecha, hora, idProducto, actor, idActor
                from proceso where id = '" . $this -> id . "'";
    }      
    
    function consultarDatos($id){
        return "select id, datos, fecha, hora, idProducto, actor, idActor 
                from proceso where actor= '" . "domiciliario" . "' and idActor = '" . $id . "'";
    }
    
    function consultarActor(){
        return "select actor
                from proceso where actor= '" . "domiciliario " . "'" ;
    }    
    
    function consultarTodos () {
        return "select id, datos, fecha, hora, idProducto, actor, idActor from proceso";
    }
    
    function consultarPorPagina ($cantidad, $pagina, $orden, $dir,$rol,$id,$cid) {
        if ($rol=="administrador"){
            if($orden == "" || $dir == ""){
                    return "select id, datos, fecha, hora, idProducto, actor, idActor
                            from proceso 
                            limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
                }else{
                    return "select id, datos, fecha, hora, idProducto, actor, idActor
                            from proceso
                            order by " . $orden . " " . $dir . "
                            limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
                }             
        }elseif ($rol=="cliente"){            
            if($orden == "" || $dir == ""){                
                return "select id, datos, fecha, hora, idProducto, actor, idActor
                        from proceso where idActor = '" . $id . "' and actor= '" . "cliente" . "'
                        or idActor = '" . $cid . "' and actor= '" . "domiciliario" . "'
                        limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;                
            }else{
                return "select id, datos, fecha, hora, idProducto, actor, idActor
                        from proceso where idActor = '" . $id . "' and actor= '" . "cliente" . "'
                        and actor= '" . "domiciliario" . "' order by " . $orden . " " . $dir . "
                        limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }     
        }elseif ($rol=="domiciliario"){
            if($orden == "" || $dir == ""){
                return "select id, datos, fecha, hora, idProducto, actor, idActor
                            from proceso where idActor = '" . $id . "' and actor= '" . "domiciliario" . "'
                            or idActor = '" . $cid . "' and actor= '" . "cliente" . "' limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }else{
                return "select id, datos, fecha, hora, idProducto, actor, idActor
                            from proceso where idActor = '" . $id . "' and actor= '" . "domiciliario" . "'
                            or actor= '" . "cliente" . "' order by " . $orden . " " . $dir . "
                            limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
            }     
        }
    }
    
    function consultarTotalRegistros($rol,$id,$cid){
        if ($rol == "administrador"){
            return "select count(id) from proceso";
        }elseif ($rol == "cliente"){
            return "select count(id) from proceso WHERE idActor = '" . $id . "' and actor= '" . "cliente" . "' 
            or idActor = '" . $cid . "' and actor= '" . "domiciliario" . "'";
        }elseif ($rol == "domiciliario"){
            return "select count(id) from proceso WHERE idActor = '" . $id . "' and actor= '" . "domiciliario" . "'
            or idActor = '" . $cid . "' and actor= '" . "cliente" . "'";
        }
    }      
}
?>