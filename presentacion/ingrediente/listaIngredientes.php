<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
if ($_SESSION["rol"] == "administrador") {
    if(isset($_GET["idIngrediente"])){
        echo $_GET["idIngrediente"];
    }
    $ingrediente = new Ingrediente();
    $ingredienteT = $ingrediente->consultarE($_GET["id_prod"]);
    foreach ($ingredienteT as $it) {
        echo "<tr id='tr-" . $it->getIdIngrediente() . "'>";
        echo "<td>" . $it->getIdIngrediente() . "</td><td>" . $it->getNombre() . "</td><td>" . $it->getCantidadUnd() . "</td>";
        echo "<td nowrap>";
        echo "<button onclick='delIngrediente( \"". $_GET["id_prod"] . "\",\"". $it->getIdIngrediente() . "\" )'><i id='eliminar " . $it->getIdIngrediente() . "' class='fas fa-trash' data-toggle='tooltip' data-placement='bottom' title='Eliminar Ingrediente'></i></button>&nbsp";
        echo "</td>";
        echo "<tr>";
    }
}

?>

<div class="modal fade" id="modalIngrediente" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modalContent"></div>
	</div>
</div>

<!--<script>-->
<!--    function ConfirmDelete(){-->
<!--        var respuesta = confirm("\277Esta de acuerdo con eliminar el ingrediente?");-->
<!--        if (respuesta == true){-->
<!--            return true;-->
<!--        }else{-->
<!--            return false;-->
<!--        }-->
<!--    }-->
<!--</script>-->
<script>
    function delIngrediente(idProd, idIngrediente){
        if(confirm("Eliminar elemento?")){
            $.ajax({
                url: "indexAjax.php?pid=" + btoa('presentacion/ingrediente/eliminarIngredienteAjax.php') +  "&id_prod=" + idProd + "&id_ingrediente=" + idIngrediente,
            }).done(function() {
                document.getElementById("tr-" + idIngrediente).remove();
            });

        }
    }
    //$(document).ready(function(){
    //
    //    <?php
    //    $i = 1;
    //    foreach ($ingredienteT as $it){
    //        echo "\t$(\"#eliminar" . $it -> getIdIngrediente() . "\").click(function(){\n";
    //        echo "\t\t const url = \"indexAjax.php?pid=" . base64_encode("presentacion/ingrediente/eliminarIngredienteAjax.php") . "&idIngrediente=" . $it -> getIdIngrediente() . "\"\n";
    //        echo "\t\t$(\"#tabla"."\").load(url);\n";
    //        echo "\t});\n\n";
    //    }
    //    ?>
    //});
</script>