<?php session_start();
$inactive = 12;
$session_life = time() - $_session['timeout'];
if($session_life > $inactive) {
   header("Location: cerrarSesion.php");
}
$_session['timeout']=time();
?>
<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }





 //https://phpdelusions.net/mysqli_examples/insert


$sql = "INSERT INTO elementos (mail,gustos, edad, altura, peso, sexo) VALUES (?,?,?,?,?,?); ";

$stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql
$stmt->bind_param("ssssss",$_SESSION['username'], $_GET["fgustos"],$_GET["fedad"], $_GET["faltura"], $_GET["fpeso"], $_GET["fsexo"]);//asigna los parametros


if ($stmt->execute()) {//ejecuta la instruccion sql


    echo ' elemento anadido correctamente';

    echo '

    <script>
      window.location = "verElementos.php";

    </script>';
} else {

    print_r("Datos Incorrectos");
}
}
else{echo '
  <script>
    window.location = "login.html";

  </script>';
}

?>
