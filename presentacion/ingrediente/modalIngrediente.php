<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if ($_SESSION["rol"] == "administrador"){       
    ?>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingredientes</h5>
        <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th width="30%">#Ingrediente</th>
                <th width="30%">Nombre</th>
                <th width="20%">Cantidad</th>
                <th>Servicios</th>
            </tr>
            </thead>            
            <tbody id="tabla-ingredientes">
            	<?php include "listaIngredientes.php"; ?>
            </tbody>
        </table>
    </div>
    <?php $log = new Log ($_SESSION["id"],"ver","ver informacion lista ingredientes" , date('Y-m-d'),date('H:i:s'),"administrador");
    $log -> crear();?>

    <?php
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>


