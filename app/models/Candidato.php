<?php 
    require_once "Conexion.php";

    class Candidato extends Conexion {

        function __construct(){
            parent::__construct();
        }

        function obtenerCandidatos(){
            $stm = $this->conexion->query("SELECT * FROM candidato");
            $comunas = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $comunas;
        }

    }

?>