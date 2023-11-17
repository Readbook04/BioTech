<?php

class Usuario{

    private $correo;
    private $passw;
    private $nombre;
    private $apellidoP;
    private $apellidoM;
    private $telefono;
    private $codigoPost;
    private $calle;
    private $colonia;
    private $numDir;

    public function inicializar($correo, $passw, $nombre, $apellidoP, $apellidoM, $telefono, $codigoPost, $calle, $colonia, $numDir){

        $this ->correo = $correo;
        $this ->passw = $passw;
        $this ->nombre = $nombre;
        $this ->apellidoP = $apellidoP;
        $this ->apellidoM = $apellidoM;
        $this ->telefono = $telefono;
        $this ->codigoPost = $codigoPost;
        $this ->calle = $calle;
        $this ->colonia = $colonia;
        $this ->numDir = $numDir;
    }
    public function conectarBD(){

        $conectar=mysqli_connect("localhost", "root", "", "biotech") or die ("Problemas con la conexion a la base de datos".mysqli_error($this->conectarBD()));
        return $conectar;
    }
    public function insertar(){
        $resultado = mysqli_query($this->conectarBD(),"INSERT INTO usuarios (correo, passw, nombre, apellidoP, apellidoM, telefono, codigoPost, calle, colonia, numDir) values ('".$this->correo."','".$this->passw."','".$this->nombre."', '".$this->apellidoP."', '".$this->apellidoM."','".$this->telefono."','".$this->codigoPost."','".$this->calle."','".$this->colonia."','".$this->numDir."')");
        
        if ($resultado) {
            echo "<h4>Registro exitoso</h4>";
        } else {
            echo "Problemas en el insert: ".mysqli_error($this->conectarBD());
        }
    }
    public function eliminar($id_usuario){
        $registro=mysqli_query($this->conectarBD(), "SELECT correo, passw, nombre, apellidoP, apellidoM, telefono, codigoPost, calle, colonia, numDir FROM usuarios where id_usuario = $id_usuario") 
        or die (mysqli_error($this->conectarBD()));

        if($reg=mysqli_fetch_array($registro)){
            echo "<section class='formf-register'>
            <h4>Eliminar usuario</h4><br>";
            echo "Correo:".$reg['correo']."<br>";
            echo "Contraseña:".$reg['passw']."<br>";
            echo "Nombre:".$reg['nombre']."<br>";
            echo "Apellido paterno:".$reg['apellidoP']."<br>";
            echo "Apellido materno:".$reg['apellidoM']."<br>";
            echo "Telefono:".$reg['telefono']."<br>";
            echo "Codigo postal:".$reg['codigoPost']."<br>";
            echo "Calle:".$reg['calle']."<br>";
            echo "Colonia:".$reg['colonia']."<br>";
            echo "Numero exterior:".$reg['numDir']."<br>";
            mysqli_query($this->conectarBD(), "DELETE FROM usuarios WHERE id_usuario = $id_usuario") or die ("Error en el delete".mysqli_error($this->conectarBD()));
            echo "Usuario eliminado";
            
        }else {
            echo"No existe usuario con dicho codigo";
        }
        echo"               <a href='../../BioTech\Vista\html\usu.html'>INICIO</a>";
    }
    public function consultar($correo){
        $consultar=mysqli_query($this->conectarBD(), "SELECT * FROM usuarios WHERE correo='$correo'") or die ("Problemas con la consulta".mysqli_error($this->conectarBD()));

        if ($consul=mysqli_fetch_array($consultar)){
            echo"<b>El usuario</b><br><br>";
            echo "Correo:".$consul['correo']."<br>";
            echo "Contraseña:".$consul['passw']."<br>";
            echo "Nombre:".$consul['nombre']."<br>";
            echo "Apellido paterno:".$consul['apellidoP']."<br>";
            echo "Apellido materno:".$consul['apellidoM']."<br>";
            echo "Telefono:".$consul['telefono']."<br>";
            echo "Codigo postal:".$consul['codigoPost']."<br>";
            echo "Calle:".$consul['calle']."<br>";
            echo "Colonia:".$consul['colonia']."<br>";
            echo "Numero exterior:".$consul['numDir']."<br>";
        }else{
            echo "No existe el usuario con dicho email";
        }
        echo "<a href='../../BioTech\Vista\html\usu.html'>INICIO</a>";
    }

    public function tabla(){
        $registro=mysqli_query($this->conectarBD(), "SELECT * FROM usuarios") or die ("Fallo en la conexion".mysqli_error($this->conectarBD()));
        echo "<br><br>";
        echo "<table><thead><th>ID usuario</th><th> Correo </th><th> Contraseña </th><th> Nombre </th><th>ApellidoP</th><th>ApellidoM</th><th>Telefono</th><th>CodigoP</th><th>Calle</th><th>Colonia</th><th>NumeroExt</th>";
        echo "<tbody>";
        while($reg=mysqli_fetch_array($registro)){
            echo "<tr><td>".$reg[0]."</td><td>".$reg[1]."</td><td>".$reg[2]."</td><td>".$reg[3]."</td><td>".$reg[4]."</td><td>".$reg[5]."</td><td>".$reg[6]."</td><td>".$reg[7]."</td><td>".$reg[8]."<tr><td>".$reg[9]."</td><td>".$reg[10]."</tr></td>";
        }

    }
    public function cerrarbd(){
        mysqli_close($this ->conectarBD());
    }

}

?>

