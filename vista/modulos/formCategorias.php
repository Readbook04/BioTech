<?php
require '../modulos/cabeceraFormu.php'

?>

<h3>Categorías de Productos</h3>

<form action="../modulos/formularioProductos.php" method="post">


<p>
        Seleccione la categoría del producto:
        <select name="categorias" id="categorias">
            <?php
            include './modelo/mdl_productos.php';
            $nuevo = new Productos();
            $nuevo->mostrarCategorias();
            ?>
        </select>
    </p>
    
    <button type="submit" name="enviar_formulario" id="enviar">
        <p>Enviar</p>
    </button>

    <p class="aviso">
        <span class="obligatorio"> * </span>los campos son obligatorios.
    </p>

</form>
</div>
</div>

</body>

</html>