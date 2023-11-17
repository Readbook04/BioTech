<?php

class Productos
{
    private $id;
    private $nombre;
    private $precio;
    private $stock;
    private $descuento;
    private $descripcion;

    public function inicializarProductos($nombre, $precio, $stock, $descuento, $descripcion)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->descuento = $descuento;
        $this->descripcion = $descripcion;
    }

    public function conectarBD()
    {
        $con = mysqli_connect("localhost", "root", "", "biotech") or die("Problemas con la conexión a la base de datos");
        return $con;
    }

    public function cerrarBD($con)
    {
        mysqli_close($con);
    }

    public function insertarProductos($id_user, $nom_img, $tem)
    {
        echo $id_user . '<br>';
        $coneBD = $this->conectarBD();
        $carpetaImagenes = '../recursos/img/';
        $rutaImagenes = $carpetaImagenes . $nom_img;
        move_uploaded_file($tem, $carpetaImagenes . $nom_img);
        $query = "INSERT INTO productos (nombre, precio, stock, descuento, descripcion, fotoproducto)
                VALUES('$this->nombre', '$this->precio', '$this->stock', '$this->descuento', '$this->descripcion', '$rutaImagenes')";
        $registroProductos = mysqli_query($coneBD, $query) or die(mysqli_error($coneBD));

        if ($registroProductos) {
            echo '<script>
            alert("El registro se ha realizado de manera exitosa");
            </script>';
        } else {
            echo '<script>
            alert("El registro no se ha realizado");
            </script>';
        }
    }

    public function mostrarProductos()
    {
        $coneBD = $this->conectarBD();
        $query = "SELECT pro.* FROM productos AS pro";
        $registroProductos = mysqli_query($coneBD, $query) or die(mysqli_error($coneBD));

        echo '<table class="productos-admin">';
        echo '
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Descuento</th>
                <th>Descripción</th>
                <th>Foto</th>
                <th>Acción</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
        ';

        while ($reg = mysqli_fetch_array($registroProductos)) {
            echo '<tr>';
            echo '<td>' . $reg['idproducto'] . '</td>';
            echo '<td>' . $reg['nombre'] . '</td>';
            echo '<td>' . $reg['precio'] . '</td>';
            echo '<td>' . $reg['stock'] . '</td>';
            echo '<td>' . $reg['descuento'] . '</td>';
            echo '<td>' . $reg['descripcion'] . '</td>';
            echo '<td><img src="' . $reg['fotoproducto'] . '" class="fotos"></td>';
            echo '<td>
                    <form method="POST" action="../modulos/tablaProduc.php">
                        <button class="delete-btn" name="eliminar" value="' . $reg['idproducto'] . '">Eliminar</button>
                    </form>
                  </td>
                  <td ><button class="edit-btn"><a href="../modulos/Modi.php?idP='.$reg['idproducto'].'">Modificar</button></td>"';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }

    public function mostrarCategorias()
    {
        $coneBD = $this->conectarBD();
        $query = "SELECT * FROM categorias ORDER BY id_categoria";
        $result = mysqli_query($coneBD, $query) or die(mysqli_error($coneBD));

        while ($categoria = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $categoria['id_categoria'] . '">' . $categoria['nombre_categoria'] . '</option>';
        }
    }

    public function borrarProducto($id_cat)
    {

        $coneBD = $this->conectarBD();
        $query = "DELETE FROM productos WHERE idproducto = $id_cat";
        $result = mysqli_query($coneBD, $query) or die(mysqli_error($coneBD));

        if ($result) {
            echo '<script>
            alert("Se elimino de manera correcta");
            </script>';
        } else {
            echo '<script>
            alert("Error no se elimino");
            </script>';
        }
    }

    public function modificarCatalogo($id, $nombre, $precio, $cantidad, $descuento, $descr, $nom_img, $temp)
    {
        $coneBD = $this->conectarBD();
        $carpetaImagenes = '../recursos/img/';
        $rutaImagenes = $carpetaImagenes . $nom_img;
        move_uploaded_file($temp, $carpetaImagenes . $nom_img);
    
        $query = "UPDATE productos
            SET nombre='$nombre', precio='$precio', stock='$cantidad', descuento='$descuento', descripcion='$descr', fotoproducyo='$rutaImagenes' WHERE idproducto='$id'";
        $registros = mysqli_query($coneBD, $query);
        
        if ($registros) {
            echo '<script>alert("Modificado exitosamente")</script>';
        } else {
            echo '<script>alert("Error al modificar producto")</script>';
        }
    }
}    