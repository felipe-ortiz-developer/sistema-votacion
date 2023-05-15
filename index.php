<?php
    require_once 'controllers/IndexController.php';
    $index = new Index();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema de votación</title>
    <link href="css/boostrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tituloMagico.css">
    <link rel="stylesheet" href="css/botonMagico.css">
    <link rel="stylesheet" href="css/olas.css">
    <link rel="icon" href="img/votar.png">
</head>

<body>
    <h1 class="tituloMagico">
        <span class="textoMagico" style="--start-color:#007CF0; --end-color:#00DFD8; --content: 'Formulario';">
            Formulario
        </span>
        <span class="textoMagico" style="--start-color:#7928CA; --end-color:#FF0080; --content: 'De'; --animation:a2;">
            De
        </span>
        <span class="textoMagico" style="--start-color:#FF4D4D; animation-name:a3; --end-color:#F9CB28; --content: 'Votación'; --animation: a3">
            Votación
        </span>
    </h1>

    <div class="container">
        <div class="jumbotron">
            <form id="myform">
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Nombre y Apellido</label>
                    </div>
                    <div class="col">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="ej: Felipe Ortiz">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Alias</label>
                    </div>
                    <div class="col">
                        <input type="text" name="alias" id="alias" class="form-control" placeholder="ej: Sr Felipe">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">RUT</label>
                    </div>
                    <div class="col">
                        <input type="text" id="rut" class="form-control" placeholder="ej: 18605707-4">
                        <label style="display:none;" class="labelError" for="" id="errorRut"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Email</label>
                    </div>
                    <div class="col">
                        <input type="text" name="email" id="email" class="form-control" placeholder="ej: felipe_ortiz@gmail.com">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Región</label>
                    </div>
                    <div class="col">
                        <select class="form-control" name="selectRegion" id="selectRegion">
                            <option disabled selected value="">Seleccione una región</option>
                            <?php
                            foreach ($index->datos["regiones"] as $region) {
                                print "<option value='" . $region['id'] . "'>" . $region['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Comuna</label>
                    </div>
                    <div class="col">
                        <select class="form-control" name="selectComuna" id="selectComuna">
                            <option disabled selected value="">Seleccione una comuna</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Candidato</label>
                    </div>
                    <div class="col">
                        <select class="form-control" name="selectCandidato" id="selectCandidato">
                            <option disabled selected value="">Seleccione un candidato</option>
                            <?php
                            foreach ($index->datos["candidatos"] as $candidato) {
                                print "<option value='" . $candidato['id'] . "'>" . $candidato['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Como se enteró de nosotros</label>
                    </div>
                    <div class="col">
                        <label class="labelCheck"><input name="opciones[]" type="checkbox" id="cboxWeb"> Web</label>
                        <label class="labelCheck"><input name="opciones[]" type="checkbox" id="cboxTV"> TV</label><br>
                        <label class="labelCheck"><input name="opciones[]" type="checkbox" id="cboxRS"> Redes sociales</label>
                        <label class="labelCheck"><input name="opciones[]" type="checkbox" id="cboxA"> Amigo</label>
                        <label style="display:none;" class="labelError" for="" id="errorCheckboxs"></label>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col">
                        <label class="labelError" for="" id="errorVoto"></label>
                    </div>
                </div> -->
            </form>
        </div>

    </div>

    <div style="text-align:center; margin-top: 32px; margin-bottom: 32px">
        <button class="botonMagico">
            Votar
        </button>
    </div>

    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/jquery.rut.js"></script>
    <script src="js/sweetAlert.js"></script>
    <script src="js/boostrap/bootstrap.min.js"></script>
    <script src="js/confeti.js"></script>
    <script src="js/jquery.validate.min.js"></script>

    <script>
        let comunas = <?php print json_encode($index->datos["comunas"]); ?>;
    </script>

    <script src="js/validacion.js"></script>
</body>

</html>