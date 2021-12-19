<?php session_start();


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  if(isset($_SESSION['timeout']) ) {
    $inactive=60;
    $session_life = time() - $_SESSION['timeout'];
    echo "$session_life";
    if($session_life > $inactive)         {
      echo '<script>window.location = "cerrarSesion.php";</script>';
    }
  }

  $_SESSION['timeout']=time();
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }





 //https://phpdelusions.net/mysqli_examples/insert


$fgustos=htmlspecialchars($_GET["fgustos"]); //Sanitizamos el input del usuario para evitar ataques XSS alamcenados
$fsexo=htmlspecialchars($_GET["fsexo"]); //Sanitizamos el input del usuario para evitar ataques XSS alamcenados
$faltura=htmlspecialchars($_GET["faltura"]);
$fpeso=htmlspecialchars($_GET["fpeso"]);
$sql = "INSERT INTO elementos (mail,gustos, edad, altura, peso, sexo) VALUES (?,?,?,?,?,?); ";

$stmt= $conn->prepare($sql);//prepara el texto sql para que no haya i  nyecciones sql
$stmt->bind_param("ssssss",$_SESSION['username'], $fgustos ,$_GET["fedad"], $faltura, $fpeso, $fsexo);//asigna los parametros
$gustos=htmlspecialchars($_GET["fgustos"]);

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
