<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "cliente" || $_SESSION["rol"] == "domiciliario" || $_SESSION["rol"] == "administrador"){   
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
    
    $pedido = new Pedido();
    $pedidos = $pedido -> consultarPorPagina($cantidad, $pagina, $orden, $dir);
    $totalRegistros = $pedido -> consultarTotalRegistros();
    $totalPaginas = intval(($totalRegistros/$cantidad));
    if($totalRegistros%$cantidad != 0){
        $totalPaginas++;
    }                 
    ?>
    <div class="container">
    	<div class="row mt-3">
    		<div class="col">
    			<div class="card" style="width: 100%">
    				<div class="card-header">
    					<h3>Consultar Pedido</h3>
    				</div>
    				<div class="card-body">    					
    						<table class="table table-striped table-hover table-responsive">
    							<thead>
        							<tr>
        								<th width="5%">#Pedido</th>
        								<th width="5%">#Cliente</th>
        								<th width="5%">#Producto</th>
        								<th width="5%">#Domiciliario</th>
        								<th width="5%">#Unidades</th>
                                        <th width="15%">Fecha_hora</th>
                                        <th width="10%">Total</th>
                                        <th width="10%">Observaciones</th>
                                        <th width="10%">Estado</th>
        								<th>Servicios</th>    							
        							</tr>
        						</thead>
        						<tbody>
        						<?php     						
        						$i = (($pagina - 1) * $cantidad) + 1;    
        						$registro = 0;
        						foreach ($pedidos as $p){          			
            						    if($_SESSION["rol"] == "administrador"){
            						        echo "<tr>";
            						        echo "<td>" . $p -> getId_pedido() . "</td><td>" . $p -> getId_cliente() . "</td><td>" . $p -> getId_prod() . "</td><td>" . $p -> getId_domiciliario() . "</td>";
            						        echo "<td>" . $p -> getUnidades() . "</td><td>" . $p -> getFecha_hora() . "</td><td>" . $p -> getValor_total() . "</td><td>" . $p -> getObservaciones() . "</td><td>" . $p -> getEstado() . "</td>";
                                            $registro = 1;            						        
            						        echo "</tr>";
            						    }elseif($_SESSION["rol"] == "cliente"){            						        
                						    if ($p -> getId_cliente() == $_SESSION["id"]){                						                        						       
                    						    echo "<tr>";
                    						    echo "<td>" . $p -> getId_pedido() . "</td><td>" . $p -> getId_cliente() . "</td><td>" . $p -> getId_prod() . "</td><td>" . $p -> getId_domiciliario() . "</td>";
                    						    echo "<td>" . $p -> getUnidades() . "</td><td>" . $p -> getFecha_hora() . "</td><td>" . $p -> getValor_total() . "</td><td>" . $p -> getObservaciones() . "</td><td>" . $p -> getEstado() . "</td>";                                        
                    						    echo "<td>";        
                    						    if ($p -> getEstado()=='Pendiente'){
                    						        echo "<a href='index.php?pid=" . base64_encode("presentacion/pedido/eliminarPedido.php") . "&id_pedido=" . $p -> getId_pedido() . "&id_producto=" . $p -> getId_prod() . "&id_domiciliario=" . $p -> getId_domiciliario() . "&unidades=" . $p -> getUnidades() . "'><i class='fas fa-trash' data-toggle='tooltip' data-placement='bottom' title='Eliminar Pedido' onclick='return ConfirmDelete()'></i></a>&nbsp";
                    						    }
                    						    echo "<a href='indexModal.php?pid=" . base64_encode("presentacion/domiciliario/modalDomiciliario.php") . "&idDomiciliario=" . $p -> getId_domiciliario() . "' data-toggle='modal' data-target='#modalDomiciliario'><i class='fas fa-eye' data-toggle='tooltip' data-placement='bottom' title='Ver detalles domiciliario'></i></a>&nbsp";                                                            						                    						                				
                    						    echo "<a href='indexModal.php?pid=" . base64_encode("presentacion/pedido/modalPedido.php") . "&idPedido=" . $p -> getId_pedido() . "&idCliente=" . $p -> getId_cliente() . "&idProducto=" . $p -> getId_prod() . "&id_domiciliario=" . $p -> getId_domiciliario() . "' data-toggle='modal' data-target='#modalPedido'><i class='fas fa-info-circle' data-toggle='tooltip' data-placement='bottom' title='Ver informacion del pedido'></i></a>";
                    						    echo "<a href='index.php?pid=" . base64_encode("presentacion/pedido/reportePedidoPDF.php") . "&id_pedido=" . $p -> getId_pedido() . "&id_producto=" . $p -> getId_prod() . "&id_domiciliario=" . $p -> getId_domiciliario() . "'><i class='fas fa-file-download' data-toggle='tooltip' data-placement='bottom' title='Generar factura'></i></a>&nbsp";
                    						    echo "</td>";        						            						    
                    						    echo "</tr>"; 
                    						    $registro = 1;
                						    }   
                						    else{
                						        $registro = 0;                						        
                						    }
                						        
                                        }elseif ($_SESSION["rol"] == "domiciliario"){
                                            if ($p -> getId_domiciliario() == $_SESSION["id"]){
                                                echo "<tr>";
                                                echo "<td>" . $p -> getId_pedido() . "</td><td>" . $p -> getId_cliente() . "</td><td>" . $p -> getId_prod() . "</td><td>" . $p -> getId_domiciliario() . "</td>";
                                                echo "<td>" . $p -> getUnidades() . "</td><td>" . $p -> getFecha_hora() . "</td><td>" . $p -> getValor_total() . "</td><td>" . $p -> getObservaciones() . "</td><td>" . $p -> getEstado() . "</td>";
                                                echo "<td>";
                                                if ($p -> getEstado() != "Confirmado"){
                                                    echo "<a href='index.php?pid=" . base64_encode("presentacion/pedido/confirmarPedido.php") . "&id_pedido=" . $p -> getId_pedido() . "&id_cliente=" . $p -> getId_cliente() . "&id_producto=" . $p -> getId_prod() . "&id_domiciliario=" . $p -> getId_domiciliario() ."&accion="."proceso"."'><i class='fas fa-paper-plane' data-toggle='tooltip' data-placement='bottom' title='Procesar Pedido' onclick='return ProcessPedido()'></i></a>&nbsp";
                                                    echo "<a href='index.php?pid=" . base64_encode("presentacion/pedido/confirmarPedido.php") . "&id_pedido=" . $p -> getId_pedido() . "&id_cliente=" . $p -> getId_cliente() . "&id_producto=" . $p -> getId_prod() . "&id_domiciliario=" . $p -> getId_domiciliario() . "&accion="."confirmar"."'><i class='fas fa-clipboard-check' data-toggle='tooltip' data-placement='bottom' title='Confirmar Pedido' onclick='return ConfirmPedido()'></i></a>&nbsp";
                                                }
                                                echo "<a href='indexModal.php?pid=" . base64_encode("presentacion/cliente/modalCliente.php") . "&idCliente=" . $p -> getId_cliente() . "' data-toggle='modal' data-target='#modalCliente'><i class='fas fa-eye' data-toggle='tooltip' data-placement='bottom' title='Ver detalles'></i></a>&nbsp";                                                            						                    						                				
                                                echo "<a href='indexModal.php?pid=" . base64_encode("presentacion/pedido/modalPedido.php") . "&idPedido=" . $p -> getId_pedido() . "&idCliente=" . $p->getId_cliente() . "&idProducto=" . $p -> getId_prod() . "&id_domiciliario=" . $p -> getId_domiciliario() . "' data-toggle='modal' data-target='#modalPedido'><i class='fas fa-info-circle' data-toggle='tooltip' data-placement='bottom' title='Ver informacion del pedido'></i></a>";
                                                echo "</td>";
                                                echo "</tr>";
                                                $registro = 1;
                                            }   
                                        } 
        						}    
        						?>
        						<?php if ($registro == 0){?>
        							<div class="text-center">    						
										<?php echo "<strong>" . "NO HAY PEDIDOS" . "</strong>" ?>        						                        	    							
       								</div>
       							<?php }?>    	    						    					
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
                                                        $log = new Log($_SESSION["id"],"consultar","consultar pedido" , date('Y-m-d'),date('H:i:s'),"administrador");
                                                        $log -> crear();
                                                    }elseif($_SESSION["rol"] == "cliente"){
                                                        $log = new Log($_SESSION["id"],"consultar","consultar pedido" , date('Y-m-d'),date('H:i:s'),"cliente");
                                                        $log -> crear();
                                                    }elseif ($_SESSION["rol"] == "domiciliario"){
                                                        $log = new Log($_SESSION["id"],"consultar","consultar pedido" , date('Y-m-d'),date('H:i:s'),"domiciliario");
                                                        $log -> crear();
                                                    }
            									}else{
            									    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/pedido/consultarPedido.php") . "&pagina=" . ($pagina-1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Anterior</a></li>";
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
            									                    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/pedido/consultarPedido.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
            									                }
            									                else{
            									                   echo "...";
            									                }
            									            }									            
            									            else{
            									               echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/pedido/consultarPedido.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
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
            									    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/pedido/consultarPedido.php") . "&pagina=" . ($pagina+1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Siguiente</a></li>";
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
    	url = "index.php?pid=<?php echo base64_encode("presentacion/cliente_producto/consultarPedido.php") ?>&cantidad=" + $(this).val() + "<?php echo (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") ?>";
    	//alert (url);
    	location.replace(url);
    });
    </script>
    <script>
        function ConfirmDelete(){
            var respuesta = confirm("\277Esta de acuerdo con eliminar el pedido?");
            if (respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
    <script>
        function ProcessPedido(){
            var respuesta = confirm("\277Esta de acuerdo con enviar el pedido?");
            if (respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    <script>
        function ConfirmPedido(){
            var respuesta = confirm("\277Esta de acuerdo con confirmar el pedido?");
            if (respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
    <script>
		function (){
			document.formulario.submit();
		}		
	</script>	 
    <div class="modal fade" id="modalCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <div class="modal fade" id="modalDomiciliario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modal-contentD">      
        </div>
      </div>
    </div>
    <script>
        $('body').on('show.bs.modal', '.modal', function (e) {
        	var link = $(e.relatedTarget);
        	$(this).find(".modal-contentD").load(link.attr("href"));
        });
     </script>
     <div class="modal fade" id="modalPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modal-contentP">      
        </div>
      </div>
    </div>
    <script>
        $('body').on('show.bs.modal', '.modal', function (e) {
        	var link = $(e.relatedTarget);
        	$(this).find(".modal-contentP").load(link.attr("href"));
        });
     </script>   
    <?php    
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>    