<?php 
    require_once "Database.php";

    class Candidato extends Database {

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