<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
if($_GET["rol"] == "administrador"){
    $filtro = $_GET["filtro"];
    $ingrediente = new Ingrediente();
    $lista = new Lista_ingrediente();
    $lista->consultar($_GET["id_prod"]);
    $ingredientes = $ingrediente -> buscar($filtro);
    ?>
    <div class="card">
        <div class="card-header">
            <h3>Resultados de utilizar ingrediente</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th width="20%">#</th>
                    <th width="40%">Nombre</th>
                    <th width="40%">Cantidad de unidades</th>
                    <th>Servicios</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($ingredientes as $ingredienteActual){
                    $filtro = ucwords(strtolower($filtro));
                    echo "<tr>";
                    echo "<td>" . $ingredienteActual -> getIdIngrediente() . "</td><td>". str_replace($filtro, "<FONT color='#FF0000'>$filtro</FONT>", $ingredienteActual -> getNombre()) ."</td>";
                    echo "<td>" . $ingredienteActual -> getCantidadUnd() . "</td>";
                    echo "<td><a href='index.php?pid= " . base64_encode("presentacion/ingrediente/agregarIngrediente.php") . "&idIngrediente=" . $ingredienteActual -> getIdIngrediente() . "&id_prod=".$lista->getIdProd()."&cantidad_und=".$lista -> getCantidad_und()."'><i class='fas fa-plus-square' data-placement='bottom' title='Agregar Ingrediente' ></i></a></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>
