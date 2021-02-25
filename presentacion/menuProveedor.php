<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
$proveedor = new Proveedor($_SESSION["id"]);
$proveedor -> consultar();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionProveedor.php")?>"><i class="fas fa-home"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ingredientes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/ingrediente/crearIngrediente.php")?>">Crear</a>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/ingrediente/consultarIngrediente.php")?>">Consultar</a>
          <a class="dropdown-item" href="#">Consultar Solicitudes</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Buscar</a>
        </div>
      </li>
                  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Log
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/log/consultarLog.php") . "&click=" . "consultarLog" ?>">Consultar</a>
        </div>
      </li>

    </ul>
	<ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Proveedor: <?php echo $proveedor -> getNombre(); ?>
        </a>        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">        
          <a class="dropdown-item" href="index.php?pid= <?php echo base64_encode("presentacion/proveedor/editarProveedor.php")."&idProveedor=".$_SESSION["id"]?>">Editar Perfil</a>
          <a class="dropdown-item" href="index.php?pid= <?php echo base64_encode("presentacion/proveedor/editarFotoProveedor.php")."&idProveedor=".$_SESSION["id"]?>">Editar Foto</a>
          <a class="dropdown-item" href="index.php?sesion=0">Cerrar Sesión</a>
        </div>
      </li>            
    </ul>
	
  </div>
</nav>
