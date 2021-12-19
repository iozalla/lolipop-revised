<?php session_start(); ?>
<link rel="stylesheet" type="text/css" href="style.css">

<?php
echo "<div id='cabecera'>
<center>
  <b><n><a class='active' href='index.php'>Inicio</a>    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <b><n><a href='editProfile.php'>Perfil</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <b><n><a href='anadirElemento.php'>A&ntildeadir Elemento</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <b><n><a href='verElementos.php'>Ver Elemento</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<b><n><a href='cerrarSesion.php'>Cerrar Sesion</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp



  </center>
</div>
<head><link rel='stylesheet' type='text/css' href='style.css'></head>
<div id='cajita'>
<center>";
error_reporting(E_ALL);
ini_set('display_errors', 1);

  // phpinfo();
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

  $sql = "SELECT * FROM `elementos` WHERE mail=?; ";
  $stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql
  $stmt->bind_param("s", $_SESSION['username']);//asigna los parametros
  $stmt->execute();
  $result = $stmt->get_result(); // conseguir el resultado sql
  while ($row = mysqli_fetch_array($result)) {
    $edad=$row['edad'];
    $gustos=$row['gustos'];
    $id=$row['id'];
    $altura=$row['altura'];
    $peso=$row['peso'];
    $sexo=$row['sexo'];

    //importante cuando haga lo de editar hay que mirar si quien va a editar el elemento es la persona que lo ha creado, solo en ese caso sera capaz de editarlo, si no se podria editar algo que no te pertenece ya que solo se miraria el id del elemento que se quiere editar
    echo
    "<body style='background-color:#887162;'>
    <form><tr>
      <n><b>Estos son tus anuncios, puedes editarlos o borrarlos si lo deseas.</n><b><br><br>
      <n><b>GUSTOS(separados por coma):<br></n></b><textarea id='fgustos' name='fgustos' rows='4' cols='50'>$gustos</textarea><br><br>
      <b><n>EDAD:        <input type='text' id='fedad' name='fedad' value='$edad'><br><br>
      <th><b><n>ALTURA (cm):</th>    <th><input type='text' id='faltura' name='faltura' value=$altura>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
      <th><b><n>PESO (kg):</th>   <th><input type='text' id='fpeso' name='fpeso' value=$peso></th><br><br>
      <th><b><n>SEXO: </th>   <th><input type='text' id='fsexo' name='fsexo' value=$sexo></th>


      <script type='text/javascript' src='editarElemento.js'></script>
      <button type='button' onclick='confirmar(fgustos,fedad,faltura,fpeso,fsexo,$id,0)'>Editar</button></th>
      <button type='button' onclick='confirmar(fgustos,fedad,faltura,fpeso,fsexo,$id,1)'>Borrar</button></th>
      </form>

      <br>______________________________________________________________
      </tr><br><br>
      <div>";
    }



}else{
      echo 'No estas loggeado. <a href="registro.html><b><n>Login</a><br><br>';
}
echo '</div></center>';

?>
