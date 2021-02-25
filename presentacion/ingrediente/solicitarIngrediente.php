<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "administrador"){
    $creado = false;
    if(isset($_POST["solicitar"])){
        $solicitar = new SolicitudI($_POST["id"], $_POST["nombre"], $_POST["cantidad"]);
        $solicitar -> crear();
        $creado = true;
        date_default_timezone_set('America/Bogota');
        $log = new Log($_SESSION["id"],"crear","crear solicitud: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
        $log -> crear();
    }
    ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Solicitar ingrediente</h3>
                    </div>
                    <div class="card-body">

                            <?php if ($creado) { ?>
                            <div class="alert alert-success alert-dismissible fade show"
                             role="alert">
                            <?php

                                echo "Solicitud enviada";
                                echo "<script>setTimeout(\"location.href = 'index.php?pid=" . base64_encode("presentacion/sesionAdministrador.php") . "';\",1500);</script>";
                                ?>
                            </div>
                            <?php } ?>
                        <form
                            action=<?php echo "index.php?pid=" . base64_encode("presentacion/ingrediente/solicitarIngrediente.php") ?>
                            method="post">
                            <div class="form-group">
                                <input type="text" name="id" class="form-control"
                                       value="<?php echo $_GET["idIngrediente"]?>"  disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control"
                                       placeholder="<?php echo $_GET["nombre"]?>"  disabled>
                            </div>
                            <div class="form-group">
                                <input type="number" name="cantidad" class="form-control"
                                       placeholder="Cantidad" required="required">
                            </div>
                            <div class="form-group">
                                <button  type="submit" name="solicitar" class="btn btn-primary btn-block">Solicitar</button>
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