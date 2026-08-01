<?php
/**
 * Eliminacion de un estudiante con confirmacion previa.
 */
require_once __DIR__ . '/config/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$errores = [];
$estudiante = null;

if (!$id) {
    header('Location: index.php');
    exit;
}

try {
    $conexion = obtenerConexion();
    $sentencia = $conexion->prepare(
        'SELECT id, matricula, nombre, apellido, carrera
         FROM estudiantes
         WHERE id = :id'
    );
    $sentencia->execute([':id' => $id]);
    $estudiante = $sentencia->fetch();

    if (!$estudiante) {
        header('Location: index.php');
        exit;
    }
} catch (PDOException $e) {
    $errores[] = 'No se pudo cargar el estudiante: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar estudiante</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="contenedor">
    <h1>Eliminar estudiante</h1>

    <?php if (!empty($errores)): ?>
        <div class="alerta alerta-error">
            <?php foreach ($errores as $mensaje): ?>
                <div><?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($estudiante): ?>
        <p class="alerta alerta-error">
            Esta accion no se puede deshacer. Confirme que desea eliminar al siguiente estudiante:
        </p>

        <table class="tabla">
            <tr>
                <th>Matricula</th>
                <td><?= htmlspecialchars($estudiante['matricula'], ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><?= htmlspecialchars($estudiante['nombre'] . ' ' . $estudiante['apellido'], ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <th>Carrera</th>
                <td><?= htmlspecialchars($estudiante['carrera'], ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        </table>

        <form method="post" action="eliminar.php?id=<?= htmlspecialchars((string) $id, ENT_QUOTES, 'UTF-8') ?>">
            <div class="acciones">
                <button type="submit" class="boton boton-peligro">Si, eliminar</button>
                <a class="boton boton-secundario" href="index.php">Cancelar</a>
            </div>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
