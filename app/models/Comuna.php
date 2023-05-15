<?php 
    require_once "Database.php";

    class Comuna extends Database {

        function __construct(){
            parent::__construct();
        }

        function obtenerComunas(){
            $stm = $this->conexion->query("SELECT * FROM comuna");
            $comunas = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $comunas;
        }

    }

?>