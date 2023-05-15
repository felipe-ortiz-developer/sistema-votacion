<?php 
    require_once "Database.php";

    class Voto extends Database {

        function __construct(){
            parent::__construct();
        }

        function listar(){
            try {
                $query = "SELECT 
                    vo.id, 
                    vo.nombre, 
                    vo.alias, 
                    vo.rut, 
                    vo.email, 
                    ca.nombre as candidato,
                    co.nombre as comuna,
                    re.nombre as region,
                    IF (vo.ref_web = 1, 'Si', 'No') as ref_web,
                    IF (vo.ref_tv = 1, 'Si', 'No') as ref_tv,
                    IF (vo.ref_redes_sociales = 1, 'Si', 'No') as ref_redes_sociales,
                    IF (vo.ref_amigo = 1, 'Si', 'No') as ref_amigo
                    FROM voto vo 
                    INNER JOIN candidato ca
                        ON vo.candidato_id = ca.id
                    INNER JOIN comuna co
                        ON vo.comuna_id = co.id
                    INNER JOIN region re
                        ON co.region_id = re.id";
                $stm = $this->conexion->prepare($query);
                $stm->execute();

                $votos = $stm->fetchAll(PDO::FETCH_ASSOC);
                return $votos;
            } catch(PDOException $e) {
                print "Error!: " . $e->getMessage() . "</br>";
            }
        }

        function crear($datos){
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

            } catch( PDOException $e ) {
                print "Error!: " . $e->getMessage() . "</br>";
            }
        }

        function validar($rut){
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

            } catch( PDOException $e ) {
                print "Error!: " . $e->getMessage() . "</br>";
            }
        }
    }

?>