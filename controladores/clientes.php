<?php
include("../utils/sesion.php");
privado();

include("../utils/conexion.php");

if (isset($_GET['delete']) && isset($_GET['id'])) {
    $sql = "UPDATE clientes SET estado = 2 WHERE cliente_id = ?";
    doQuery($sql, [$_GET['id']]);
}
else if ($_POST['id'] == 0) {
    $sql = "INSERT INTO clientes (nombre, direccion, telefono, email) VALUES (?, ?, ?, ?)";
    doQuery($sql, [$_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['email']]);
}
else {
    $sql = "UPDATE clientes SET nombre = ?, direccion = ?, telefono = ?, email = ? WHERE cliente_id = ?";
    doQuery($sql, [$_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['email'], $_POST['id']]);
}

header("Location: ../vistas/clientes.php");
exit();
?>