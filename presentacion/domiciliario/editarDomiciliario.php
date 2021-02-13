<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "administrador" || $_SESSION["rol"] == "domiciliario"){
    if($_SESSION["rol"] == "administrador"){
        $editado = false;
        if(isset($_POST["editar"])){
            $salir = 0;
            $domiciliario = new Domiciliario($_GET["idDomiciliario"]);
            $domiciliario -> consultar();
            if ($_POST["correo"] == $domiciliario -> getCorreo()){
                echo $_POST["correo"];
                $salir = 3;
                if ($domiciliario-> getImagen()== '' || $domiciliario ->getImagen() == '...'){
                    $domiciliario = new Domiciliario($_GET["idDomiciliario"], $domiciliario->getNombre(), $domiciliario->getApellido(),$domiciliario->getCiudad(),$domiciliario->getLocalidad(),$domiciliario->getDireccion(), $domiciliario->getTelefono(),'...' ,$_POST["correo"], $domiciliario->getClave(),$domiciliario->getEstado());
                    $domiciliario -> editar();
                    $editado = true;        
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idDomiciliario"],"editar","editar domiciliario: " . $domiciliario->getNombre() , date('Y-m-d'),date('H:i:s'),"administrador");
                    $log -> crear();
                }
                else{
                    $domiciliario = new Domiciliario($_GET["idDomiciliario"], $domiciliario->getNombre(), $domiciliario->getApellido(),$domiciliario->getCiudad(),$domiciliario->getLocalidad(),$domiciliario->getDireccion(), $domiciliario->getTelefono(),$domiciliario->getImagen() ,$_POST["correo"], $domiciliario->getClave(),$domiciliario->getEstado());
                    $domiciliario -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idDomiciliario"],"editar","editar domiciliario: " . $domiciliario->getNombre() , date('Y-m-d'),date('H:i:s'),"administrador");
                    $log -> crear();
                }
            }else{
                $salir = 2;
                if ($domiciliario-> getImagen()== '' || $domiciliario ->getImagen() == '...'){
                    $domiciliario = new Domiciliario($_GET["idDomiciliario"], $domiciliario->getNombre(), $domiciliario->getApellido(),$domiciliario->getCiudad(),$domiciliario->getLocalidad(),$domiciliario->getDireccion(), $domiciliario->getTelefono(),'...' ,$_POST["correo"], $domiciliario->getClave(),$domiciliario->getEstado());
                    $domiciliario -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idDomiciliario"],"editar","editar domiciliario: " . $domiciliario->getNombre() , date('Y-m-d'),date('H:i:s'),"administrador");
                    $log -> crear();
                }
                else{                    
                    $domiciliario = new Domiciliario($_GET["idDomiciliario"], $domiciliario->getNombre(), $domiciliario->getApellido(),$domiciliario->getCiudad(),$domiciliario->getLocalidad(),$domiciliario->getDireccion(), $domiciliario->getTelefono(),$domiciliario->getImagen() ,$_POST["correo"], $domiciliario->getClave(),$domiciliario->getEstado());
                    $domiciliario -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idDomiciliario"],"editar","editar domiciliario: " . $domiciliario->getNombre() , date('Y-m-d'),date('H:i:s'),"administrador");
                    $log -> crear();
                }
            }
        }else{
            $domiciliario = new Domiciliario($_GET["idDomiciliario"]);
            $domiciliario -> consultar();
        }
    }
    elseif ($_SESSION["rol"] == "domiciliario"){
        $editado = false;  
        if(isset($_POST["editar"])){
            $salir = 0;
            $domiciliario = new Domiciliario($_GET["idDomiciliario"]);
            $domiciliario -> consultar();
            if($_POST["clave"] == $domiciliario -> getClave()){
                $salir = 0;
                if ($domiciliario ->getImagen() == '' || $domiciliario ->getImagen() == '...'){
                    $domiciliario = new Domiciliario($_GET["idDomiciliario"], $_POST["nombre"], $_POST["apellido"],$_POST["ciudad"],$_POST["localidad"],$_POST["direccion"], $_POST["telefono"], '...', $domiciliario->getCorreo(), $_POST["clave"]);
                    $domiciliario -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idDomiciliario"],"editar","editar domiciliario: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"domiciliario");
                    $log -> crear();
                }else{
                    $domiciliario = new Domiciliario($_GET["idDomiciliario"], $_POST["nombre"], $_POST["apellido"],$_POST["ciudad"],$_POST["localidad"],$_POST["direccion"], $_POST["telefono"], $domiciliario->getImagen(), $domiciliario->getCorreo(), $_POST["clave"]);
                    $domiciliario -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idDomiciliario"],"editar","editar domiciliario: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"domiciliario");
                    $log -> crear();
                }
            }
            else{
                $salir = 1;
                if ($domiciliario ->getImagen() == '' || $domiciliario ->getImagen() == '...'){
                    $domiciliario = new Domiciliario($_GET["idDomiciliario"], $_POST["nombre"], $_POST["apellido"],$_POST["ciudad"],$_POST["localidad"],$_POST["direccion"], $_POST["telefono"], '...', $domiciliario->getCorreo(), md5($_POST["clave"]));
                    $domiciliario -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idDomiciliario"],"editar","editar domiciliario: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"domiciliario");
                    $log -> crear();
                }else{
                    $domiciliario = new Domiciliario($_GET["idDomiciliario"], $_POST["nombre"], $_POST["apellido"],$_POST["ciudad"],$_POST["localidad"],$_POST["direccion"], $_POST["telefono"], $domiciliario->getImagen(), $domiciliario->getCorreo(), md5($_POST["clave"]));
                    $domiciliario -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idDomiciliario"],"editar","editar domiciliario: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"domiciliario");
                    $log -> crear();
                }
            }
        }else{
            $domiciliario = new Domiciliario($_GET["idDomiciliario"]);
            $domiciliario -> consultar();
        }
    }
    ?>
    <div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6">
    			<div class="card">
    				<div class="card-header">
    					<h3>Editar Domiciliario</h3>
    				</div>
    				<div class="card-body">
    					<?php if ($editado && $salir==1) { ?>    											
                				<div class="alert alert-success alert-dismissible fade show"
                					role="alert">
                					<?php 
                    					echo "Datos editados";
                						session_destroy();
                				        echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";                						
                				    ?>
            					</div>
    					<?php }elseif($editado && $salir==0){ ?>
    							<div class="alert alert-success alert-dismissible fade show"
                					role="alert">
                					<?php 
                    					echo "Datos editados";
                				        echo "<script>setTimeout(\"location.href = 'index.php?pid=" . base64_encode("presentacion/sesionDomiciliario.php") . "';\",1500);</script>";                						
                				    ?>
            					</div>
    					<?php }elseif($editado && $salir==2){ ?>
    							<div class="alert alert-success alert-dismissible fade show"
                					role="alert">
                					<?php 
                    					echo "Datos editados";
                				        echo "<script>setTimeout(\"location.href = 'index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "';\",1500);</script>";                						
                				    ?>
            					</div>
    					<?php }if ($editado && $salir==3) { ?>    											
                				<div class="alert alert-success alert-dismissible fade show"
                					role="alert">
                					<?php 
                    					echo "Datos editados";
                    					echo "<script>setTimeout(\"location.href = 'index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "';\",1500);</script>";
                				    ?>
            					</div>
    					<?php }?>
    					<form
    						action="<?php echo "index.php?pid=" . base64_encode("presentacion/domiciliario/editarDomiciliario.php") . "&idDomiciliario=" . $_GET["idDomiciliario"] ?>"
    						method="post">
    						<?php if($_SESSION["rol"] == "domiciliario") { ?>
        						<div class="form-group">
        							<input type="text" name="nombre" class="form-control"
        								placeholder="Nombre" value="<?php echo $domiciliario -> getNombre() ?>" required="required">
        						</div>
        						<div class="form-group">
        							<input type="text" name="apellido" class="form-control"
        								placeholder="Apellido" value="<?php echo $domiciliario -> getApellido() ?>" required="required">
        						</div>
        						<div class="form-group">
        							<input type="text" name="ciudad" class="form-control"
        								placeholder="Ciudad" value="<?php echo $domiciliario -> getCiudad() ?>" required="required">
        						</div>
        						<div class="form-group">
        							<input type="text" name="localidad" class="form-control"
        								placeholder="Ciudad" value="<?php echo $domiciliario -> getLocalidad() ?>" required="required">
        						</div>
        						<div class="form-group">
        							<input type="text" name="direccion" class="form-control"
        								placeholder="Direccion" value="<?php echo $domiciliario -> getDireccion() ?>" required="required">
        						</div>
        						<div class="form-group">
        							<input type="text" name="telefono" class="form-control"
        								placeholder="Telefono" value="<?php echo $domiciliario -> getTelefono() ?>" required="required">
        						</div>
        						<div class="form-group">
    								<input type="hidden" name="imagen" class="form-control"
    								value="<?php echo $domiciliario -> getImagen() ?>">
    							</div>
        						<div class="form-group">
        							<input type="password" name="clave" value="<?php echo $domiciliario -> getClave() ?>" class="form-control"
        								placeholder="Clave" required="required">    						
        						</div>
    						<?php } elseif ($_SESSION["rol"] == "administrador") { ?>
    							<div class="form-group">
        							<input type="text" name="correo" class="form-control"
        								placeholder="Correo" value="<?php echo $domiciliario -> getCorreo() ?>" required="required">
        						</div>						
    						<?php } ?>
    						<div class="form-group">
    							<button type="submit" name="editar" class="btn btn-primary">Editar</button>
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
<?php 
} else {
    echo "Lo siento. Usted no tiene permisos";    
}
?>        