<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "administrador"){
    $creado = false;        
    $solicitud = new SolicitudP($_GET["idP"]);
    $solicitud -> consultar();
    if(isset($_POST["crear"])){        
        $proveedor = new Proveedor($_POST["id"], $_POST["nombre"], '...',$_POST["correo"],$_POST["clave"]);
        $proveedor -> crear();
        $creado = true;
        date_default_timezone_set('America/Bogota');
        $log = new Log($_SESSION["id"],"crear","crear proveedor: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
        $log -> crear();        
    }    
?>
<div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6"> 
    			<div class="card">
    				<div class="card-header">
    					<h3>Registrar proveedor</h3>
    				</div>
    				<div class="card-body">
    					<?php if ($creado) { ?>						
    						<div class="alert alert-success alert-dismissible fade show"
    							role="alert">
    							<?php     							 
    							echo "<script>alert('Datos ingresados');window.location = 'index.php?pid=".base64_encode("presentacion/proveedor/enviarCorreo.php") . "&nombre=" . $_POST["nombre"] . "&correo=" . $_GET["correo"] ."';</script>";
    							$solicitud -> eliminar($_POST["id"]);
    							?>
    						</div>
    					<?php } ?>    					
    					<form
    						action=<?php echo "index.php?pid=" . base64_encode("presentacion/proveedor/crearProveedor.php") . "&idP=" . $solicitud -> getId() . "&correo=" . $solicitud -> getCorreo()?>
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
    							<input type="hidden" name="correo" class="form-control"
    								placeholder="Correo" value="<?php echo $solicitud -> getCorreo() ?>">
    						</div>
    						<div class="form-group">
    							<input type="text" name="correo" class="form-control"
    									placeholder="Correo" value="<?php echo $solicitud -> getCorreo() ?>" disabled>
    						</div>    				
    						<div class="form-group">
    							<input type="hidden" name="clave" class="form-control"
    								placeholder="Clave" value="<?php echo $solicitud -> getClave() ?>">
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
