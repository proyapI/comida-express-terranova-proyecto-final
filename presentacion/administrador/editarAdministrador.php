<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "administrador"){
    $editado = false;    
    if(isset($_POST["editar"])){
        $salir = 0;
        $administrador = new Administrador($_GET["idAdministrador"]);
        $administrador -> consultar();
        if($_POST["clave"] == $administrador -> getClave()){
            $salir = 0;
            if ($_POST["correo"] == $administrador -> getCorreo()){
                $salir = 0;
                if ($administrador ->getImagen() == '' || $administrador ->getImagen() == '...'){
                    $administrador = new Administrador($_GET["idAdministrador"], $_POST["nombre"], $_POST["apellido"],'...',$_POST["correo"], $_POST["clave"]);
                    $administrador -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idAdministrador"],"editar","editar administrador: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
                    $log -> crear();
                }
                else{
                    $administrador = new Administrador($_GET["idAdministrador"], $_POST["nombre"], $_POST["apellido"], $_POST["imagen"], $_POST["correo"], $_POST["clave"]);
                    $administrador -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idAdministrador"],"editar","editar administrador: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
                    $log -> crear();
                }
            }else{
                $salir = 1;
                if ($administrador ->getImagen() == '' || $administrador ->getImagen() == '...'){
                    $administrador = new Administrador($_GET["idAdministrador"], $_POST["nombre"], $_POST["apellido"],'...',$_POST["correo"], $_POST["clave"]);
                    $administrador -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idAdministrador"],"editar","editar administrador: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
                    $log -> crear();
                }
                else{
                    $administrador = new Administrador($_GET["idAdministrador"], $_POST["nombre"], $_POST["apellido"], $_POST["imagen"], $_POST["correo"], $_POST["clave"]);
                    $administrador -> editar();
                    $editado = true;
                    date_default_timezone_set('America/Bogota');
                    $log = new Log($_SESSION["id"] . "." . $_GET["idAdministrador"],"editar","editar administrador: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
                    $log -> crear();
                }
            }
        }else{
            $salir = 1;
            if ($administrador ->getImagen() == '' || $administrador ->getImagen() == '...'){
                $administrador = new Administrador($_GET["idAdministrador"], $_POST["nombre"], $_POST["apellido"],'...',$_POST["correo"], md5($_POST["clave"]));
                $administrador -> editar();
                $editado = true;
                date_default_timezone_set('America/Bogota');
                $log = new Log($_SESSION["id"] . "." . $_GET["idAdministrador"],"editar","editar administrador: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
                $log -> crear();
            }
            else{
                $administrador = new Administrador($_GET["idAdministrador"], $_POST["nombre"], $_POST["apellido"], $_POST["imagen"], $_POST["correo"], md5($_POST["clave"]));
                $administrador -> editar();
                $editado = true;
                date_default_timezone_set('America/Bogota');
                $log = new Log($_SESSION["id"] . "." . $_GET["idAdministrador"],"editar","editar administrador: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
                $log -> crear();
            }
        }
    }else{
        $administrador = new Administrador($_GET["idAdministrador"]);
        $administrador -> consultar();
    }
    ?>
    <div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6">
    			<div class="card">
    				<div class="card-header">
    					<h3>Editar Administrador</h3>
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
                				        echo "<script>setTimeout(\"location.href = 'index.php?pid=" . base64_encode("presentacion/sesionAdministrador.php") . "';\",1500);</script>";                						
                				    ?>
            					</div>
    					<?php }?>
    					<form
    						action="<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/editarAdministrador.php") . "&idAdministrador=" . $_GET["idAdministrador"] ?>"
    						method="post">
    						<div class="form-group">
    							<input type="text" name="nombre" class="form-control"
    								placeholder="Nombre" value="<?php echo $administrador -> getNombre() ?>" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="apellido" class="form-control"
    								placeholder="Apellido" value="<?php echo $administrador -> getApellido() ?>" required="required">
    						</div>
    						<div class="form-group">
    							<input type="hidden" name="imagen" class="form-control"
    								value="<?php echo $administrador -> getImagen() ?>">
    						</div>
    						<div class="form-group">
    							<input type="text" name="correo" class="form-control"
    								placeholder="Correo" value="<?php echo $administrador -> getCorreo() ?>" required="required">
    						</div>	
    						<div class="form-group">
    							<input type="password" name="clave" class="form-control"
    								placeholder="Clave" value="<?php echo $administrador -> getClave() ?>" required="required">
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