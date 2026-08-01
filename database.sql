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

-- Registros de ejemplo
INSERT INTO estudiantes (matricula, nombre, apellido, correo, carrera, fecha_ingreso) VALUES
('2025-0101', 'Josue',   'Hidalgo',  'josue.hidalgo@itla.edu.do',  'Desarrollo de Software', '2025-01-15'),
('2025-0102', 'Maria',   'Fernandez','maria.fernandez@itla.edu.do','Redes de la Informacion','2025-01-20'),
('2025-0103', 'Carlos',  'Peralta',  'carlos.peralta@itla.edu.do', 'Desarrollo de Software', '2025-02-03'),
('2025-0104', 'Ana',     'Rodriguez','ana.rodriguez@itla.edu.do',  'Multimedia',             '2025-02-10'),
('2025-0105', 'Luis',    'Martinez', 'luis.martinez@itla.edu.do',  'Manufactura Automatizada','2025-03-01');
