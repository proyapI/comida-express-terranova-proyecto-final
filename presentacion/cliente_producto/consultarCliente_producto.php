<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "cliente"){
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
    
    $cliente_prod = new Cliente_producto();
    $cliente_prods = $cliente_prod -> consultarPorPagina($cantidad, $pagina, $orden, $dir);
    $totalRegistros = $cliente_prod -> consultarTotalRegistros();
    $totalPaginas = intval(($totalRegistros/$cantidad));
    if($totalRegistros%$cantidad != 0){
        $totalPaginas++;
    }                 
    ?>
    <div class="container">
    	<div class="row mt-3">
    		<div class="col">
    			<div class="card" style="width: 70%">
    				<div class="card-header">
    					<h3>Consultar Carrito </h3>
    				</div>
    				<div class="card-body">    					
    						<table class="table table-striped table-hover table-responsive">
    							<thead>
        							<tr>
        								<th width="8%">#Cliente</th>
        								<th width="8%">#Producto</th>
        								<th width="30%">Nombre producto
                                            <?php                                            
                                            if($orden != "nombre_producto"){
                                                echo "<a href='index.php?pid=" . base64_encode("presentacion/cliente_producto/consultarCliente_producto.php") . "&cantidad=" . $cantidad . "&orden=nombre_producto&dir=asc'><i class='fas fa-sort-amount-up'></i></a> 
                                                  <a href='index.php?pid=" . base64_encode("presentacion/cliente_producto/consultarCliente_producto.php") . "&cantidad=" . $cantidad . "&orden=nombre_producto&dir=desc'><i class='fas fa-sort-amount-down'></i></a>";
                                            }else if($orden == "nombre_producto" && $dir == "asc"){
                                                echo "<i class='fas fa-sort-up'></i>
                                                  <a href='index.php?pid=" . base64_encode("presentacion/cliente_producto/consultarCliente_producto.php") . "&cantidad=" . $cantidad . "&orden=nombre_producto&dir=desc'><i class='fas fa-sort-amount-down'></i></a>";
                                            }else if($orden == "nombre_producto" && $dir == "desc"){
                                                echo "<a href='index.php?pid=" . base64_encode("presentacion/cliente_producto/consultarCliente_producto.php") . "&cantidad=" . $cantidad . "&orden=nombre_producto&dir=asc'><i class='fas fa-sort-amount-up'></i></a>
                                                  <i class='fas fa-sort-down'></i>";
                                            }
                                            ?>
                                        </th>
        								<th width="8%">Unidades</th>
                                        <th width="15%">Total</th>
        								<th>Servicios</th>    							
        							</tr>
        						</thead>
        						<tbody>
        						<?php     						
        						$i = (($pagina - 1) * $cantidad) + 1;
        						$total = 0;
        						foreach ($cliente_prods as $cp){        						    
        						    if ($cp -> getId_cliente() == $_SESSION["id"]){
            						    echo "<tr>";
            						    echo "<td>" . $cp -> getId_cliente() . "</td><td>" . $cp -> getId_prod() . "</td><td>" . $cp -> getNombre_producto() . "</td>";
            						    echo "<td><a href='index.php?pid=" . base64_encode("presentacion/cliente_producto/actualizarUnidades.php") . "&id_prod=" . $cp -> getId_prod() . "&accion=" . "eliminar" . "&unidades=" . $cp -> getCantidad_und() . "&total=" . $cp -> getTotal() . "'>
                                        <i class='fas fa-minus-circle' data-toggle='tooltip' data-placement='bottom' title='Quitar una unidad'>
                                        </i></a>" . " " . $cp -> getCantidad_und() . " " . "<a href='index.php?pid=" . base64_encode("presentacion/cliente_producto/actualizarUnidades.php") . "&id_prod=" . $cp -> getId_prod() . "&accion=" . "agregar" . "&unidades=" . $cp -> getCantidad_und() . "&total=" . $cp -> getTotal() . "'><i class='fas fa-plus-circle' data-toggle='tooltip' data-placement='bottom' title='Agregar 
                                        una unidad'</td>";
                                        echo "<td>" . $cp -> getTotal() . "</td>";
            						    echo "<td>";
            						    if($_SESSION["rol"] == "cliente"){
                                            echo "<a href='index.php?pid=" . base64_encode("presentacion/cliente_producto/eliminarCliente_producto.php") . "&id_prod=" . $cp -> getId_prod() ."'><i class='fas fa-trash' data-toggle='tooltip' data-placement='bottom' title='Eliminar Producto' onclick='return ConfirmDelete()'></i></a>&nbsp";                                        
                                            ?>
                                        	                                	   						       
            						    <?php }        						    
            						    echo "</td>";        						            						    
            						    echo "</tr>";             						    
            						    $total = $total+$cp -> getTotal();            						    
        						    }    						            						            						    
        						}                						
        						?>    						    					
        						</tbody>
        					<?php if ($total!=0){?>
        					</table>        										
        					<div class="row">
        						<div class="col-11">
        							<nav>
        								<ul class="pagination">    								
        									<?php
        									if($pagina == 1){
                                                echo "<li class='page-item disabled'><span class='page-link'>Anterior</span></li>";
                                                date_default_timezone_set('America/Bogota');                                                                                       
                                                $log = new Log($_SESSION["id"],"consultar","consultar carrito" , date('Y-m-d'),date('H:i:s'),"cliente");
                                                $log -> crear();
        									}else{
        									    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente_producto/consultarCliente_producto.php") . "&pagina=" . ($pagina-1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Anterior</a></li>";
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
        									                    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente_producto/consultarCliente_producto.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
        									                }
        									                else{
        									                   echo "...";
        									                }
        									            }									            
        									            else{
        									               echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente_producto/consultarCliente_producto.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
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
        									    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente_producto/consultarCliente_producto.php") . "&pagina=" . ($pagina+1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Siguiente</a></li>";
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
            					<form action="<?php echo "index.php?pid=" . base64_encode("presentacion/cliente_producto/finalizarCompra.php") . "&total=" . $total  ?>"
        							method="post">    		    										    									
                					<div class="float-right">    						
        								<table class="text-center">
                                        	<thead>
                                        		<tr>
                                       				<th> <?php echo "<strong>" . "Total" . "</strong>" ?> </th>
            									</tr>
            								</thead>   
            								<tbody>
            									<tr>
            										<td> <?php echo $total; ?> </td>
            									</tr>
        										<tr>
        											<td> <button type="submit" name="finalizar compra" class="btn btn-primary">Finalizar compra</button></td>
        											<td><?php echo "<a href='index.php?pid=" . base64_encode("presentacion/cliente_producto/vaciarCliente_producto.php") . "' ><i class='fas fa-trash-alt' data-toggle='tooltip' data-placement='bottom' title='Vaciar carrito' onclick='return ConfirmDeleteV()'></i></a>"?></td>
        										</tr>
        									</tbody>									                         				                            		                            				
                                   		</table>                            	    							
            						</div>    		
            					</form>				
            			<?php } elseif ($total==0){?>
            				<div class="text-center">    						
								<?php echo "<strong>" . "NO HAY PRODUCTOS" . "</strong>" ?>        						                        	    							
       						</div>    		
            			<?php }?>
    					</div>    					
    				</div>
    			</div>
    		</div>
    	</div>
    <script>
    $("#cantidad").on("change", function() {
    	url = "index.php?pid=<?php echo base64_encode("presentacion/cliente_producto/consultarCliente_producto.php") ?>&cantidad=" + $(this).val() + "<?php echo (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") ?>";
    	//alert (url);
    	location.replace(url);
    });
    </script>
    <script>
        function ConfirmDelete(){
            var respuesta = confirm("\277Esta de acuerdo con eliminar el producto del carrito?");
            if (respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
    <script>
        function ConfirmDeleteV(){
            var respuesta = confirm("\277Esta de acuerdo con vaciar el carrito?");
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
<?php    
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>  
  