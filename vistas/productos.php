<?php
require("../utils/sesion.php");
privado();

include("../utils/conexion.php");

$sql = "SELECT producto_id, nombre, descripcion, precio, stock FROM productos WHERE estado = ?";
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
            Productos Omi Unicat
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
            <a href="clientes.php" class="tab">Clientes</a>
            <a href="productos.php" class="tab active">*Productos</a>
            <a href="facturas.php" class="tab">Facturas</a>
        </aside>

        <main class="contenido">

            <div class="barra-superior">
                <h2>Productos</h2>
                <a href="crea_producto.php" class="btn-crear">Nuevo Producto</a>
            </div>

            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <?php for ($i = 0; $i < count($res[1]); $i++) {
                        $producto = $res[1][$i];
                        echo "<tr>";
                            echo "<td>". $producto["producto_id"] ."</td>";
                            echo "<td>". $producto["nombre"] ."</td>";
                            echo "<td>". $producto["descripcion"] ."</td>";
                            echo "<td>". $producto["precio"] ."</td>";
                            echo "<td>". $producto["stock"] ."</td>";
                            echo "<td>";
                                echo "<a href='crea_producto.php?id=" .
                                    $producto["producto_id"] . "' class='btn-editar'>Editar</a>";
                                echo "<label>...</label>";
                                echo "<a href='../controladores/productos.php?id=" .
                                    $producto["producto_id"] . "&delete=1' class='btn-eliminar'>Eliminar</a>";
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