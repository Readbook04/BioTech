<main>
    <div>
        <form action="usuario.php">
        <section class="form-registerC">
            <h4>Registro</h4>
            <div id="columna3">
                <?php
                include '../vista/modelo/comentario.php';
                                $usu = new Comentario();
                                switch ($_REQUEST['opcion']){
                                    case 1:
                                        $usu -> inicializar($_REQUEST['fecha'], $_REQUEST['comentario'], $_REQUEST['tipo'], $_REQUEST['correo']);
                                        $usu -> insertar();
                                        break;
                                    case 2:
                                        $usu ->eliminar($_REQUEST['id_comentarios']);
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