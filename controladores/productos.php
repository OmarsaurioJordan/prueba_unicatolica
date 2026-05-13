<?php
include("../utils/sesion.php");
privado();

include("../utils/conexion.php");

if (isset($_GET['delete']) && isset($_GET['id'])) {
    $sql = "UPDATE productos SET estado = 2 WHERE producto_id = ?";
    doQuery($sql, [$_GET['id']]);
}
else if ($_POST['id'] == 0) {
    $sql = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)";
    doQuery($sql, [$_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock']]);
}
else {
    $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ? WHERE producto_id = ?";
    doQuery($sql, [$_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $_POST['id']]);
}

header("Location: ../vistas/productos.php");
exit();
?>