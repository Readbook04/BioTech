<?php

class Comentario{

    private $fecha;
    private $comentario;
    private $tipo;
    private $correo;

    public function inicializar($fecha, $comentario, $tipo, $correo){

        $this ->fecha = $fecha;
        $this ->comentario = $comentario;
        $this ->tipo = $tipo;
        $this ->correo = $correo;
    }
    public function conectarBD(){

        $conectar=mysqli_connect("localhost", "root", "", "biotech") or die ("Problemas con la conexion a la base de datos".mysqli_error($this->conectarBD()));
        return $conectar;
    }
    public function insertar(){
        $resultado = mysqli_query($this->conectarBD(),"INSERT INTO comentarios (fecha, comentario, tipo) values ('".$this->fecha."','".$this->comentario."','".$this->tipo."','".$this->correo."')");
        
        if ($resultado) {
            echo "<h4>Registro exitoso</h4>";
        } else {
            echo "Problemas en el insert: ".mysqli_error($this->conectarBD());
        }
    }
    public function eliminar($id_comentario){
        $registro=mysqli_query($this->conectarBD(), "SELECT fecha, comentario, tipo, correo FROM comentarios where id_comentario = $id_comentario") 
        or die (mysqli_error($this->conectarBD()));

        if($reg=mysqli_fetch_array($registro)){
            echo "<section class='formf-register'>
            <h4>Eliminar usuario</h4><br>";
            echo "Fecha:".$reg['fecha']."<br>";
            echo "Comentario:".$reg['comentario']."<br>";
            echo "Tipo:".$reg['tipo']."<br>";
            echo "Correo:".$reg['correo']."<br>";
            mysqli_query($this->conectarBD(), "DELETE FROM usuarios WHERE id_comentario = $id_comentario") or die ("Error en el delete".mysqli_error($this->conectarBD()));
            echo "Usuario eliminado";
            
        }else {
            echo"No existe comentario con dicho codigo";
        }
        echo"               <a href='../../BioTech\Vista\html\comentarios.html'>INICIO</a>";
    }
    public function consultar($correo){
            $consultar=mysqli_query($this->conectarBD(), "SELECT * FROM comentarios WHERE correo='$correo'") or die ("Problemas con la consulta".mysqli_error($this->conectarBD()));

        if ($consul=mysqli_fetch_array($consultar)){
            echo"<b>El usuario</b><br><br>";
            echo "Fecha:".$consul['fecha']."<br>";
            echo "Comentario:".$consul['comentario']."<br>";
            echo "Tipo:".$consul['tipo']."<br>";
            echo "Correo:".$consul['correo']."<br>";
        }else{
            echo "No existe el usuario con dicho email";
        }
        echo" <a href='../../BioTech\Vista\html\comentarios.html'>INICIO</a>";
    }
    public function tabla(){
        $registro=mysqli_query($this->conectarBD(), "SELECT * FROM comentarios") or die ("Fallo en la conexion".mysqli_error($this->conectarBD()));
        echo "<br><br>";
        echo "<table><thead><th>ID comentario</th><th> fecha </th><th> comentario </th><th> Tipo </th><th>Correo</th>";
        echo "<tbody>";
        while($reg=mysqli_fetch_array($registro)){
            echo "<tr><td>".$reg[0]."</td><td>".$reg[1]."</td><td>".$reg[2]."</td><td>".$reg[3]."</td><td>".$reg[4]."</td>";
        }

    }
    public function cerrarbd(){
        mysqli_close($this ->conectarBD());
    }

}

?>

