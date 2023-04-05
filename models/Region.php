<?php 
    require_once "Database.php";

    class Region extends Database {

        function __construct(){
            parent::__construct();
        }

        function obtenerRegiones(){
            $stm = $this->conexion->query("SELECT * FROM region");
            $regiones = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $regiones;
        }

    }

?>