<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if ($_SESSION["rol"] == "domiciliario"){
    $cliente = new Cliente($_GET["idCliente"]);
    $cliente -> consultar();
?>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo "Cliente: " . $cliente -> getNombre() . " " . $cliente -> getApellido() ?></h5>
        <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <img src="<?php echo $cliente -> getImagen() ?>" width="30%">
        <br><strong>Ciudad: </strong><?php echo $cliente -> getCiudad() ?>
        <br><strong>Localidad: </strong><?php echo $cliente -> getLocalidad() ?>
        <br><strong>Direcci&oacute;n: </strong><?php echo $cliente -> getDireccion() ?>
        <br><strong>Tel&eacute;fono: </strong><?php echo $cliente -> getTelefono() ?>
    </div>
    <?php $log = new Log ($_SESSION["id"],"ver","ver informacion del cliente" , date('Y-m-d'),date('H:i:s'),"domiciliario");
    $log -> crear();?>
<?php
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>