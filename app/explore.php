<?php session_start(); ?>
<?php

  // phpinfo();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }



  $query = mysqli_query($conn, "SELECT * FROM usuarios")
     or die (mysqli_error($conn));

  while ($row = mysqli_fetch_array($query)) {
    echo
     "<tr>
      <td>{$row['nombre']}</td>
      <td>{$row['gustos']}</td>

     </tr><br>";

  }
}else{
      echo 'No estas loggeado. <a href="registro.html><b><n>Login</a><br><br>';
}
echo '</div>';

?>
