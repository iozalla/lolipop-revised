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
$sql = "INSERT INTO usuarios (nombre,apellidos, mail, contrasena) VALUES (?,?,?,?); ";
$stmt= $conn->prepare($sql);
print($_GET["fnombre"]);
$stmt->bind_param("ssss", $_GET["fnombre"],$_GET["fapellidos"], $_GET["fmail"], $_GET["fcontrasena"]);


if ($stmt->execute()) {
    // ok :-)
    $count = $stmt->rowCount();
    echo count . ' rows updated properly!';
} else {
    // KO :-(
    print_r($stmt->error);
}

?>
