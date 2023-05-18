<?php 
    require_once "Conexion.php";

    class Comuna extends Conexion {

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