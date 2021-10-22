<?php session_start(); ?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo '<div id="cajita">';
echo '<center>';
echo '<link rel="stylesheet" type="text/css" href="style.css">';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $hostname = "db";
    $username = "admin";
    $password = "test";
    $db = "database";

    $conn = mysqli_connect($hostname,$username,$password,$db);
    if ($conn->connect_error) {die("Database connection failed: " . $conn->connect_error);}

    $sql =  "DELETE from elementos WHERE id = ? and mail=?;";

    $stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql
    $stmt->bind_param("ss", $_GET["fid"],$_SESSION["username"]);//asigna los parametros


    if ($stmt->execute()) {//ejecuta la instruccion sql
      echo "SUCCESS";
      echo '<script>
              window.location = "verElementos.php";
              alert("borrado correctamente")
            </script>';






    } else {

        print_r($stmt->error);
    }




  }else {
    echo 'No estas loggeado. <a href="registro.html><b><n>Login</a><br><br>';
}
echo '</div>';



?>
