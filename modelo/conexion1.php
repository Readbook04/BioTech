<?php

    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "biotech";

    $cnx = mysqli_connect($servidor, $usuario, $clave, $bd);
    
if(!$cnx){
    die("Conexion fallida" . mysqli_connect_error());
}




?>