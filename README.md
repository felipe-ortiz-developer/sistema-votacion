# sistema-votacion
Prueba tecnica Desis - Sistema de Votación

Instalación: 
    1.- Instalar stack de tecnologias web "WAMP"
        ref: https://www.wampserver.com/en/
    2.- Clonar o mover repositorio a la carpeta "C:\wamp64\www"
    3.- Crear base de datos
        Pasos: 
            a.- ingresar a http://localhost/phpmyadmin/
            b.- Seleccionar Nueva (Base de datos)
            c.- Ingresar nombre ej: "sistema_votacion"
            d.- Pinchar boton Crear
    4.- Ejecutar script SQL 
        Pasos: 
            a.- Seleccionada la base de datos ingresar a la pestaña "Importar"
            b.- Archivo a importar -> Examinar y seleccionar dentro del proyecto "SQL/sistema_votacion.sql"
            c.- Pinchar boton Importar
    5.- Configurar archivo de conexion a la base de datos
        Pasos: 
            a.- Abrir archivo "models/Database.php"
            b.- Configurar variables de conexion deacuerdo a sus necesidades
                ej: 
                    private $usuario = "root";
                    private $contraseña = "";
                    private $servidor = "localhost";
                    private $basededatos = "sistema_votacion";

Tecnologías:
    Apache 2.4.54
    MySQL 8.0.31
    PHP 7.4.33
    JQuery