<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "administrador"){
    date_default_timezone_set('America/Bogota');
    if ($_SESSION["rol"] == "administrador"){
        $log = new Log($_SESSION["id"],"buscar","buscar ingrediente" , date('Y-m-d'),date('H:i:s'),"administrador");
        $log -> crear();
    }
    ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Seleccionar Ingrediente</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" id="filtro" class="form-control"
                                   placeholder="Filtro">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <a class="btn btn-primary" href='index.php?pid=<?php echo base64_encode("presentacion/ingrediente/finalizarIngrediente.php") . "&id_prod=" . $_GET["id_prod"]?>'>Finalizar</a>
                        <a class="btn btn-primary" href='indexModal.php?pid=<?php echo base64_encode("presentacion/ingrediente/modalIngrediente.php") . "&id_prod=" . $_GET["id_prod"]?>' data-toggle='modal' data-target='#modalIngrediente'>Lista Ingredientes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div id="resultados"></div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#filtro").keyup(function(){
                if($("#filtro").val().length > 0){
                    url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/ingrediente/buscarIngredienteAjax.php") . "&rol=" . $_SESSION["rol"] . "&id_prod=" . $_GET["id_prod"] ?>&filtro=" + $("#filtro").val();
                    $("#resultados").load(url);

                }
            });

        });
    </script>
    <div class="modal fade" id="modalIngrediente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="modal-content">
            </div>
        </div>
    </div>
    <script>
        $('body').on('show.bs.modal', '.modal', function (e) {
            var link = $(e.relatedTarget);
            $(this).find(".modal-content").load(link.attr("href"));
        });
    </script>
    <?php
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>
