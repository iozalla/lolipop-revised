<?php session_start(); ?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo '<div id="cajita">';
echo '<center>';
echo '<link rel="stylesheet" type="text/css" href="style.css">';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  if(isset($_SESSION['timeout']) ) {
    $inactive=60;
    $session_life = time() - $_SESSION['timeout'];
    //echo "$session_life";
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
    if ($conn->connect_error) {die("Database connection failed: " . $conn->connect_error);}
    $fgustos=htmlspecialchars($_GET["fgustos"]); //Sanitizamos el input del usuario para evitar ataques XSS alamcenados
    $fsexo=htmlspecialchars($_GET["fsexo"]); //Sanitizamos el input del usuario para evitar ataques XSS alamcenados
    $faltura=htmlspecialchars($_GET["faltura"]);
    $fpeso=htmlspecialchars($_GET["fpeso"]);
    $fedad=htmlspecialchars($_GET["fedad"]);

    $sql =  "UPDATE elementos SET gustos=?,peso=?,altura=?,sexo=?,edad=? WHERE id = ? and mail=?;";

    $stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql
    $stmt->bind_param("sssssss", $fgustos,$fpeso,$faltura,$fsexo,$fedad,$_GET["fid"],$_SESSION["username"]);//asigna los parametros


    if ($stmt->execute()) {//ejecuta la instruccion sql
      echo "SUCCESS";
      echo '<script>
              window.location = "verElementos.php";
              alert("Editado correctamente");
            </script>';






    } else {

        print_r($stmt->error);
    }




  }else {
    echo 'No estas loggeado. <a href="registro.html><b><n>Login</a><br><br>';
}
echo '</div>';



?>
