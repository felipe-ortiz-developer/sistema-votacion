<?php 
    require_once "Conexion.php";

    class Region extends Conexion {

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