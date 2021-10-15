<?php
session_start(); //esto hay que ponerlo en todas las paginas en las que se requiera estar loggeado para poder acceder a las variables de session
echo '<div id="cajita">';
echo '<center>';
echo '<link rel="stylesheet" type="text/css" href="style.css">';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $hostname = "db";
    $username = "admin";
    $password = "test";
    $db = "database";

    $conn = mysqli_connect($hostname,$username,$password,$db);
    if ($conn->connect_error) {
      die("Database connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM `usuarios` WHERE mail=?; ";
    $stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql

    $stmt->bind_param("s", $_SESSION['username']);//asigna los parametros
  if ($stmt->execute()) {//ejecuta la instruccion sql
        echo "Este es tu perfil " . $_SESSION['username'] . " Aqui podras consultar tus datos y editarlos si lo deseas.\n";
        $result = $stmt->get_result(); // conseguir el resultado sql
        $info = $result->fetch_assoc(); //devuelve un array con el resultado
        $nombre=$info['nombre'];
        $apellido=$info['apellidos'];
        $mail=$info['mail'];

        echo "nombre: $nombre <br>
              apellidos:$apellido <br>
              mail: $telefono<br>"  ;

  }

} else {
    echo 'No estas loggeado. <a href="registro.html><b><n>Login</a><br><br>';
}
echo '</div>';



?>
