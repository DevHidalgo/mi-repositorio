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

## Estrategia de ramas

El proyecto se desarrollo siguiendo Git Flow con tres ramas permanentes y seis ramas
temporales de trabajo. Ninguna rama permanente recibe commits directos: todo cambio
entra mediante Pull Request.

### Ramas permanentes

- **main**: version estable y publicada de la aplicacion.
- **qa**: entorno de pruebas donde se valida cada funcionalidad antes de publicarla.
- **dev**: rama de integracion donde se unen todas las funcionalidades en desarrollo.

### Ramas de trabajo

| Rama | Origen | Aporte |
|---|---|---|
| `feature/setup-database` | `dev` | Script `database.sql` y conexion PDO en `config/db.php` |
| `feature/list-students` | `dev` | Listado en `index.php` y estilos en `assets/style.css` |
| `feature/create-student` | `dev` | Formulario, validaciones e INSERT en `crear.php` |
| `feature/update-student` | `dev` | Formulario precargado y UPDATE en `editar.php` |
| `feature/delete-student` | `dev` | Confirmacion y DELETE en `eliminar.php` |
| `hotfix/fix-date-format` | `main` | Correccion del formato de fecha a `d/m/Y` y documentacion |

### Flujo de trabajo

```
feature/*  ->  dev  ->  qa  ->  main
```

1. Cada rama `feature/*` se crea a partir de `dev` actualizado y agrupa sus cambios
   en varios commits siguiendo Conventional Commits.
2. Al terminar la funcionalidad se abre un Pull Request de la rama hacia `dev`, donde
   se integra con el resto del trabajo del equipo.
3. Desde `dev` se abre un Pull Request hacia `qa` para probar la funcionalidad
   integrada en el entorno de pruebas.
4. Una vez aprobada en `qa`, se abre un Pull Request hacia `main` para publicar la
   version estable.

La rama `hotfix/fix-date-format` sigue la regla de Git Flow para correcciones
urgentes: se crea desde `main` porque corrige un error ya publicado, y luego se
reintegra por Pull Request recorriendo `dev`, `qa` y `main` para que las tres ramas
permanentes queden sincronizadas.

Todos los Pull Requests se integraron con merge commit (`--merge`), sin squash ni
rebase, y las ramas se conservan en el repositorio como evidencia del proceso.
