-- Script de creación de la base de datos del CRUD de estudiantes
-- Programación III

CREATE DATABASE IF NOT EXISTS crud_estudiantes
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE crud_estudiantes;

DROP TABLE IF EXISTS estudiantes;

CREATE TABLE estudiantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricula VARCHAR(20) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    correo VARCHAR(150) NOT NULL,
    carrera VARCHAR(100) NOT NULL,
    fecha_ingreso DATE NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
