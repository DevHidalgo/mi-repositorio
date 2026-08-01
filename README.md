# CRUD de Estudiantes

Aplicacion web desarrollada en PHP y MySQL que permite administrar el registro de
estudiantes de la institucion. Implementa las cuatro operaciones basicas de un CRUD
(crear, listar, actualizar y eliminar) utilizando PDO con sentencias preparadas,
manejo de errores mediante try/catch y escape de la salida con htmlspecialchars.

Proyecto academico de la asignatura Programacion III.

## Requisitos

- PHP 7.4 o superior con la extension PDO habilitada
- MySQL 5.7 o superior (o MariaDB 10.4+)
- Un servidor web local como XAMPP, Laragon o WAMP
- Git para el control de versiones

## Instalacion

1. Clonar el repositorio dentro del directorio publico del servidor web:

   ```bash
   git clone https://github.com/DevHidalgo/mi-repositorio.git
   ```

2. Importar el script `database.sql` desde phpMyAdmin o por consola:

   ```bash
   mysql -u root -p < database.sql
   ```

   El script crea la base de datos `crud_estudiantes`, la tabla `estudiantes` e
   inserta 5 registros de ejemplo.

3. Ajustar las credenciales de conexion en `config/db.php` si su servidor MySQL
   utiliza un usuario o contrasena distintos a los valores por defecto.

4. Iniciar Apache y MySQL, y abrir la aplicacion en el navegador:

   ```
   http://localhost/mi-repositorio/index.php
   ```

## Estructura del proyecto

| Archivo | Descripcion |
|---|---|
| `index.php` | Listado de estudiantes en tabla HTML |
| `crear.php` | Formulario y registro de nuevos estudiantes |
| `editar.php` | Formulario precargado y actualizacion de datos |
| `eliminar.php` | Confirmacion y eliminacion de un estudiante |
| `config/db.php` | Conexion PDO a la base de datos |
| `assets/style.css` | Hoja de estilos de la aplicacion |
| `database.sql` | Script de creacion de la base de datos |
