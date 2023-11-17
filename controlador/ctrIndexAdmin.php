<?php

    class Plantilla{

        static public function ctrPlantilla(){

            include "vista/indexAdmin.php";

        }
        static public function ctrRuta(){
            return "http://localhost/Proyecto-Biotech/indexAdmin.php";
        }
    }

?>