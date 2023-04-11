<?php 
    require_once "Database.php";

    class Voto extends Database {

        function __construct(){
            parent::__construct();
        }

        function crearVoto($datos){
            try {
                $stmt = $this->conexion->prepare("
                    INSERT INTO voto (
                        nombre, 
                        alias, 
                        rut, 
                        email, 
                        comuna_id, 
                        candidato_id, 
                        ref_web, 
                        ref_tv, 
                        ref_redes_sociales, 
                        ref_amigo) 
                    VALUES(?,?,?,?,?,?,?,?,?,?)");
                $this->conexion->beginTransaction();
                $stmt->execute( array(
                    $datos["nombre"],
                    $datos["alias"],
                    $datos["rut"],
                    $datos["email"],
                    $datos["comuna_id"],
                    $datos["candidato_id"],
                    $datos["web"],
                    $datos["tv"],
                    $datos["rs"],
                    $datos["amigo"],
                ));

                $id = $this->conexion->lastInsertId();
                $this->conexion->commit();
                return $id;

            } catch( PDOExecption $e ) {
                print "Error!: " . $e->getMessage() . "</br>";
            }
        }

        function validarVoto($rut){
            try {
                $query = "SELECT * 
                    FROM voto 
                    WHERE rut = :rut";
                $stm = $this->conexion->prepare($query);
                if ($stm) {
                    $stm->bindParam(':rut', $rut, PDO::PARAM_STR);
                    $stm->execute();
                    $hash = $stm->fetchAll(PDO::FETCH_ASSOC);
                    return $hash;
                }else{
                    echo "Error en la consulta";
                }

            } catch( PDOExecption $e ) {
                print "Error!: " . $e->getMessage() . "</br>";
            }
        }
    }

?>