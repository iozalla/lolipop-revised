<link rel="stylesheet" type="text/css" href="style.css">

<?php


  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }





 //https://phpdelusions.net/mysqli_examples/insert


$contrasenaHasheada=password_hash($_GET["fcontrasena"],PASSWORD_DEFAULT); //esto se usa para hashear la contraseña https://www.php.net/manual/en/function.password-hash.php
$sql = "INSERT INTO usuarios (nombre, apellidos, mail, contrasena, DNI, telefono,fechaNac,sexo,tarjeta) VALUES (?,?,?,?,?,?,?,?,?); ";

$stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql
$stmt->bind_param("sssssssss", $_GET["fnombre"],$_GET["fapellidos"], $_GET["fmail"], $contrasenaHasheada, $_GET["fdni"], $_GET["ftelefono"], $_GET["ffechanac"], $_GET["fsexo"],$_GET["ftarjeta"]);//asigna los parametros


if ($stmt->execute()) {//ejecuta la instruccion sql


    echo ' rows updated properly!';

    echo '

    <script>
      window.location = "login.html";

    </script>';
} else {
    echo '<body style="background-color:#887162;">
    <br><br><br><br><br><br><br>
    <div id="cajita">
<center> <b>Ha habido un error al registrarte. ¿Estas seguro de que no estas registrado ya?<br><br>
    <a href="registro.html"><b><n>Registro</a><br><br>
    <a href="login.html"><b><n>Login</a><br><br><div>'
    ;

}

?>
