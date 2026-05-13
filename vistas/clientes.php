<?php
require("../utils/sesion.php");
privado();

include("../utils/conexion.php");

$sql = "SELECT cliente_id, nombre, direccion, telefono, email, fecha_registro FROM clientes WHERE estado = ?";
$res = doQuery($sql, [1]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omi Unicat</title>
    <link rel="stylesheet" href="../estilos/interno.css">
</head>

<body>

    <header class="header">
        <div class="header-titulo">
            Clientes Omi Unicat
        </div>

        <div class="header-centro">
            <a href="factupublicas.php" class="btn-header">Ver Facturas</a>
        </div>

        <div class="header-derecha">
            <span class="usuario-logeado"><?php echo $_SESSION['usuario']; ?></span>
            <a href="../controladores/logout.php" class="btn-logout">Logout</a>
        </div>
    </header>

    <div class="contenedor-principal">

        <aside class="sidebar">
            <a href="clientes.php" class="tab active">*Clientes</a>
            <a href="productos.php" class="tab">Productos</a>
            <a href="facturas.php" class="tab">Facturas</a>
        </aside>

        <main class="contenido">

            <div class="barra-superior">
                <h2>Clientes</h2>
                <a href="crea_cliente.php" class="btn-crear">Nuevo Cliente</a>
            </div>

            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <?php for ($i = 0; $i < count($res[1]); $i++) {
                        $cliente = $res[1][$i];
                        echo "<tr>";
                            echo "<td>". $cliente["cliente_id"] ."</td>";
                            echo "<td>". $cliente["nombre"] ."</td>";
                            echo "<td>". $cliente["telefono"] ."</td>";
                            echo "<td>". $cliente["email"] ."</td>";
                            echo "<td>". $cliente["direccion"] ."</td>";
                            echo "<td>". $cliente["fecha_registro"] ."</td>";
                            echo "<td>";
                                echo "<a href='crea_cliente.php?id=" .
                                    $cliente["cliente_id"] . "' class='btn-editar'>Editar</a>";
                                echo "<label>...</label>";
                                echo "<a href='../controladores/clientes.php?id=" .
                                    $cliente["cliente_id"] . "&delete=1' class='btn-eliminar'>Eliminar</a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>

            </table>

        </main>

    </div>

</body>
</html>