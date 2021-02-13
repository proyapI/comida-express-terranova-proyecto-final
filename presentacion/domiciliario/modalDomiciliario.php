<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if($_SESSION["rol"] == "cliente"){
    $domiciliario = new Domiciliario($_GET["idDomiciliario"]);
    $domiciliario -> consultar();
    ?>
    <div class="modal-header">
    	<h5 class="modal-title" id="exampleModalLabel"> <b> <?php echo "Domiciliario: " ?> </b> <?php echo $domiciliario -> getNombre() . " " . $domiciliario -> getApellido() ?></h5>
    	<button type="button" class="close" data-dismiss="modal"
    		aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	</button>
    </div>
    <div class="modal-body"> 
    	<img src="<?php echo $domiciliario -> getImagen() ?>" width="20%"> <br><b> <?php echo "Ciudad: " ?> </b> <?php echo $domiciliario -> getCiudad() ?> 
    	<br><b> <?php echo "Localidad: " ?> </b> <?php echo $domiciliario -> getLocalidad() ?>
    	<br> <b> <?php echo "Telefono: " ?> </b> <?php echo $domiciliario -> getTelefono() ?> <br><b> <?php echo "Correo: " ?> </b> <?php echo $domiciliario -> getCorreo()?>
    </div>
<?php 
    $log = new Log($_SESSION["id"],"ver","ver informacion del domiciliario" , date('Y-m-d'),date('H:i:s'),"cliente");
    $log -> crear();
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>