<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
$creado = false;
$id_prod = $_GET["id_prod"];
$cantidad_und = $_GET["cantidad_und"];
$idIngrediente = $_GET["idIngrediente"];
$pi = new Lista_ingrediente();
$pi ->consultar($_GET["id_prod"]);
$consultar = $pi ->consultarTodos();
$registro = $pi->consultarTotalRegistrosA($idIngrediente, $id_prod);
if(isset($_POST["agregar"])){
    if ($registro==0){
        foreach ($consultar as $ct){
            if ($ct->getCantidad()==0){
                if ($_POST["cantidad"] >= $cantidad_und){
                    if ($pi->getIdIngrediente()==0){
                            $pi -> actualizar($idIngrediente,$id_prod, $_POST["cantidad"]);
                    }
                    else{
                        $p = new Lista_ingrediente($pi->getIdProd(),$idIngrediente,$_POST["cantidad"],$pi->getNombre(),$pi->getDescripcion(),$pi->getImagen(),$pi->getCantidad_und(),$pi->getValor());
                        $p -> agregar();
                    }
                    $creado=true;
                }else{
                    $creado = false;
                    echo "<script>alert('La cantidad de ingredientes es insuficiente');window.location = 'index.php?pid=".base64_encode("presentacion/ingrediente/agregarIngrediente.php") . "&id_prod=" . $id_prod. "&cantidad_und=" . $cantidad_und . "&idIngrediente=" . $idIngrediente . "';</script>";
                } 
            }else{
                if ($pi->getIdIngrediente()==0){
                    $pi -> actualizar($idIngrediente,$id_prod, $_POST["cantidad"]);
                }
                else{
                    $p = new Lista_ingrediente($pi->getIdProd(),$idIngrediente,$_POST["cantidad"],$pi->getNombre(),$pi->getDescripcion(),$pi->getImagen(),$pi->getCantidad_und(),$pi->getValor());
                    $p -> agregar();
                }
                $creado=true;
            }
        }
    }else{
        $unidades = $pi->consultarID($idIngrediente, $id_prod);
        $suma = $unidades+$_POST["cantidad"];
        $pi->actualizarU($suma, $idIngrediente, $id_prod);
        $creado=true;
    }
}
?>
<div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6">
    			<div class="card">
    				<div class="card-header">
    					<h3>Agregar unidades</h3>
    				</div>
    				<div class="card-body">
    					<?php if ($creado) { 
    					    echo "<script>window.location = 'index.php?pid=".base64_encode("presentacion/ingrediente/buscarIngrediente.php")."&id_prod=".$id_prod."';</script>";
    					 } ?>
    					<form
    						action=<?php echo "index.php?pid=" . base64_encode("presentacion/ingrediente/agregarIngrediente.php") . "&id_prod=" . $id_prod. "&cantidad_und=" . $cantidad_und . "&idIngrediente=" . $idIngrediente ?>
    						method="post">
    						<div class="form-group">
    							<input type="text" name="cantidad" class="form-control"
    								placeholder="Cantidad" required="required">
    						</div>
    						<div class="text-center">        						
        						<button  type="submit" name="agregar" class="btn btn-primary"> Agregar</button>				  							
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>