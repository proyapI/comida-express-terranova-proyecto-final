<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
$administrador = new Administrador($_SESSION["id"]);
$administrador -> consultar();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionAdministrador.php")?>"><i class="fas fa-home"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Producto
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/crearProducto.php")?>">Crear</a>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/consultarProducto.php")?>">Consultar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/buscarProducto.php")?>">Buscar</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Domiciliario
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">          
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/domiciliario/consultarDomiciliario.php")?>">Consultar</a>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/consultarSolicitudes.php")?>">Consultar solicitudes</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/domiciliario/buscarDomiciliario.php")?>">Buscar</a>
        </div>
      </li>	
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Proveedor
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">          
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/proveedor/consultarProveedor.php")?>">Consultar</a>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/consultarSolicitudesP.php")?>">Consultar solicitudes</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/proveedor/buscarProveedor.php")?>">Buscar</a>
        </div>
      </li>	

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cliente
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/consultarCliente.php") ?>">Consultar</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pedido
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/pedido/consultarPedido.php")?>">Consultar</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Proceso
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/proceso/consultarProceso.php") . "&click=" . "consultarLog" ?>">Consultar</a>
        </div>
      </li>

      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ingrediente
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/ingrediente/consultarIngrediente.php")?>">Consultar</a>                
                <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/ingrediente/consultarInventario.php")?>">Consultar inventario</a>                
            </div>
      </li>
      
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Balance
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/pedido/consultarProductoVendido.php")?>">Consultar producto mas vendido</a>
                <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/producto/consultarProductoPrecio.php")?>">Consultar productos por precio</a>
            </div>
        </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Resumen
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/log/consultarLog.php") . "&click=" . "consultarLog" ?>">Consultar</a>
        </div>
      </li>

    </ul>
	<ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administrador: <?php echo $administrador -> getNombre() . " " . $administrador -> getApellido(); ?>
        </a>        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">        
          <a class="dropdown-item" href="index.php?pid= <?php echo base64_encode("presentacion/administrador/editarAdministrador.php")."&idAdministrador=".$_SESSION["id"]?>">Editar Perfil</a>
          <a class="dropdown-item" href="index.php?pid= <?php echo base64_encode("presentacion/administrador/editarFotoAdministrador.php")."&idAdministrador=".$_SESSION["id"]?>">Editar Foto</a>
          <a class="dropdown-item" href="index.php?sesion=0">Cerrar Sesión</a>
        </div>
      </li>            
    </ul>
	
  </div>
</nav>
