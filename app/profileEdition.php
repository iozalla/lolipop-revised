<?php
  session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }





 //https://phpdelusions.net/mysqli_examples/insert


$sql =  "UPDATE usuarios SET nombre = ?, apellidos= ?,sexualidad=?,DNI=?,telefono=?,fechaNac=?,gustos=?,peso=?,altura=? WHERE mail = ?;";

$stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql
$stmt->bind_param("ssssssssss", $_GET["fnombre"],$_GET["fapellidos"], $_GET["fsexualidad"], $_GET["fdni"], $_GET["ftelefono"], $_GET["ffechanac"], $_GET["fgustos"],$_GET["fpeso"],$_GET["faltura"],$_SESSION["username"]);//asigna los parametros


if ($stmt->execute()) {//ejecuta la instruccion sql



    echo '

<script>
  window.location = "editProfile.php";
  alert("datos editados correctamente")
</script>';


} else {

    print_r($stmt->error);
}

?>
