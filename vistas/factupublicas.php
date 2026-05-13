<?php
require("../utils/sesion.php");
include("../utils/conexion.php");

$sql = "SELECT f.factura_id AS id, c.nombre AS nombre, p.nombre AS producto, f.precio_unitario AS precio, f.cantidad AS cantidad, f.fecha_registro AS fecha, f.precio_unitario * f.cantidad AS total
FROM facturas f
LEFT JOIN clientes c ON f.cliente_id = c.cliente_id
LEFT JOIN productos p ON f.producto_id = p.producto_id
WHERE c.estado = 1";
$res = doQuery($sql, []);
$facturas = $res[1];
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
            Facturas Omi Unicat
        </div>

        <div class="header-centro">
            <a href="factupublicas.php" class="btn-header">Ver Facturas</a>
        </div>

        <div class="header-derecha">
            <span class="usuario-logeado"><?php echo sesion_name(); ?></span>
            <a href="../controladores/logout.php" class="btn-logout">Logout</a>
        </div>
    </header>

    <div class="contenedor-principal">

        <aside class="sidebar">
            <a href="clientes.php" class="tab">Clientes</a>
            <a href="productos.php" class="tab">Productos</a>
            <a href="facturas.php" class="tab">Facturas</a>
        </aside>

        <main class="contenido">

            <div class="barra-superior">
                <h2>Facturas</h2>
                <a href="login.php" class="btn-volver">Volver</a>
            </div>

            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Precio Unit.</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Fecha</th>
                    </tr>
                </thead>

                <tbody>

                    <?php for ($i = 0; $i < count($facturas); $i++) {
                        $factura = $facturas[$i];
                        echo "<tr>";
                            echo "<td>". $factura["id"] ."</td>";
                            echo "<td>". $factura["nombre"] ."</td>";
                            echo "<td>". $factura["producto"] ."</td>";
                            echo "<td>$ ". $factura["precio"] ."</td>";
                            echo "<td>". $factura["cantidad"] ."</td>";
                            echo "<td>$ ". $factura["total"] ."</td>";
                            echo "<td>". $factura["fecha"] ."</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>

            </table>

        </main>

    </div>

</body>
</html>
