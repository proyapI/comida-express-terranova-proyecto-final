<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "administrador"){
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
    
    $domiciliario = new Domiciliario();
    $domiciliarios = $domiciliario -> consultarPorPagina($cantidad, $pagina, $orden, $dir);
    $totalRegistros = $domiciliario -> consultarTotalRegistros();
    $totalPaginas = intval(($totalRegistros/$cantidad));
    if($totalRegistros%$cantidad != 0){
        $totalPaginas++;
    }
    ?>
    <div class="container">
    	<div class="row mt-3">
    		<div class="col-12">
    			<div class="card">
    				<div class="card-header">
    					<h3>Consultar Domiciliario</h3>
    				</div>
    				<div class="card-body">
    					<table class="table table-striped table-hover table-responsive">
    						<thead>
    							<tr>
    								<th width="5%">#</th>
    								<th width="35%">Nombre 
    								<?php 
    								if($orden != "nombre"){
    								    echo "<a href='index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "&cantidad=" . $cantidad . "&orden=nombre&dir=asc'><i class='fas fa-sort-amount-up'></i></a> 
                                              <a href='index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "&cantidad=" . $cantidad . "&orden=nombre&dir=desc'><i class='fas fa-sort-amount-down'></i></a>";
    								}else if($orden == "nombre" && $dir == "asc"){								    
    								    echo "<i class='fas fa-sort-up'></i>
                                              <a href='index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "&cantidad=" . $cantidad . "&orden=nombre&dir=desc'><i class='fas fa-sort-amount-down'></i></a>";								    
    								}else if($orden == "nombre" && $dir == "desc"){
    								    echo "<a href='index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "&cantidad=" . $cantidad . "&orden=nombre&dir=asc'><i class='fas fa-sort-amount-up'></i></a>
                                              <i class='fas fa-sort-down'></i>";
    								}								
    								?>
    								</th>
    								<th width="35%">Apellido
    								<?php 
    								if($orden != "apellido"){
    								    echo "<a href='index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "&cantidad=" . $cantidad . "&orden=apellido&dir=asc'><i class='fas fa-sort-amount-up'></i></a> 
                                              <a href='index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "&cantidad=" . $cantidad . "&orden=apellido&dir=desc'><i class='fas fa-sort-amount-down'></i></a>";
    								}else if($orden == "apellido" && $dir == "asc"){								    
    								    echo "<i class='fas fa-sort-up'></i>
                                              <a href='index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "&cantidad=" . $cantidad . "&orden=apellido&dir=desc'><i class='fas fa-sort-amount-down'></i></a>";								    
    								}else if($orden == "apellido" && $dir == "desc"){
    								    echo "<a href='index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "&cantidad=" . $cantidad . "&orden=apellido&dir=asc'><i class='fas fa-sort-amount-up'></i></a>
                                              <i class='fas fa-sort-down'></i>";
    								}								
    								?>
    								</th>								
    								<th width="15%">Ciudad</th> 	
    								<th width="15%">Localidad</th>
    								<th width="20%">Direccion</th>
    								<th width="20%">Telefono</th>
    								<th width="15%">Imagen</th>
    								<th width="20%">Correo</th>
    								<th width="20%">Estado</th>															
    								<th>Servicios</th>
    							</tr>
    						</thead>
    						<tbody>
    						<?php 
    						$i = (($pagina - 1) * $cantidad) + 1;
    						foreach ($domiciliarios as $domiciliarioActual){
    						    echo "<tr>";
    						    echo "<td>" . $domiciliarioActual-> getIdDomiciliario() . "</td><td>" . $domiciliarioActual -> getNombre() . "</td>";
                                echo "<td>" . $domiciliarioActual -> getApellido() . "</td><td>" . $domiciliarioActual -> getCiudad() . "</td>";
                                echo "<td>" . $domiciliarioActual -> getLocalidad() . "</td>";
                                echo "<td>" . $domiciliarioActual -> getDireccion() . "</td><td>" . $domiciliarioActual -> getTelefono() . "</td>";
                                echo "<td><img src='" . $domiciliarioActual -> getImagen() . "' width='50px' /></td>";
                                echo "<td>" . $domiciliarioActual -> getCorreo() . "</td>";
                                echo "<td> <div id='estado" . $domiciliarioActual -> getIdDomiciliario() . "'>" . (($domiciliarioActual -> getEstado()==1)?"<i class='fas fa-check-circle' data-toggle='tooltip' data-placement='bottom' title='Habilitado'></i>":"<i class='fas fa-times-circle' data-toggle='tooltip' data-placement='bottom' title='Deshabilitado'></i>") . "<div></td>";
                                echo "<td nowrap><a href='#'><i id='cambiarEstado" . $domiciliarioActual -> getIdDomiciliario() . "' class='fas fa-user-edit' data-toggle='tooltip' data-placement='bottom' title='Cambiar Estado'></i></a> ";                                                            
                                    echo "<a href='index.php?pid= " . base64_encode("presentacion/domiciliario/editarDomiciliario.php") .
                                    "&idDomiciliario=" . $domiciliarioActual -> getIdDomiciliario() . "'><i class='fas fa-edit'></i></a>&nbsp";
                                    echo "<a href='index.php?pid=" . base64_encode("presentacion/domiciliario/eliminarDomiciliario.php") . "&idDomiciliario=" . $domiciliarioActual -> getIdDomiciliario() ."'><i class='fas fa-trash' data-toggle='tooltip' data-placement='bottom' title='Eliminar Domiciliario' onclick='return ConfirmDelete()'></i></a></td>";
                                echo "</td>";
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
                                                $log = new Log($_SESSION["id"],"consultar","consultar domiciliario" , date('Y-m-d'),date('H:i:s'),"administrador");
                                                $log -> crear();
                                            }
    									}else{
    									    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "&pagina=" . ($pagina-1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Anterior</a></li>";
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
    									                    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
    									                }
    									                else{
    									                   echo "...";
    									                }
    									            }									            
    									            else{
    									               echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
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
    									    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "&pagina=" . ($pagina+1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Siguiente</a></li>";
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
    	url = "index.php?pid=<?php echo base64_encode("presentacion/domiciliario/consultarDomiciliario.php") ?>&cantidad=" + $(this).val() + "<?php echo (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") ?>";
    	//alert (url);
    	location.replace(url);
    });
    </script>
    <script>
    $(document).ready(function(){
    <?php 
    $i = 1;
    foreach ($domiciliarios as $domiciliarioActual){
        echo "\t$(\"#cambiarEstado" . $domiciliarioActual -> getIdDomiciliario() . "\").click(function(){\n";
        echo "\t\t const url = \"indexAjax.php?pid=" . base64_encode("presentacion/domiciliario/cambiarEstadoDomiciliarioAjax.php") . "&idDomiciliario=" . $domiciliarioActual -> getIdDomiciliario() . "&nombre=" . $domiciliarioActual->getNombre() .  "&idSesion=" . $_SESSION["id"] . "\"\n";
        echo "\t\t$(\"#estado" . $domiciliarioActual -> getIdDomiciliario() . "\").load(url);\n";
        echo "\t});\n\n";
    }	
    ?>
    });
    </script>
    <script>
        function ConfirmDelete(){
            var respuesta = confirm("\277Esta de acuerdo con eliminar el domiciliario?");
            if (respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
<?php 
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>        						