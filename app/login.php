<?php


  // phpinfo();
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }


//para meter los datos del registro se comprueba si ya existe el usuario


 //https://phpdelusions.net/mysqli_examples/insert

#$sql = "INSERT INTO usuarios (nombre,apellidos, mail, contrasena) VALUES ('n1','ap',,'ail','contra'); "
$sql = "SELECT contrasena FROM `usuarios` WHERE mail=?; ";
$stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql

$stmt->bind_param("s", $_GET["fmail"]);//asigna los parametros

if ($stmt->execute()) {//ejecuta la instruccion sql


    $result = $stmt->get_result(); // conseguir el resultado sql
    $contrasena1 = $result->fetch_assoc(); //devuelve un array con el resultado
    if (password_verify($_GET["fcontrasena"],$contrasena1['contrasena'])) {
    echo 'Contraseña correcta';
    } else {
    echo 'Mail o contrasena incorrecta!';
  }

    print_r(array_values($contrasena1));

} else {

    print_r($stmt->error);
}




?>
