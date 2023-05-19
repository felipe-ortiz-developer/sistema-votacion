# Sistema de Votación
Esta es una aplicación de votación de muestra y prueba de conceptos desarrollado en PHP7, jQuery y MySQL.

### Funcionalidades

    Registro de usuarios: Los usuarios pueden crear cuentas para acceder a la aplicación.
    Inicio de sesión: Los usuarios pueden iniciar sesión con sus credenciales registradas.
    Agregar candidatos: Las votaciones se organizan en diferentes categorías.
    Emitir votos: Los usuarios pueden emitir votos en las categorías disponibles.
    Resultados de votación: Se muestra un resumen de los resultados de las votaciones en graficos y registros en tabla.

![imagen](https://github.com/felipe-ortiz-developer/sistema-votacion/assets/32887258/67895ed0-8ebd-4c94-b588-bda75cfe73e0)

### Instalación:
    1. Crear base de datos
        Pasos: 
            1. ingresar a http://localhost/phpmyadmin/
            2. Seleccionar Nueva (Base de datos)
            3. Ingresar nombre ej: "sistema_votacion"
            4. Pinchar boton Crear
    2. Ejecutar script SQL 
        Pasos: 
            1. Seleccionada la base de datos ingresar a la pestaña "Importar"
            2. Archivo a importar -> Examinar y seleccionar dentro del proyecto "SQL/sistema_votacion.sql"
            3. Pinchar boton Importar
    3. Clonar el repositorio con "git clone https://github.com/felipe-ortiz-developer/sistema-votacion.git"
    4. Configurar archivo de variables globales a la base de datos
        Pasos: 
            1. Abrir archivo "database.php.example"
            2. Configurar variables de conexion deacuerdo a sus necesidades
                ej: 
                    define('DB_HOST', 'localhost');
                    define('DB_USER', 'tu_usuario');
                    define('DB_PASS', 'tu_contraseña');
                    define('DB_NAME', 'sistema_votacion');
            3. Quitar la extencion ".example" el nombre del archivo

### Requisitos previos :
    - Apache 2.4.54
    - MySQL 8.0.31
    - PHP 7.4.33
    - JQuery

### Contribuciones

Si deseas contribuir a este proyecto, siéntete libre de hacer un fork del repositorio y enviar tus mejoras a través de solicitudes de extracción. Estaré encantado de revisarlas y fusionarlas si son apropiadas.
Licencia

Este proyecto se distribuye bajo la licencia MIT. Si utilizas este proyecto, por favor, menciona y enlaza a este repositorio.

¡Gracias por utilizar nuestra aplicación de votación! Si tienes alguna pregunta o problema, no dudes en contactarnos.
