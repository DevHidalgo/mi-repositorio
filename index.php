<?php
/**
 * Listado de estudiantes registrados.
 */
require_once __DIR__ . '/config/db.php';

$estudiantes = [];
$error = '';

try {
    $conexion = obtenerConexion();
    $sentencia = $conexion->query(
        'SELECT id, matricula, nombre, apellido, correo, carrera, fecha_ingreso
         FROM estudiantes
         ORDER BY id ASC'
    );
    $estudiantes = $sentencia->fetchAll();
} catch (PDOException $e) {
    $error = 'No se pudo obtener el listado de estudiantes: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de estudiantes</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="contenedor">
    <h1>Estudiantes registrados</h1>

    <?php if ($error !== ''): ?>
        <p class="alerta alerta-error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <table class="tabla">
        <thead>
        <tr>
            <th>ID</th>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Carrera</th>
            <th>Fecha de ingreso</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($estudiantes as $estudiante): ?>
            <tr>
                <td><?= htmlspecialchars((string) $estudiante['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($estudiante['matricula'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($estudiante['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($estudiante['apellido'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($estudiante['correo'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($estudiante['carrera'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($estudiante['fecha_ingreso'], ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
