<?php
  echo '<h1>Yeah, it works!<h1>';

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
$sql = "INSERT INTO users (name, email, password) VALUES (?,?,?)";
$stmt= $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $password);
$stmt->execute();

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['id']}</td>
    <td>{$row['nombre']}</td>
    <td>asdasd</td><br>
   </tr>";


}

?>
