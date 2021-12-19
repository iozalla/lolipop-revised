<link rel="stylesheet" type="text/css" href="style.css">

<?php


  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }


 $clave = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';

 function encrypt($tarjeta, $clave) {
     $clave_b64 = base64_decode($clave); //decodificamos en base 64
     $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')); #creamos un vector de inicializacion aleatorio

     $encriptado = openssl_encrypt($tarjeta, 'aes-256-cbc', $clave_b64, 0, $iv); #encriptamos la tarjeta
     //echo "$encriptado . '::' . $iv";
     return base64_encode($encriptado . '::' . $iv);#devolvemos la tarjeta encriptada y el vector de inicializacion separados por los caraacteres "::"
}
  $tarjetaEncriptada=encrypt($_GET['ftarjeta'], $clave);


  function decrypt($tarjetaEncriptada, $clave) {
      $clave_b64 = base64_decode($clave);#codificamos clave en b64
      $datos = array_pad(explode('::', base64_decode($tarjetaEncriptada), 2),2,null);#decodificamos la tarjeta encriptada y separamos la tarjeta y el vector de inicializacion
      list($encrypted_data, $iv)= array_pad(explode('::', base64_decode($tarjetaEncriptada), 2),2,null);
      //printf($datos[0]);
      //printf($datos[1]);

      //printf(openssl_decrypt($datos[0], 'aes-256-cbc', $clave, 0, $datos[1]));
      echo "(";
      printf(openssl_decrypt($encrypted_data, 'aes-256-cbc', $clave_b64, 0, $iv  ));
      echo ")";
      //print_r(openssl_error_string());

      return openssl_decrypt($encrypted_data, 'aes-256-cbc', $clave_b64, 0, $iv);

  }
  $tarjetaDesencriptada=decrypt($tarjetaEncriptada,$clave);

   //https://phpdelusions.net/mysqli_examples/insert


  $contrasenaHasheada=password_hash($_GET["fcontrasena"],PASSWORD_DEFAULT); //esto se usa para hashear la contraseña https://www.php.net/manual/en/function.password-hash.php
$sql = "INSERT INTO usuarios (nombre, apellidos, mail, contrasena, DNI, telefono,fechaNac,sexo,tarjeta) VALUES (?,?,?,?,?,?,?,?,?); ";

$stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql
$stmt->bind_param("sssssssss", $_GET["fnombre"],$_GET["fapellidos"], $_GET["fmail"], $contrasenaHasheada, $_GET["fdni"], $_GET["ftelefono"], $_GET["ffechanac"], $_GET["fsexo"],$tarjetaEncriptada);//asigna los parametros


if ($stmt->execute()) {//ejecuta la instruccion sql


    echo ' rows updated properly!';

    echo '<script>window.location = "login.html";</script>';
} else {
  print_r($stmt->error);
    echo '<body style="background-color:#887162;">
    <br><br><br><br><br><br><br>
    <div id="cajita">
<center> <b>Ha habido un error al registrarte. ¿Estas seguro de que no estas registrado ya?<br><br>
    <a href="registro.html"><b><n>Registro</a><br><br>
    <a href="login.html"><b><n>Login</a><br><br><div>'
    ;

}

?>
