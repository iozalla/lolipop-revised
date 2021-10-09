<?php
  echo '<html lang="es">';

  echo '<link rel="stylesheet" type="text/css" href="style.css">';
  echo '
  <div id="cajita">
      <center>
      <a href="registro.html">Registro</a><br><br>
      <a href="login.html">Login</a>
      </center>
  ';
  

  // phpinfo();
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
    <td>{$row['id']}</td>
    <td>{$row['nombre']}</td>
    <td>asdasd</td><br>
   </tr>
   ";


}
echo'</div>'

?>
