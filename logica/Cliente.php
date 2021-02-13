<?php
require "persistencia/ClienteDAO.php";

class Cliente{
    private $idCliente;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $localidad;
    private $direccion;
    private $telefono;
    private $imagen;
    private $correo;
    private $clave;    
    private $conexion;
    private $clienteDAO;
    
    public function getIdCliente()
    {
        return $this->idCliente;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getApellido()
    {
        return $this->apellido;
    }
    
    public function getCiudad()
    {
        return $this->ciudad;
    }
    
    public function getLocalidad()
    {
        return $this->localidad;
    }
    
    public function getDireccion()
    {
        return $this->direccion;
    }
        
    public function getTelefono()
    {
        return $this->telefono;
    }
    
    public function getImagen()
    {
        return $this->imagen;
    }
    
    public function getCorreo()
    {
        return $this->correo;
    }
    
    public function getClave()
    {
        return $this->clave;
    }
    
    function Cliente ($pIdCliente="", $pNombre="", $pApellido="", $pCiudad="", $pLocalidad="",$pDireccion="", $pTelefono="", $pImagen="", $pCorreo="", $pClave="") {
        $this -> idCliente = $pIdCliente;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> localidad = $pLocalidad;
        $this -> direccion = $pDireccion;
        $this -> telefono = $pTelefono;
        $this -> imagen = $pImagen;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;          
        $this -> conexion = new Conexion();
        $this -> clienteDAO = new ClienteDAO($pIdCliente, $pNombre, $pApellido, $pCiudad, $pLocalidad,$pDireccion, $pTelefono, $pImagen, $pCorreo, $pClave);
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> crear());
        $this -> conexion -> cerrar();
    }
    
    function autenticar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> autenticar());
        $this -> conexion -> cerrar();
        if($this -> conexion -> numFilas() == 1){
            $this -> idCliente = $this -> conexion -> extraer()[0];
            return true;
        }else{
            return false;
        }
    }
    
    function consultar_existe($id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultar_existe($id));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> ciudad = $resultado[2];
        $this -> localidad = $resultado[3];
        $this -> direccion = $resultado[4];
        $this -> telefono = $resultado[5];
        $this -> imagen = $resultado[6];
        $this -> correo = $resultado[7]; 
        $this -> clave = $resultado[8];
    }
    
    function consultarCorreo($correo){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultarCorreo($correo));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
        
    function consultarNombre($correo){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultarNombre($correo));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function consultarApellido($correo){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultarApellido($correo));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $clientes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($clientes, new Cliente($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], 
                $resultado[6],$resultado[7],$resultado[8],""));
        }
        return $clientes;
    }
    
    function editar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> editar());
        $this -> conexion -> cerrar();
    }
    
    function editarClave($clave,$correo){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> editarClave($clave,$correo));
        $this -> conexion -> cerrar();
    }
    
    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $clientes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($clientes, new Cliente($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4],
                $resultado[5], $resultado[6], $resultado[7],$resultado[8],""));
        }
        return $clientes;
    }
    
    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> buscar($filtro));
        $this -> conexion -> cerrar();
        $clientes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($clientes, new Cliente($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4],
                $resultado[5], $resultado[6], $resultado[7],$resultado[8],""));
        }
        return $clientes;
    }
    
    function editarFoto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> editarFoto());
        $this -> conexion -> cerrar();
    }     
}
?>