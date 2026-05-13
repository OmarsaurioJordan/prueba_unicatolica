<?php
require("../utils/sesion.php");
no_login();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/externo.css">
    <title>Omi Unicat</title>
</head>
<body>
    <div class="contenedor-login">

        <h1>Login Omi Unicat</h1>

        <form action="../controladores/login.php" method="POST">

            <div class="grupo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="grupo">
                <label for="password">Clave</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-login">Ingresar</button>

        </form>

        <form action="factupublicas.php" method="GET">

            <button type="submit" class="btn btn-facturas">Ver Facturas</button>

        </form>

        <br><p>Usa ensayo@gmail.com y 123456</p>

    </div>
</body>
</html>