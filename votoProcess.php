<?php
    error_reporting(-1);
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);
    
    include "./models/Voto.php";

    $datos["nombre"] = filter_var( $_POST['nombre'], FILTER_SANITIZE_STRING);
    $datos["alias"] = filter_var( $_POST['alias'], FILTER_SANITIZE_STRING);
    $datos["rut"] = filter_var( $_POST['rut'], FILTER_SANITIZE_STRING);
    $datos["email"] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    // $datos["region_id"] = $_POST['region_id'];
    $options = array(
        'options' => array(
            'default' => 0, 
            'min_range' => 1,
            'max_range' => 346
        ),
    );
    $datos["comuna_id"] = filter_var($_POST['comuna_id'], FILTER_VALIDATE_INT, $options);
    $datos["candidato_id"] = filter_var($_POST['candidato_id'], FILTER_VALIDATE_INT, $options);
    $datos["web"] = filter_var($_POST['web'], FILTER_VALIDATE_BOOLEAN);
    $datos["tv"] = filter_var($_POST['tv'], FILTER_VALIDATE_BOOLEAN);
    $datos["rs"] = filter_var($_POST['rs'], FILTER_VALIDATE_BOOLEAN);
    $datos["amigo"] = filter_var($_POST['amigo'], FILTER_VALIDATE_BOOLEAN);


    $votoModel = new Voto();
    // Validar que el rut votante no halla votado antes
    $resultado = $votoModel->validarVoto($datos["rut"]);

    if(isset($resultado[0]) ){
        print "Usted ya registro su voto.";
    }else{
        $votoModel->crearVoto($datos);
        print "Voto registrado correctamente.";
    }

?>