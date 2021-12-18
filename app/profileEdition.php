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


$sql =  "UPDATE usuarios SET nombre = ?, apellidos= ?,sexualidad=?,DNI=?,telefono=?,fechaNac=?,gustos=?,peso=?,altura=?,tarjeta=? WHERE mail = ?;";

$stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql
$stmt->bind_param("ssssssssss", $_GET["fnombre"],$_GET["fapellidos"], $_GET["fsexualidad"], $_GET["fdni"], $_GET["ftelefono"], $_GET["ffechanac"], $_GET["fgustos"],$_GET["fpeso"],$_GET["faltura"],$_GET["ftarjeta"],$_SESSION["username"]);//asigna los parametros
$key='KE^A&QgRDxkZJej_b7Uhx^t4=B!Y2%RMZ%=234LcXRdXHBcrv!'
function encrypt($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

if ($stmt->execute()) {//ejecuta la instruccion sql



    echo '

<script>
  window.location = "editProfile.php";
  alert("datos editados correctamente")
</script>';


} else {

    print_r($stmt->error);
    print_r("<br><b>Asegurate de haber rellenado todos los datos");
}

?>
