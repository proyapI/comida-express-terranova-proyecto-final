<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";

if($_SESSION["rol"] == "proveedor"){
    $cantidad = 5;
    if(isset($_GET["cantidad"])){
        $cantidad = $_GET["cantidad"];
    }
    $pagina = 1;
    if(isset($_GET["pagina"])){
        $pagina = $_GET["pagina"];
    }
    $orden = "";
    if(isset($_GET["orden"])){
        $orden = $_GET["orden"];
    }
    $dir = "";
    if(isset($_GET["dir"])){
        $dir = $_GET["dir"];
    }

    $solicitud = new SolicitudI();
    $solicitudes = $solicitud -> consultarPorPagina($cantidad, $pagina, $orden, $dir, $_SESSION["id"]);
    $totalRegistros = $solicitud -> consultarTotalRegistrosE($_SESSION["id"]);
    $totalPaginas = intval(($totalRegistros/$cantidad));
    if($totalRegistros%$cantidad != 0){
        $totalPaginas++;
    }
    ?>

    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>Consultar Solicitud Ingrediente</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="20%">#</th>
                                <th width="50%">Nombre
                                    <?php
                                    if($orden != "nombre"){
                                        echo "<a href='index.php?pid=" . base64_encode("presentacion/ingrediente/consultarSolicitudI.php") . "&cantidad=" . $cantidad . "&orden=nombre&dir=asc'><i class='fas fa-sort-amount-up'></i></a> 
                                              <a href='index.php?pid=" . base64_encode("presentacion/ingrediente/consultarSolicitudI.php") . "&cantidad=" . $cantidad . "&orden=nombre&dir=desc'><i class='fas fa-sort-amount-down'></i></a>";
                                    }else if($orden == "nombre" && $dir == "asc"){
                                        echo "<i class='fas fa-sort-up'></i>
                                              <a href='index.php?pid=" . base64_encode("presentacion/ingrediente/consultarSolicitudI.php") . "&cantidad=" . $cantidad . "&orden=nombre&dir=desc'><i class='fas fa-sort-amount-down'></i></a>";
                                    }else if($orden == "nombre" && $dir == "desc"){
                                        echo "<a href='index.php?pid=" . base64_encode("presentacion/ingrediente/consultarSolicitudI.php") . "&cantidad=" . $cantidad . "&orden=nombre&dir=asc'><i class='fas fa-sort-amount-up'></i></a>
                                              <i class='fas fa-sort-down'></i>";
                                    }
                                    ?>
                                </th>
                                <th width="40%">Cantidad de unidades</th>
                                <th width="30%">Servicios</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = (($pagina - 1) * $cantidad) + 1;
                            foreach ($solicitudes as $solicitudActual){
                                if ($solicitudActual -> getCantidad() != 0){
                                    echo "<tr>";
                                    echo "<td>" . $solicitudActual -> getIdIngrediente() . "</td><td>" . $solicitudActual -> getNombre() . "</td><td>" . $solicitudActual -> getCantidad() . "</td>";
                                    echo "<td>";
                                    echo "<a href='index.php?pid= " . base64_encode("presentacion/ingrediente/surtirIngrediente.php" ) .
                                        "&idIngrediente=" . $solicitudActual -> getIdIngrediente() . "&nombre=" . $solicitudActual -> getNombre()  . "&cantidad=". $solicitudActual -> getCantidad()."'><i class='fas fa-share' data-toggle='tooltip' data-placement='bottom' title='Surtir' ></i></a></td>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-11">
                                <nav>
                                    <ul class="pagination">
                                        <?php
                                        if($pagina == 1){
                                            echo "<li class='page-item disabled'><span class='page-link'>Anterior</span></li>";
                                            date_default_timezone_set('America/Bogota');
                                            if ($_SESSION["rol"] == "proveedor"){
                                                $log = new Log($_SESSION["id"],"consultar","consultar solicitud ingrediente" , date('Y-m-d'),date('H:i:s'),"proveedor");
                                                $log -> crear();
                                            }
                                        }else{
                                            echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/ingrediente/consultarSolicitudI.php") . "&pagina=" . ($pagina-1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Anterior</a></li>";
                                        }
                                        for($i=1; $i<=$totalPaginas; $i++){
                                            $radius = 2;
                                            if(($i >= 1 && $i <= $radius) || ($i > $pagina - $radius && $i < $pagina + $radius) || ($i <= $totalPaginas && $i > $totalPaginas - $radius)){
                                                if($pagina == $i){
                                                    echo "<li class='page-item active'><span class='page-link'>" . $i . "</span></li>";
                                                }
                                                else{
                                                    if ($pagina != 1 && $i == $pagina-2 || $pagina != 1 && $i== $pagina+2){
                                                        if ($i == 1 || $i == $totalPaginas){
                                                            echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/ingrediente/consultarSolicitudI.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
                                                        }
                                                        else{
                                                            echo "...";
                                                        }
                                                    }
                                                    else{
                                                        echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/ingrediente/consultarSolicitudI.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
                                                    }
                                                }
                                            }
                                            elseif($i == $pagina - $radius || $i == $pagina + $radius) {
                                                echo "...";
                                            }
                                        }
                                        if($pagina == $totalPaginas || $totalRegistros==0){
                                            echo "<li class='page-item disabled'><span class='page-link'>Siguiente</span></li>";
                                        }else{
                                            echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/ingrediente/consultarSolicitudI.php") . "&pagina=" . ($pagina+1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Siguiente</a></li>";
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-1 text-right">
                                <select name="cantidad" id="cantidad" class="custom-select">
                                    <option value="5" <?php echo ($cantidad==5)?"selected":"" ?>>5</option>
                                    <option value="10" <?php echo ($cantidad==10)?"selected":"" ?>>10</option>
                                    <option value="20" <?php echo ($cantidad==20)?"selected":"" ?>>20</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#cantidad").on("change", function() {
            url = "index.php?pid=<?php echo base64_encode("presentacion/ingrediente/consultarSolicitudI.php") ?>&cantidad=" + $(this).val() + "<?php echo (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") ?>";
            //alert (url);
            location.replace(url);
        });
    </script>
    <script>
        function (){
            document.formulario.submit();
        }
    </script>

    <?php
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>
