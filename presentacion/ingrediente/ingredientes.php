<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
$ingrediente = new Ingrediente();
$ingredienteT = $ingrediente -> consultarE();
?>
<tbody>
    <?php
        foreach ($ingredienteT as $it) {
            echo "<tr>";
            echo "<td>" . $it -> getIdIngrediente() . "</td><td>" . $it -> getNombre() . "</td><td>" . $it -> getCantidadUnd() . "</td>";
            echo "<td>";
            echo "<a href='index.php?pid=" . base64_encode("presentacion/ingrediente/eliminarIngredienteAjax.php") . "&id_ingrediente=" . $it -> getIdIngrediente() . "'><i class='fas fa-trash' data-toggle='tooltip' data-placement='bottom' title='Eliminar Ingrediente' onclick='return ConfirmDelete()'></i></a>&nbsp";
            echo "</td>";
            echo "<tr>";
        } ?>
</tbody>
<script>
    function ConfirmDelete(){
        var respuesta = confirm("\277Esta de acuerdo con eliminar el ingrediente?");
        if (respuesta == true){
            return true;
        }else{
            return false;
        }
    }
</script>

