## Sistema de Votación ##
Proyecto de muestra y prueba de conceptos de PHP, JS y CSS
PHP: 
    - Estructura MVC
    - Conexion con base de datos mysql
    - CRUD de entidades
    - Sistema de login
    - 
 JS: 
    - Muestra de registros en tabla con DataTable
    - Muestra de registros en graficos con chart.js
    - Alertas esteticas con SweetAlert
    - Efecto visual con confeti.js
    - Validación con Jquery Validation
 CSS:
    - Efecto visual de titulo que cambia de color
    - Efecto visual de boton de votar que cambia de color como "magico"
    - 

![imagen](https://github.com/felipe-ortiz-developer/sistema-votacion/assets/32887258/67895ed0-8ebd-4c94-b588-bda75cfe73e0)

## Tecnologías : ##
    - Apache 2.4.54
    - MySQL 8.0.31
    - PHP 7.4.33
    - JQuery
    
#### Instalación: #### 
    1. Instalar stack de tecnologias web "WAMP"
        ref: https://www.wampserver.com/en/
    2. Clonar o mover repositorio a la carpeta "C:\wamp64\www"
    3. Crear base de datos
        Pasos: 
            1. ingresar a http://localhost/phpmyadmin/
            2. Seleccionar Nueva (Base de datos)
            3. Ingresar nombre ej: "sistema_votacion"
            4. Pinchar boton Crear
    4. Ejecutar script SQL 
        Pasos: 
            1. Seleccionada la base de datos ingresar a la pestaña "Importar"
            2. Archivo a importar -> Examinar y seleccionar dentro del proyecto "SQL/sistema_votacion.sql"
            3. Pinchar boton Importar
    5. Configurar archivo de conexion a la base de datos
        Pasos: 
            1. Abrir archivo "models/Database.php"
            2. Configurar variables de conexion deacuerdo a sus necesidades
                ej: 
                    private $usuario = "root";
                    private $contraseña = "";
                    private $servidor = "localhost";
                    private $basededatos = "sistema_votacion";

