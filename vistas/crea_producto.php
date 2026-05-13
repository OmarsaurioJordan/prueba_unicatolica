<?php
require("../utils/sesion.php");
privado();

include("../utils/conexion.php");
$is_editar = isset($_GET['id']);

$producto['producto_id'] = 0;
$producto['nombre'] = "";
$producto['descripcion'] = "";
$producto['precio'] = "";
$producto['stock'] = "";

if ($is_editar) {
    $sql = "SELECT producto_id, nombre, descripcion, precio, stock FROM productos WHERE producto_id = ?";
    $res = doQuery($sql, [$_GET['id']]);
    if (count($res[1]) == 1) {
        $producto = $res[1][0];
    }
    else {
        $is_editar = False;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omi Unicat</title>
    <title>
        <?php echo $is_editar ? "Nuevo Producto" : "Editar Producto"; ?>
    </title>
    <link rel="stylesheet" href="../estilos/interno.css">
</head>

<body>

    <header class="header">
        <div class="header-titulo">
            <?php echo $is_editar ? "Editar " : "Crear "; ?>Producto Omi Unicat
        </div>

        <div class="header-centro">
            <a href="factupublicas.php" class="btn-header">Ver Facturas</a>
        </div>

        <div class="header-derecha">
            <span class="usuario-logeado"><?php echo $_SESSION['usuario']; ?></span>
            <a href="../controladores/logout.php" class="btn-logout">Logout</a>
        </div>
    </header>

    <div class="contenedor-formulario">
        <div class="card-formulario">

            <h2><?php echo $is_editar ? "Editar Producto" : "Nuevo Producto"; ?></h2>

            <form action="../controladores/productos.php" method="POST">

                <input type="hidden" name="id" value="<?php echo $producto['producto_id']; ?>">

                <div class="grupo-form">
                    <label>Nombre</label>
                    <input type="text" name="nombre" required value="<?php echo $producto['nombre']; ?>">
                </div>

                <div class="grupo-form">
                    <label>Descripción</label>
                    <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
                </div>

                <div class="grupo-form">
                    <label>Precio</label>
                    <input type="number" name="precio" step="0.01" required value="<?php echo $producto['precio']; ?>">
                </div>

                <div class="grupo-form">
                    <label>Stock</label>
                    <input type="number" name="stock" required value="<?php echo $producto['stock']; ?>">
                </div>

                <div class="acciones-form">
                    <a href="productos.php" class="btn-volver">Volver</a>

                    <button type="submit" class="btn-guardar">
                        <?php echo $is_editar ? "Guardar Cambios" : "Crear Producto"; ?>
                    </button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>