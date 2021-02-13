<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "proveedor"){
    $editado = false;    
    if(isset($_POST["editar"])){
        $salir = 0;
        $proveedor = new Proveedor($_GET["idproveedor"]);
        $proveedor -> consultar();
        if($_POST["clave"] == $proveedor -> getClave()){
            $salir = 0;
            if ($_POST["correo"] == $proveedor -> getCorreo()){
                $salir = 0;
                if ($proveedor ->getImagen() == '' || $proveedor ->getImagen() == '...'){
                    $proveedor = new proveedor($_GET["idproveedor"], $_POST["nombre"], '...',$_POST["correo"], $_POST["clave"]);
                    $proveedor -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idproveedor"],"editar","editar proveedor: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"proveedor");
                    $log -> crear();
                }
                else{
                    $proveedor = new proveedor($_GET["idproveedor"], $_POST["nombre"], $_POST["imagen"], $_POST["correo"], $_POST["clave"]);
                    $proveedor -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idproveedor"],"editar","editar proveedor: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"proveedor");
                    $log -> crear();
                }
            }else{
                $salir = 1;
                if ($proveedor ->getImagen() == '' || $proveedor ->getImagen() == '...'){
                    $proveedor = new proveedor($_GET["idproveedor"], $_POST["nombre"],'...',$_POST["correo"], $_POST["clave"]);
                    $proveedor -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idproveedor"],"editar","editar proveedor: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"proveedor");
                    $log -> crear();
                }
                else{
                    $proveedor = new proveedor($_GET["idproveedor"], $_POST["nombre"], $_POST["imagen"], $_POST["correo"], $_POST["clave"]);
                    $proveedor -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idproveedor"],"editar","editar proveedor: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"proveedor");
                    $log -> crear();
                }
            }
        }else{
            $salir = 1;
            if ($proveedor ->getImagen() == '' || $proveedor ->getImagen() == '...'){
                $proveedor = new proveedor($_GET["idproveedor"], $_POST["nombre"], '...',$_POST["correo"], md5($_POST["clave"]));
                $proveedor -> editar();
                $editado = true;
                date_default_timezone_set('America/Bogota');
                $log = new Log($_SESSION["id"] . "." . $_GET["idproveedor"],"editar","editar proveedor: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"proveedor");
                $log -> crear();
            }
            else{
                $proveedor = new proveedor($_GET["idproveedor"], $_POST["nombre"], $_POST["imagen"], $_POST["correo"], md5($_POST["clave"]));
                $proveedor -> editar();
                $editado = true;
                date_default_timezone_set('America/Bogota');
                $log = new Log($_SESSION["id"] . "." . $_GET["idproveedor"],"editar","editar proveedor: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"proveedor");
                $log -> crear();
            }
        }
    }else{
        $proveedor = new proveedor($_GET["idproveedor"]);
        $proveedor -> consultar();
    }
    ?>
    <div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6">
    			<div class="card">
    				<div class="card-header">
    					<h3>Editar proveedor</h3>
    				</div>
    				<div class="card-body">
    					<?php if ($editado && $salir==1) { ?>    											
                				<div class="alert alert-success alert-dismissible fade show"
                					role="alert">
                					<?php 
                    					echo "Datos editados";
                						session_destroy();
                				        echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";                						
                				    ?>
            					</div>
    					<?php }elseif($editado && $salir==0){ ?>
    							<div class="alert alert-success alert-dismissible fade show"
                					role="alert">
                					<?php 
                    					echo "Datos editados";
                				        echo "<script>setTimeout(\"location.href = 'index.php?pid=" . base64_encode("presentacion/sesionProveedor.php") . "';\",1500);</script>";                						
                				    ?>
            					</div>
    					<?php }?>
    					<form
    						action="<?php echo "index.php?pid=" . base64_encode("presentacion/proveedor/editarProveedor.php") . "&idproveedor=" . $_GET["idproveedor"] ?>"
    						method="post">
    						<div class="form-group">
    							<input type="text" name="nombre" class="form-control"
    								placeholder="Nombre" value="<?php echo $proveedor -> getNombre() ?>" required="required">
    						</div>    						
    						<div class="form-group">
    							<input type="hidden" name="imagen" class="form-control"
    								value="<?php echo $proveedor -> getImagen() ?>">
    						</div>
    						<div class="form-group">
    							<input type="text" name="correo" class="form-control"
    								placeholder="Correo" value="<?php echo $proveedor -> getCorreo() ?>" required="required">
    						</div>	
    						<div class="form-group">
    							<input type="password" name="clave" class="form-control"
    								placeholder="Clave" value="<?php echo $proveedor -> getClave() ?>" required="required">
    						</div>							
    						<div class="form-group">
    							<button type="submit" name="editar" class="btn btn-primary">Editar</button>
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