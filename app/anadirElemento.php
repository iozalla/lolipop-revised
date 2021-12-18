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

  $_SESSION['timeout']=time();
  //printf($_session_life);
  echo '
  <html lang="es">
  <head>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="style.css">
      <title>
        Lolipop
      </title>
       <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  </head>

<body background="images/fondo.gif">
  <div id="cabecera">
  <center>
    <b><n><a class="active" href="index.php">Inicio</a>    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    <b><n><a href="editProfile.php">Perfil</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <b><n><a href="anadirElemento.php">A&ntildeadir Elemento</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <b><n><a href="verElementos.php">Ver Elemento</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <b><n><a href="cerrarSesion.php">Cerrar Sesion</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


    </center>
  </div>
  </div>
  <form>

      <div id="cajita">

          <center><t> Lol<b><t class="c">ipop</t></b></t><br><br>
            <img src="images/logo.png" alt="Lolipop Logo" style="width:70px;height:70px";><br><br>
          </center>
          <center><table>
            En esta pagina podras anunciar que tipo de persona estas buscando.<br><br>
          <n><b>¿Que buscas en una persona?:<br></n></b><textarea id="fgustos" name="fgustos" rows="4" cols="50"></textarea><br><br>
          <b><n>EDAD:     <br>    <input type="text" id="fedad" name="fedad"><br><br>
          <th><b><n>ALTURA (cm):</th>    <th><input type="text" id="faltura" name="faltura">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
          <th><b><n>PESO (kg):</th>   <th><input type="text" id="fpeso" name="fpeso"></th>

          <center>


<table>
          <br>SEXO:

          <tr>
          <td><input type="radio" name="fsexo" value="Hombre"> Hombre<br></td>
          </tr>
          <tr>
          <td><input type="radio" name="fsexo" value="Mujer"> Mujer<br></td>
          </tr>
          <tr>
          <td><input type="radio" name="fsexo" value="Indiferente"> Indiferente<br></td>
          </tr>


          <script type="text/javascript" src="anadirElemento.js"></script>
        <th>  <button type="button" onclick="anadir(fgustos,fpeso,faltura,fedad,fsexo)"> A&NtildeADIR </button></th>
</table>

    </div>
  </form>
</body>';

}
else{

      echo 'No estas loggeado. <a href="index.html><b><n>Login</a><br><br>';

}
?>
