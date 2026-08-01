<?php
/**
 * Conexion a la base de datos mediante PDO.
 * Devuelve una unica instancia de PDO reutilizable por el resto del proyecto.
 */

const DB_HOST    = 'localhost';
const DB_NAME    = 'crud_estudiantes';
const DB_USER    = 'root';
const DB_PASS    = '';
const DB_CHARSET = 'utf8mb4';

function obtenerConexion(): PDO
{
    static $conexion = null;

    if ($conexion instanceof PDO) {
        return $conexion;
    }

    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;

    $opciones = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $conexion = new PDO($dsn, DB_USER, DB_PASS, $opciones);
    } catch (PDOException $e) {
        die('Error de conexion a la base de datos: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8'));
    }

    return $conexion;
}
