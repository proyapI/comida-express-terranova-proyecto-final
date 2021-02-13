<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "administrador"){
    $creado = false;        
    $solicitud = new Solicitud($_GET["idD"]);
    $solicitud -> consultar();
    if(isset($_POST["crear"])){        
        $domiciliario = new Domiciliario($_POST["id"], $_POST["nombre"], $_POST["apellido"],$_POST["ciudad"],$_POST["localidad"],$_POST["direccion"], $_POST["telefono"], '...' , $_POST["correo"],$_POST["clave"], $_POST["estado"]);
        $domiciliario -> crear();
        $creado = true;
        date_default_timezone_set('America/Bogota');
        $log = new Log($_SESSION["id"],"crear","crear domiciliario: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
        $log -> crear();        
    }    
?>
<div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6"> 
    			<div class="card">
    				<div class="card-header">
    					<h3>Registrar domiciliario</h3>
    				</div>
    				<div class="card-body">
    					<?php if ($creado) { ?>						
    						<div class="alert alert-success alert-dismissible fade show"
    							role="alert">
    							<?php     							 
    							echo "<script>alert('Datos ingresados');window.location = 'index.php?pid=".base64_encode("presentacion/domiciliario/enviarCorreo.php") . "&correoP=" . $_GET["correoP"] . "&nombre=" . $_POST["nombre"] . "&apellido=" . $_POST["apellido"] .  "&correo=" . $_POST["correo"] . "&clave=" . $_POST["clave"] ."';</script>";
    							$solicitud -> eliminar($_POST["id"]);
    							?>
    						</div>
    					<?php } ?>    					
    					<form
    						action=<?php echo "index.php?pid=" . base64_encode("presentacion/domiciliario/crearDomiciliario.php") . "&idD=" . $solicitud -> getId() . "&correoP=" . $solicitud -> getCorreo()?>
    						method="post">    						
    						<div class="form-group">
    							<input type="hidden" name="id" class="form-control"
    								placeholder="ID" value="<?php echo $solicitud -> getId() ?>">
    						</div>
    						<div class="form-group">
    							<input type="text" name="id" class="form-control"
    								placeholder="ID" value="<?php echo $solicitud -> getId() ?>" disabled>
    						</div>
    						<div class="form-group">
    							<input type="hidden" name="nombre" class="form-control"
    								placeholder="Nombre" value="<?php echo $solicitud -> getNombre() ?>">
    						</div>
    						<div class="form-group">
    							<input type="text" name="nombre" class="form-control"
    								placeholder="Nombre" value="<?php echo $solicitud -> getNombre() ?>" disabled>
    						</div>
    						<div class="form-group">
    							<input type="hidden" name="apellido" class="form-control"
    								placeholder="Apellido" value="<?php echo $solicitud -> getApellido() ?>">
    						</div>
    						<div class="form-group">
    							<input type="text" name="apellido" class="form-control"
    								placeholder="Apellido" value="<?php echo $solicitud -> getApellido() ?>" disabled>
    						</div>
    						<div class="form-group">
    							<input type="hidden" name="ciudad" class="form-control"
    								placeholder="Ciudad" value="<?php echo $solicitud -> getCiudad() ?>">
    						</div>
    						<div class="form-group">
    							<input type="text" name="ciudad" class="form-control"
    								placeholder="Ciudad" value="<?php echo $solicitud -> getCiudad() ?>" disabled>
    						</div>
    						<div class="form-group">
    							<input type="hidden" name="localidad" class="form-control"
    								placeholder="Ciudad" value="<?php echo $solicitud -> getLocalidad() ?>">
    						</div>
    						<div class="form-group">
    							<input type="text" name="localidad" class="form-control"
    								placeholder="Ciudad" value="<?php echo $solicitud -> getLocalidad() ?>" disabled>
    						</div>
    						<div class="form-group">
    							<input type="hidden" name="direccion" class="form-control"
    								placeholder="Direccion" value="<?php echo $solicitud -> getDireccion() ?>">
    						</div>
    						<div class="form-group">
    							<input type="text" name="direccion" class="form-control"
    								placeholder="Direccion" value="<?php echo $solicitud -> getDireccion() ?>" disabled>
    						</div>
    						<div class="form-group">
    							<input type="hidden" name="telefono" class="form-control"
    								placeholder="Telefono" value="<?php echo $solicitud -> getTelefono() ?>" >
    						</div>
    						<div class="form-group">
    							<input type="text" name="telefono" class="form-control"
    								placeholder="Telefono" value="<?php echo $solicitud -> getTelefono() ?>" disabled>
    						</div>
    						<div class="form-group">
    							<input type="hidden" name="correoP" class="form-control"
    								placeholder="CorreoP" value="<?php echo $solicitud -> getCorreo() ?>">
    						</div>
    						<div class="form-group">
    							<input type="text" name="correoP" class="form-control"
    									placeholder="CorreoP" value="<?php echo $solicitud -> getCorreo() ?>" disabled>
    						</div>
    						<div class="form-group">
    							<input type="text" name="correo" class="form-control"
    								placeholder="Correo" required="required">
    						</div>
    						<div class="form-group">
    							<input type="password" name="clave" class="form-control"
    								placeholder="Clave" required="required">    						
    						</div>
    						<div class="form-group">
    							<input type="text" name="estado" class="form-control"
    								placeholder="Estado" required="required">    						
    						</div>			
    						<div class="form-group">
    							<button  type="submit" name="crear" class="btn btn-primary btn-block"> Registrar </button>   							
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
