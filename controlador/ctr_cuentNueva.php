<main>
    <div>
        <form action="usuario.php">
        <section class="form-registerC">
            <h4>Registro</h4>
            <div id="columna3">
                <?php
                include '../Modelo/usuarios.php';
                                $usu = new Usuario();
                                switch ($_REQUEST['opcion']){
                                    case 1:
                                        $usu -> inicializar($_REQUEST['correo'], $_REQUEST['passw'], $_REQUEST['nombre'], $_REQUEST['apellidoP'], $_REQUEST['apellidoM'], $_REQUEST['telefono'], $_REQUEST['codigoPost'], $_REQUEST['calle'], $_REQUEST['colonia'], $_REQUEST['numDir']);
                                        $usu -> insertar();
                                        break;
                                    case 4:
                                        $usu ->eliminar($_REQUEST['id_usuario']);
                                        break;
                                    case 5:
                                        $usu ->consultar($_REQUEST['correo']);
                                        break;
                                    case 6:
                                        $usu ->tabla();
                                        break;
                                }
                                $usu ->cerrarbd();                          
                            ?>
                <br><br>

           </div>
        </section> 
        </form>
    </div>
</main>