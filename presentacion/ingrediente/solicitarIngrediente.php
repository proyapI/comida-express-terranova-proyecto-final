<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "administrador"){
    $creado = false;
    $idIngrediente = $_GET["idIngrediente"];
    $sol = new SolicitudI();
    $registros = $sol -> consultarTotalRegistros();
    $ingrediente = new Ingrediente($idIngrediente);
    $ingrediente->consultar();
    $suma = 0;
    if(isset($_POST["solicitar"])){
        if ($_POST["cantidad"] > 0){
            if($registros == 0){
                $solicitar = new SolicitudI($idIngrediente, $ingrediente->getNombre(), $_POST["cantidad"]);
                $solicitar -> crear();
                $creado = true;
            }else{
                $com = new SolicitudI($idIngrediente, "", "");
                $res = $com -> consultarTodos();
                foreach ($res as $r){
                    if ($r -> getIdIngrediente() == $idIngrediente){
                        $suma = $r -> getCantidad() + $_POST["cantidad"];
                        $com -> actualizar($idIngrediente, $suma);
                        $creado = true;
                    }else{
                        $solicitar = new SolicitudI($idIngrediente, $ingrediente->getNombre(), $_POST["cantidad"]);
                        $solicitar -> crear();
                        $creado = true;
                    }
                }
            }
        }else{
            $creado = false;
            echo "<script>alert('Unidades ingresadas no validas');</script>";
        }
        
        date_default_timezone_set('America/Bogota');
        $log = new Log($_SESSION["id"],"crear","crear solicitud: " . $ingrediente->getNombre() , date('Y-m-d'),date('H:i:s'),"administrador");
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
                                echo "<script>alert('Solicitud enviada');window.location='index.php?pid=" . base64_encode("presentacion/sesionAdministrador.php") . "';</script>";
                                ?>
                            </div>
                            <?php } ?>
                        <form
                            action=<?php echo "index.php?pid=" . base64_encode("presentacion/ingrediente/solicitarIngrediente.php")  . "&idIngrediente=" . $_GET["idIngrediente"]?>
                            method="post">
                            <div class="form-group">
                                <input type="text" name="id" class="form-control"
                                       value="<?php echo $_GET["idIngrediente"]?>"  disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control"
                                       value="<?php echo $_GET["nombre"]?>"  disabled>
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