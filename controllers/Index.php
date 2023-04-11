<?php
    error_reporting(-1);
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    include "./models/Region.php";
    include "./models/Comuna.php";
    include "./models/Candidato.php";
    
    class Index {
        public $datos;
        protected $regionModel;
        protected $comunaModel;

        function __construct(){
            $this->regionModel = new Region();
            $this->comunaModel = new Comuna();
            $this->candidatoModel = new Candidato();
            return json_encode($this->obtenerDatosIndex());
        }

        private function obtenerDatosIndex(){
            $this->datos['regiones'] = $this->regionModel->obtenerRegiones();
            $this->datos['comunas'] = $this->comunaModel->obtenerComunas();
            $this->datos['candidatos'] = $this->candidatoModel->obtenerCandidatos();
            // $this->datos['regiones'] = 
            return $this->datos;
        }

    }

?>