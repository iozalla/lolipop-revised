<?php session_start(); ?>
<?php

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

if ($_GET['follow']=="True"){

  $sql = "INSERT INTO seguidores (followerMail, followedMail) VALUES (?,?); ";

  $stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql
  $stmt->bind_param("ss", $_SESSION['username'],$_GET["fmail"]);//asigna los parametros


  if ($stmt->execute()) {//ejecuta la instruccion sql


      echo ' rows updated properly!';

      echo '

      <script>
        window.location = "explore.php";
        alert("followed")
      </script>';
  } else {

      print_r($stmt->error);
  }
}else {
  $sql = "DELETE FROM seguidores WHERE followerMail=? and followedMail=?; ";

  $stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql
  $stmt->bind_param("ss", $_SESSION['username'],$_GET["fmail"]);//asigna los parametros


  if ($stmt->execute()) {//ejecuta la instruccion sql


      echo ' rows updated properly!';

      echo '

      <script>
        window.location = "explore.php";
        alert("unfollowed")
      </script>';
    }
}

?>
