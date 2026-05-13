<?php
require("../utils/sesion.php");
privado();

include("../utils/conexion.php");
$is_editar = isset($_GET['id']);

$cliente['cliente_id'] = 0;
$cliente['nombre'] = "";
$cliente['direccion'] = "";
$cliente['telefono'] = "";
$cliente['email'] = "";

if ($is_editar) {
    $sql = "SELECT cliente_id, nombre, direccion, telefono, email FROM clientes WHERE cliente_id = ?";
    $res = doQuery($sql, [$_GET['id']]);
    if (count($res[1]) == 1) {
        $cliente = $res[1][0];
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
        <?php echo $is_editar ? "Nuevo Cliente" : "Editar Cliente"; ?>
    </title>
    <link rel="stylesheet" href="../estilos/interno.css">
</head>

<body>

    <header class="header">
        <div class="header-titulo">
            <?php echo $is_editar ? "Editar " : "Crear "; ?>Cliente Omi Unicat
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

            <h2><?php echo $is_editar ? "Editar Cliente" : "Nuevo Cliente"; ?></h2>

            <form action="../controladores/clientes.php" method="POST">

                <input type="hidden" name="id" value="<?php echo $cliente['cliente_id']; ?>">

                <div class="grupo-form">
                    <label> Nombre </label>
                    <input type="text" name="nombre" required value="<?php echo $cliente['nombre']; ?>">
                </div>

                <div class="grupo-form">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" required value="<?php echo $cliente['telefono']; ?>">
                </div>

                <div class="grupo-form">
                    <label>Email</label>
                    <input type="email" name="email" required value="<?php echo $cliente['email']; ?>">
                </div>

                <div class="grupo-form">
                    <label>Dirección</label>
                    <input type="text" name="direccion" required value="<?php echo $cliente['direccion']; ?>">
                </div>

                <div class="acciones-form">
                    <a href="clientes.php" class="btn-volver">Volver</a>

                    <button type="submit" class="btn-guardar">
                        <?php echo $is_editar ? "Guardar Cambios" : "Crear Cliente"; ?>
                    </button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>