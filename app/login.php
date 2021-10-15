<?php

session_start();//para poder acceder a las variables de la sesion
  // phpinfo();
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }








$sql = "SELECT contrasena FROM `usuarios` WHERE mail=?; ";
$stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql

$stmt->bind_param("s", $_GET["fmail"]);//asigna los parametros

if ($stmt->execute()) {//ejecuta la instruccion sql


    $result = $stmt->get_result(); // conseguir el resultado sql
    $contrasena1 = $result->fetch_assoc(); //devuelve un array con el resultado
    if (password_verify($_GET["fcontrasena"],$contrasena1['contrasena'])) {
    echo 'Contraseña correcta';
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $_GET["fmail"];
    echo '<script>
            window.location = "profile.php";
            alert("success")
          </script>';
    } else {
    echo 'Mail o contrasena incorrecta!';
  }



} else {

    print_r($stmt->error);
    echo '<script>
            location.reload();
          </script>';
}




?>
