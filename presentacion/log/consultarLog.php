<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
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

$log = new Log();
$logs = $log -> consultarPorPagina($cantidad, $pagina, $orden, $dir, $_SESSION["rol"],$_SESSION["id"]);
$totalRegistros = $log -> consultarTotalRegistros($_SESSION["rol"],$_SESSION["id"]);
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
					<h3>Consultar Log</h3>
				</div>
				<div class="card-body">
					<table class="table table-striped table-hover table-responsive">
						<thead>
							<tr>
								<th width="8%">#</th>
								<th width="20%">Accion </th>
								<th width="20%">Datos</th>
								<th width="20%">Fecha</th> 	
								<th width="20%">Hora</th>
								<th width="20%">Actor</th>							
							</tr>
						</thead>
						<tbody>
						<?php 
						$i = (($pagina - 1) * $cantidad) + 1;						
						foreach ($logs as $logActual){			
    						  echo "<tr>";
                              echo "<td>" . $logActual -> getIdLog() . "</td><td>" . $logActual -> getAccion() . "</td><td>" . $logActual -> getDatos() . "</td>";
    						  echo "<td>" . $logActual -> getFecha() . "</td><td>" . $logActual -> getHora() . "</td><td>" . $logActual -> getActor() . "</td>";
    						  echo "</tr>";	         					         						    
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
                                        if ($_SESSION["rol"] == "administrador"){
                                            $log = new Log($_SESSION["id"],"consultar","consultar log" , date('Y-m-d'),date('H:i:s'),"administrador");
                                            $log -> crear();
                                        }
                                        elseif ($_SESSION["rol"] == "cliente"){
                                            $log = new Log($_SESSION["id"],"consultar","consultar log" , date('Y-m-d'),date('H:i:s'),"cliente");
                                            $log -> crear();
                                        }elseif ($_SESSION["rol"] == "domiciliario"){
                                            $log = new Log($_SESSION["id"],"consultar","consultar log" , date('Y-m-d'),date('H:i:s'),"domiciliario");
                                            $log -> crear();
                                        }

									}else{
									    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/log/consultarLog.php") . "&pagina=" . ($pagina-1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Anterior</a></li>";
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
									                    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/log/consultarLog.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
									                }
									                else{
									                   echo "...";
									                }
									            }									            
									            else{
									               echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/log/consultarLog.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
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
									    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/log/consultarLog.php") . "&pagina=" . ($pagina+1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Siguiente</a></li>";
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
	url = "index.php?pid=<?php echo base64_encode("presentacion/log/consultarLog.php") ?>&cantidad=" + $(this).val() + "<?php echo (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") ?>";
	//alert (url);
	location.replace(url);
});
</script>