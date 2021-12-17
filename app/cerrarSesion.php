<?php
    session_start();
    echo 'HAS CERRADO LA SESION';
    unset($_SESSION['loggedin']);
    unset($_SESSION['username']);
    $_SESSION = array();
    session_destroy();
    echo '<script>window.location = "index.php";</script>';

?>
