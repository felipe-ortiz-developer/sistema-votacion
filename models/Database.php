<?php 

    class Database{
        // Declaracion de variables
        private $usuario = "root";
        private $contraseña = "";
        private $servidor = "localhost";
        private $basededatos = "sistema_votacion";

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