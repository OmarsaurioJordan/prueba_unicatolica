<?php
include("../utils/sesion.php");
no_login();

include("../utils/conexion.php");

$email = $_POST['email'];
$password = setClave($_POST['password']);

$sql = "SELECT nombre FROM usuarios WHERE email = ? AND password = ?";
$res = doQuery($sql, [$email, $password]);

if(count($res[1]) > 0) {

    $nombre = $res[1][0]['nombre'];
    $_SESSION['usuario'] = $nombre;
}

header("Location: ../index.php");
exit();
?>