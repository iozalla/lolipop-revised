<?php
  session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
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
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }





 //https://phpdelusions.net/mysqli_examples/insert
$clave='KE^A&QgRDxkZJej_b7Uhx^t4=B!Y2%RMZ%=234LcXRdXHBcrv!';
$clave = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO'; //usaremos esta clave para encriptar y desencriptar todos los numeros de tarjetas
function encrypt($tarjeta, $clave) {
 $clave_b64 = base64_decode($clave); //decodificamos en base 64
 $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')); #creamos un vector de inicializacion aleatorio
 $encriptado = openssl_encrypt($tarjeta, 'aes-256-cbc', $clave_b64, 0, $iv); #encriptamos la tarjeta
 return base64_encode($encriptado . '::' . $iv);#devolvemos la tarjeta encriptada y el vector de inicializacion separados por los caraacteres "::"
}
$tarjetaEncriptada=encrypt($_GET["ftarjeta"], $clave);
#printf($tarjetaEncriptada);
$tarjetaEncriptada=encrypt($_GET["ftarjeta"], $clave);
$fgustos=htmlspecialchars($_GET["fgustos"]); //Sanitizamos el input del usuario para evitar ataques XSS alamcenados
$fnombre=htmlspecialchars($_GET["fnombre"]);
$fapellidos=htmlspecialchars($_GET["fapellidos"]);
$fsexualidad=htmlspecialchars($_GET["fsexualidad"]);
$fdni=htmlspecialchars($_GET["fdni"]);
$ftelefono=htmlspecialchars($_GET["ftelefono"]);
$ffechanac=htmlspecialchars($_GET["ffechanac"]);
//$ffechanac=htmlspecialchars($_GET["ffechanac"]);
$sql = "UPDATE usuarios SET nombre = ?, apellidos =?, sexualidad = ?, DNI = ?, telefono = ?, fechaNac=?, gustos =?,peso=?, altura=?, tarjeta=? WHERE mail=?;";


$stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql
$stmt->bind_param("sssssssssss", $fnombre,$fapellidos, $fsexualidad, $fdni, $ftelefono, $ffechanac, $fgustos,$_GET["fpeso"],$_GET["faltura"],$tarjetaEncriptada,$_SESSION["username"]);//asigna los parametros



if ($stmt->execute()) {//ejecuta la instruccion sql



    echo '

<script>

  alert("datos editados correctamente")
  window.location = "editProfile.php";
</script>';


} else {

    print_r($stmt->error);
    print_r("<br><b>Asegurate de haber rellenado todos los datos");
}
}
?>
