<?php
             include ("../modelo/comentario.php");
             $tabla= new Comentario();
             $tabla->tabla();
             $tabla->cerrarbd();
?>