<?php session_start(); ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

  // phpinfo();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {//si el usuario esta registrado puede acceder a la pagina
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
    "
    <form method='POST'  action='editarElemento.php?fid=$id'><tr>
      <td>gustos: </td>
      <n><b>GUSTOS(separados por coma):<br></n></b><textarea id='fgustos' name='fgustos' rows='4' cols='50'>$gustos</textarea><br><br>
      <b><n>EDAD:        <input type='text' id='fedad' name='fedad' value='$edad'>
      <th><b><n>ALTURA:</th>    <th><input type='text' id='faltura' name='faltura' value=$altura>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
      <th><b><n>PESO:</th>   <th><input type='text' id='fpeso' name='fpeso' value=$peso></th>
      <th><b><n>PESO:</th>   <th><input type='text' id='fsexo' name='fsexo' value=$sexo></th>




      <input type='submit' value='editar'>
      </form>

      <br>______________________________________________________________
      </tr><br><br>";
    }



}else{
      echo 'No estas loggeado. <a href="registro.html><b><n>Login</a><br><br>';
}
echo '</div>';

?>
