<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require 'logica/Log.php';
if($_SESSION["rol"] == "proveedor"){
    $error = 0;
    if(isset($_POST["editarFoto"])){
        $foto = $_FILES["foto"];
        $tipo = $foto["type"];
        if($tipo == "image/jpeg" || $tipo == "image/png"){
            $proveedor = new Proveedor($_GET["idProveedor"]);
            $proveedor -> consultar();
            if($proveedor -> getImagen() == "" || $proveedor -> getImagen() == '...'){
                $proveedor -> getImagen();
            }else{
                unlink($proveedor -> getImagen());
            }
            $urlServidor = "imagenes/" . time() . ".png";
            $urlLocal = $foto["tmp_name"];
            copy($urlLocal, $urlServidor);
            $proveedor= new Proveedor($_GET["idProveedor"], "", $urlServidor , "", "");
            $proveedor -> editarFoto();
        }else{
            $error = 1;
        }
        $proveedor = new Proveedor($_GET["idProveedor"]);
        $proveedor -> consultar();
        date_default_timezone_set('America/Bogota');
        $log = new Log($_SESSION["id"],"editar","editar foto proveedor: " . $proveedor->getNombre() , date('Y-m-d'),date('H:i:s'),"proveedor");
        $log -> crear();
    }
    ?>
    <div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6">
    			<div class="card">
    				<div class="card-header">
    					<h3>Editar Foto Proveedor</h3>
    				</div>
    				<div class="card-body">
    					<?php if (isset($_POST["editarFoto"]) && $error == 0) { ?>						
    						<div class="alert alert-success alert-dismissible fade show"
                					role="alert">
                					<?php 
                    					echo "Foto editada";
                				        echo "<script>setTimeout(\"location.href = 'index.php?pid=" . base64_encode("presentacion/sesionProveedor.php") . "';\",1500);</script>";                						
                				    ?>
            					</div>
    					<?php } else if(isset($_POST["editarFoto"]) && $error == 1) { ?>
    						<div class="alert alert-danger alert-dismissible fade show"
    							role="alert">
    							<strong>Error. El archivo debe ser png o jpg</strong>
    							<button type="button" class="close" data-dismiss="alert"
    								aria-label="Close">
    								<span aria-hidden="true">&times;</span>
    							</button>
    						</div>					
    					<?php } ?>
    					<form
    						action="<?php echo "index.php?pid=" . base64_encode("presentacion/proveedor/editarFotoProveedor.php") . "&idProveedor=" . $_GET["idProveedor"] ?>"
    						method="post" enctype="multipart/form-data" >
    						<div class="form-group">
    							<input type="file" name="foto" class="form-control-file" required="required">
    						</div>
    						<div class="form-group">
    							<button type="submit" name="editarFoto" class="btn btn-primary">Editar Foto</button>
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