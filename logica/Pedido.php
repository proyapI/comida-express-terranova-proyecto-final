<?php
require "persistencia/PedidoDAO.php";

class Pedido{
    private $id_pedido;
    private $id_cliente;
    private $id_prod;
    private $id_domiciliario;
    private $unidades;
    private $fecha_hora;
    private $valor_unidad;
    private $valor_total;
    private $observaciones;
    private $estado;
    private $conexion;
    private $pedidoDAO;
    
    public function getId_pedido()
    {
        return $this->id_pedido;
    }

    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function getId_prod()
    {
        return $this->id_prod;
    }

    public function getId_domiciliario()
    {
        return $this->id_domiciliario;
    }
    
    public function getUnidades()
    {
        return $this->unidades;
    }
        
    public function getFecha_hora()
    {
        return $this->fecha_hora;
    }
    
    public function getValor_unidad()
    {
        return $this->valor_unidad;
    }

    public function getValor_total()
    {
        return $this->valor_total;
    }

    public function getObservaciones()
    {
        return $this->observaciones;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    function Pedido($pid_pedido="", $pid_cliente="", $pid_prod="", $pid_domiciliario="",$punidades="", $pfecha_hora="", $pvalorU="",$pvalor_total="", $pobservaciones="", $pestado=""){
        $this -> id_pedido = $pid_pedido;
        $this -> id_cliente = $pid_cliente;
        $this -> id_prod = $pid_prod;
        $this -> id_domiciliario = $pid_domiciliario;
        $this -> unidades = $punidades;
        $this -> fecha_hora = $pfecha_hora;
        $this -> valor_unidad = $pvalorU;
        $this -> valor_total = $pvalor_total;
        $this -> observaciones = $pobservaciones;
        $this -> estado = $pestado;
        $this -> conexion = new Conexion();
        $this -> pedidoDAO = new PedidoDAO($pid_pedido, $pid_cliente, $pid_prod, $pid_domiciliario, $punidades, $pfecha_hora, $pvalorU, $pvalor_total, $pobservaciones, $pestado);
    }
    
    function crear($idPe,$idC,$idP,$idD,$unidades,$fechaH,$valorU,$valorT,$observa,$estado){        
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> agregar($idPe,$idC,$idP,$idD,$unidades,$fechaH,$valorU,$valorT,$observa,$estado));
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $pedidos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($pedidos, new Pedido($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6], $resultado[7],$resultado[8],$resultado[9]));
        }
        return $pedidos;
    }
    
    function consultar($idpedido,$idC, $prod,$domiciliario){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> consultar($idpedido,$idC, $prod,$domiciliario));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> id_pedido = $resultado[0];
        $this -> unidades = $resultado[1];
        $this -> fecha_hora = $resultado[2];
        $this -> valor_unidad = $resultado[3];
        $this -> valor_total = $resultado[4];
        $this -> observaciones = $resultado[5];
        $this -> estado = $resultado[6];        
    }    
    
    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $pedidos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($pedidos, new Pedido($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6], $resultado[7],$resultado[8],$resultado[9]));
        }
        return $pedidos;
    }
    
    function eliminar($idpedido,$idC, $prod,$domiciliario){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> eliminar($idpedido,$idC, $prod,$domiciliario));
        $this -> conexion -> cerrar();
    }
    
    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function consultarRegistros($id,$idC, $prod,$domiciliario){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> consultarRegistros($id,$idC, $prod,$domiciliario));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function actualizarEstado($idP, $estado){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> actualizarEstado($idP, $estado));
        $this -> conexion -> cerrar();
    }
}
?>