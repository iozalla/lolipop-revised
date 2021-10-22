<?php session_start(); ?>

<?php
echo "<div id='cabecera'>
<center>
  <b><n><a class='active' href='index.php'>Inicio</a>    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

  <b><n><a href='editProfile.php'>Perfil</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <b><n><a href='anadirElemento.html'>A&ntildeadir Elemento</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <b><n><a href='verElementos.php'>Ver Elemento</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


  </center>
</div>";
echo '<div id="cajita">';
echo '<center>';
echo '<link rel="stylesheet" type="text/css" href="style.css">';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $hostname = "db";
    $username = "admin";
    $password = "test";
    $db = "database";

    $conn = mysqli_connect($hostname,$username,$password,$db);
    if ($conn->connect_error) {
      die("Database connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM `usuarios` WHERE mail=?; ";
    $stmt= $conn->prepare($sql);//prepara el texto sql para que no haya inyecciones sql

    $stmt->bind_param("s", $_SESSION['username']);//asigna los parametros
  if ($stmt->execute()) {//ejecuta la instruccion sql
        $result = $stmt->get_result(); // conseguir el resultado sql
        $info = $result->fetch_assoc(); //devuelve un array con el resultado
        $nombre=$info['nombre'];
        $apellido=$info['apellidos'];
        $mail=$info['mail'];
        $telefono=$info['telefono'];
        $dni=$info['DNI'];
        $gustos=$info['gustos'];
        $fecha=$info['fechaNac'];
        $sexo=$info['sexo'];
        $peso=$info['peso'];
        $altura=$info['altura'];
        echo "Este es tu perfil " . $nombre . ". Aqui podras consultar tus datos y editarlos si lo deseas.\n";

        echo "
        <html lang='es'>
        <head>
          <link rel='icon' href='images/logo.png'>
          <link rel='stylesheet' type='text/css' href='style.css'>
            <title>
              Lolipop
            </title>
        </head>
      <body background='images/fondo.gif'>
        <form>
            <div id='cajita'>
                <center><t> Lol<t class='c'>ipop</t></b></t><br><br>
                  <img src='images/logo.png' alt='Lolipop Logo' style='width:70px;height:70px';><br><br>
                <center>
                <b><n>E-MAIL: '$mail'<br><br>
                <table>
                <tr>
                <th><b><n>NOMBRE:</th>    <th><input type='text' id='fnombre' name='fnombre' value='$nombre'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th><b><n>APELLIDOS:</th>   <th><input type='text' id='fapellidos' name='fapellidos' value='$apellido'></th>
                </table><br>
                <center>
                <b><n>DNI:     <br>    <input type='text' id='fdni' name='fdni' value='$dni'><br><br>
                TELEFONO:  <br>  <input type='tel' id='ftelefono' name='ftelefono' value='$telefono'><br><br>
                FECHA NACIMIENTO:<br>  </n></b>   <input type='tel' id='ffechanac' name='ffechanac' value='$fecha'><br><br>
                <th><b><n>PESO(kg):</th>    <th><input type='text' id='fpeso' name='fpeso' value='$peso'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th><b><n>ALTURA(cm):</th>   <th><input type='text' id='faltura' name='faltura' value='$altura'></th><br><br>
                GUSTOS(separados por coma):<br></n></b><textarea id='fgustos' name='fgustos' rows='4' cols='50'>$gustos</textarea><br><br>
                <table>
                <tr>
                SEXO: $sexo <br> <br>
                SEXUALIDAD: <br>
                <td><input type='radio' name='fsexualidad' value='hetero' checked><n> Hetero</n><br></td>
                </tr>
                <tr>
                <td><input type='radio' name='fsexualidad' value='bi'><n> Bi</n><br></td>
                </tr>
                <tr>
                <td><input type='radio' name='fsexualidad' value='homo'><n> Homo</n><br></td>
                </tr>
                <script type='text/javascript' src='procesarProfile.js'></script>
              <th>  <button type='button' onclick='comprobarDatos(fnombre,fapellidos,fdni,ftelefono,ffechanac,fsexualidad,fgustos,fpeso,faltura)'>ActualizarDatos</button></th>
      </table>
          </div>
        </form>
        <br>
        <center>
        OTROS USUARIOS:<br>
        <iframe src='/explore.php' name='targetframe' allowTransparency='true' scrolling='yes' width='600' length='800' frameborder='0' >
        </iframe>
        </center>
      <div>
      </body>
      ";

  }

} else {
    echo 'No estas loggeado. <a href="registro.html><b><n>Login</a><br><br>';
}
echo '</div>';



?>
