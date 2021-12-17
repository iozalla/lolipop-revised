<?php session_start();?>

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  if(isset($_SESSION['timeout']) ) {
    $inactive=60;
    $session_life = time() - $_SESSION['timeout'];
    echo "$session_life";
    if($session_life > $inactive)         {
      echo '<script>window.location = "cerrarSesion.php";</script>';
    }
  }
}

$_SESSION['timeout']=time();
printf($_session_life);
  echo '<html lang="es">';

  echo '<link rel="stylesheet" type="text/css" href="style.css">';
  echo '
  <head>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="style.css">
      <title>
        Lolipop
      </title>
  </head>
  <body background="images/fondo.gif">
  <form>
	<div id="cajita">
		<center><t> Lol<b><t class="c">ipop</t></b></t><br><br>
            	<img src="images/logo.png" alt="Lolipop Logo" style="width:70px;height:70px";><br><br>
          	</center>
	      <center>
	      <a href="registro.html"><b><n>Registro</a><br><br>
	      <a href="login.html"><b><n>Login</a><br><br>
        <a href="editProfile.php"><b><n>Perfil</a><br><br>
        <a href="anadirElemento.php"><b><n>A&ntildeadir elemento</a><br><br>
        <a href="verElementos.php"><b><n>Ver y Editar Elementos</a><br><br>
	      </center>
      </div>
  </form>
</body>
  ';



echo'</div>'

?>
