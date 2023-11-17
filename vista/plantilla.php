<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/recursos/css/estilos.css">
    <title>Biotech</title>
</head>

<body>
    <?php
    include "modulos/cabecera.php";



    if (isset($_GET["pagina"])) {
        if ($_GET["pagina"] == "inicio" || $_GET["pagina"] == "inicio") {

            include "modulos/banner.php";
            include "modulos/garantias.php";
            include "modulos/indexCategorias.php";
            include "modulos/vistaProductos.php";
            include "modulos/galeria.php";
    
        } elseif ($_GET["pagina"] == "productos" || $_GET["pagina"] == "inicio") {
            include "vista/modulos/productos.php";

        } elseif ($_GET["pagina"] == "contacto" || $_GET["pagina"] == "inicio") {
            include "vista/modulos/contacto.php";

        } elseif ($_GET["pagina"] == "iniciarSesion" || $_GET["pagina"] == "inicio") {
            include "vista/modulos/iniciarSesion.php";

        }elseif ($_GET["pagina"] == "nosotros" || $_GET["pagina"] == "inicio") {
            include "vista/modulos/nosotros.php";
        
        }elseif ($_GET["pagina"] == "registrarse" || $_GET["pagina"] == "inicio") {
            include "vista/modulos/registrarse.php";
        }
    }

    include "modulos/footer.php";
    ?>


    <script src="https://kit.fontawesome.com/c7e046fc1b.js" crossorigin="anonymous"></script>
    <script src="../BioTech/vista/js/menuHam.js"></script>
</body>

</html>