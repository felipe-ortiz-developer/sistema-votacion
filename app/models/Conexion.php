<?php 
    if($_SERVER['PHP_SELF'] == '/index.php'){
        include './database.php';
    }else{
        include '../../database.php';
    }

    class Conexion{
        // Declaracion de variables
        private $usuario = DB_USERNAME;
        private $contraseña = DB_PASSWORD;
        private $servidor = DB_HOST;
        private $basededatos = DB_NAME;

        //return objPDO
        protected $conexion = "";

        function __construct(){
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            try 
            {
                $objetoPDO = new PDO('mysql:host='.$this->servidor.';dbname='.$this->basededatos, $this->usuario, $this->contraseña, $opciones);
                $this->setConexion($objetoPDO);

            } catch (PDOException $e) {
                print "¡Error!: " . $e->getMessage() . "<br/>";
                return false;
            }
        }

        private function setConexion($objPDO){
            $this->conexion = $objPDO;
        }
        
    }
?>