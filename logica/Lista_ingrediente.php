<?php
require "persistencia/Lista_ingredienteDAO.php";

class Lista_ingrediente{
    private $id_prod;
    private $id_ingrediente;
    private $cantidad;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $cantidad_und;
    private $valor;  
    private $conexion;
    private $lista_ingredienteDAO;

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

    function Lista_ingrediente($pid_prod = "", $pid_ingrediente = "", $pcantidad = "", $pnombre="", $pdescripcion="", $pimagen="", $pcantidad_und="", $pvalor=""){
        $this -> id_prod = $pid_prod;
        $this -> id_ingrediente = $pid_ingrediente;
        $this -> cantidad = $pcantidad;
        $this -> nombre = $pnombre;
        $this -> descripcion = $pdescripcion;
        $this -> imagen = $pimagen;
        $this -> cantidad_und = $pcantidad_und;
        $this -> valor = $pvalor;
        $this -> conexion = new Conexion();
        $this -> lista_ingredienteDAO = new Lista_ingredienteDAO($pid_prod, $pid_ingrediente, $pcantidad, $pnombre, $pdescripcion, $pimagen, $pcantidad_und, $pvalor);
    }

    function agregar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> lista_ingredienteDAO -> agregar());
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> lista_ingredienteDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $productoI = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($productoI, new Lista_ingrediente($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6], $resultado[7]));
        }
        return $productoI;
    }

    function consultar($idprod){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> lista_ingredienteDAO -> consultar($idprod));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> id_prod = $resultado[0];
        $this -> id_ingrediente = $resultado[1];
        $this -> cantidad = $resultado[2];
        $this -> nombre = $resultado[3];
        $this -> descripcion = $resultado[4];
        $this -> imagen = $resultado[5];
        $this -> cantidad_und = $resultado[6];
        $this -> valor = $resultado[7]; 
    }

    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> lista_ingredienteDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $productoI = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($productoI, new Lista_ingrediente($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6], $resultado[7]));
        }
        return $productoI;
    }

    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> lista_ingredienteDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }

    function consultarTotalRegistrosA($idIngrediente,$prod){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> lista_ingredienteDAO -> consultarTotalRegistrosA($idIngrediente,$prod));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function eliminar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> lista_ingredienteDAO -> eliminar());
        $this -> conexion -> cerrar();
    }

    function eliminarE($id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> lista_ingredienteDAO -> eliminarE($id));
        $this -> conexion -> cerrar();
    }

    function eliminarPI($idProd, $idIngrediente)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->lista_ingredienteDAO->eliminarPI($idProd, $idIngrediente));
        $this->conexion->cerrar();
    }
    
    function consultarID($idIngrediente,$prod){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> lista_ingredienteDAO -> consultarID($idIngrediente,$prod));
        $this -> conexion -> cerrar();
        $resultado = $this->conexion->extraer();
        return $resultado[0];
    }
    
    function actualizarU($suma,$idIngrediente,$prod){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> lista_ingredienteDAO -> actualizarU($suma,$idIngrediente,$prod));
        $this -> conexion -> cerrar();        
    }
    
    function actualizar($id,$idP,$canti){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> lista_ingredienteDAO -> actualizar($id, $idP, $canti));
        $this -> conexion -> cerrar();
    }
}
?>
