<?php
/**
 * Registro de un nuevo estudiante.
 */
require_once __DIR__ . '/config/db.php';

$datos = [
    'matricula'     => '',
    'nombre'        => '',
    'apellido'      => '',
    'correo'        => '',
    'carrera'       => '',
    'fecha_ingreso' => '',
];
$errores = [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar estudiante</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="contenedor">
    <h1>Registrar estudiante</h1>

    <?php if (!empty($errores)): ?>
        <div class="alerta alerta-error">
            <?php foreach ($errores as $mensaje): ?>
                <div><?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form class="formulario" method="post" action="crear.php">
        <label for="matricula">Matricula</label>
        <input type="text" id="matricula" name="matricula" maxlength="20"
               value="<?= htmlspecialchars($datos['matricula'], ENT_QUOTES, 'UTF-8') ?>">

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" maxlength="100"
               value="<?= htmlspecialchars($datos['nombre'], ENT_QUOTES, 'UTF-8') ?>">

        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" maxlength="100"
               value="<?= htmlspecialchars($datos['apellido'], ENT_QUOTES, 'UTF-8') ?>">

        <label for="correo">Correo</label>
        <input type="email" id="correo" name="correo" maxlength="150"
               value="<?= htmlspecialchars($datos['correo'], ENT_QUOTES, 'UTF-8') ?>">

        <label for="carrera">Carrera</label>
        <input type="text" id="carrera" name="carrera" maxlength="100"
               value="<?= htmlspecialchars($datos['carrera'], ENT_QUOTES, 'UTF-8') ?>">

        <label for="fecha_ingreso">Fecha de ingreso</label>
        <input type="date" id="fecha_ingreso" name="fecha_ingreso"
               value="<?= htmlspecialchars($datos['fecha_ingreso'], ENT_QUOTES, 'UTF-8') ?>">

        <div class="acciones">
            <button type="submit" class="boton">Guardar</button>
            <a class="boton boton-secundario" href="index.php">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>
