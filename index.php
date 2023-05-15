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
                    <!-- <div class="col">
                        <label class="labelError" for="" id="errorNombre"></label>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Alias</label>
                    </div>
                    <div class="col">
                        <input type="text" id="alias" class="form-control" placeholder="ej: Sr Felipe">
                    </div>
                    <!-- <div class="col">
                        <label class="labelError" for="" id="errorAlias"></label>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">RUT</label>
                    </div>
                    <div class="col">
                        <input type="text" id="rut" class="form-control" placeholder="ej: 18605707-4">
                    </div>
                    <!-- <div class="col">
                        <label class="labelError" for="" id="errorRut"></label>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Email</label>
                    </div>
                    <div class="col">
                        <input type="text" name="email" id="email" class="form-control" placeholder="ej: felipe_ortiz@gmail.com">
                    </div>
                    <!-- <div class="col">
                        <label class="labelError" for="" id="errorEmail"></label>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Región</label>
                    </div>
                    <div class="col">
                        <select class="form-control" id="selectRegion">
                            <option disabled selected value="">Seleccione una región</option>
                            <?php
                            foreach ($index->datos["regiones"] as $region) {
                                print "<option value='" . $region['id'] . "'>" . $region['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!-- <div class="col">
                        <label class="labelError" for="" id="errorRut"></label>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Comuna</label>
                    </div>
                    <div class="col">
                        <select class="form-control" id="selectComuna">
                            <option disabled selected value="">Seleccione una comuna</option>
                        </select>
                    </div>
                    <!-- <div class="col">
                        <label class="labelError" for="" id="errorRut"></label>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Candidato</label>
                    </div>
                    <div class="col">
                        <select class="form-control" id="selectCandidato">
                            <option disabled selected value="">Seleccione un candidato</option>
                            <?php
                            foreach ($index->datos["candidatos"] as $candidato) {
                                print "<option value='" . $candidato['id'] . "'>" . $candidato['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!-- <div class="col">
                        <label class="labelError" for="" id="errorRut"></label>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="columna">Como se enteró de nosotros</label>
                    </div>
                    <div class="col">
                        <label class="labelCheck"><input type="checkbox" id="cboxWeb"> Web</label>
                        <label class="labelCheck"><input type="checkbox" id="cboxTV"> TV</label><br>
                        <label class="labelCheck"><input type="checkbox" id="cboxRS"> Redes sociales</label>
                        <label class="labelCheck"><input type="checkbox" id="cboxA"> Amigo</label>
                    </div>

                    <!-- <div class="col">
                        <label class="labelError" for="" id="errorRut"></label>
                    </div> -->
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

        $(function() {
            $('#myform').validate({ // initialize plugin
                rules: {
                    nombre: "required",
                    email: {
                        required: true,
                        email: true
                    }
                    },
                    messages: {
                    nombre: "Please enter your name",
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    }
                    },
                    submitHandler: function(form) {
                    $.ajax({
                        url: "submit.php",
                        type: "POST",
                        data: $(form).serialize(),
                        success: function(response) {
                        alert("Form submitted successfully!");
                        },
                        error: function(xhr, status, error) {
                        alert("An error occurred while submitting the form: " + error);
                        }
                    });
                }
            });

            $('.botonMagico').on('click', function() {
                $('#myform').submit();
            });

            let region = $('#selectRegion').val();
            if (region !== null) {
                dibujarOpcionesComunas(region);
            }
            $('#selectRegion').on('change', function() {
                dibujarOpcionesComunas(this.value);
            });

            // Validacion para que solo pueda escribir letras y numeros
            $("#alias").bind('keypress', function(event) {
                var regex = new RegExp("^[a-zA-Z0-9 ]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });

            // Validación de RUT
            $("input#rut")
                .rut({
                    formatOn: 'keyup',
                    validateOn: 'keyup'
                })
                .on('rutInvalido', function() {
                    // console.log("Invalido");
                    $('#errorRut').text("* RUT invalido");
                })
                .on('rutValido', function() {
                    // console.log("Valido");
                    $('#errorRut').text("");
                });

        });

        function dibujarOpcionesComunas(region) {
            let comunas_region = comunas.filter(comuna => comuna.region_id == region);
            // console.log(comunas_region);
            let html = "<option disabled selected value=''>Seleccione una comuna</option>";
            for (let i = 0; i < comunas_region.length; i++) {
                const element = comunas_region[i];
                html += `<option value="${element.id}">
                        ${element.nombre}
                    </option>`;
            }

            $('#selectComuna').html(html);
        }

        function votar() {
            // // Validacion de nombre no vacio
            // if ($('#nombre').val() == '') {
            //     $('#errorNombre').text("* Este campo es requerido");
            //     return;
            // } else {
            //     $('#errorNombre').text("");
            // }

            // // Validacion de alias bebe tener mas de 5 caracteres
            // if ($("#alias").val().length < 6) {
            //     $('#errorAlias').text("* Este campo debe tener mas de 5 caracteres");
            //     return;
            // } else {
            //     $('#errorAlias').text("");
            // }

            // // Validar correo
            // if ($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
            //     // alert('El correo electrónico introducido no es correcto.');
            //     $('#errorEmail').text("* Email es invalido");
            //     return;
            // } else {
            //     $('#errorEmail').text("");
            // }

            // // Validar que hallan mas de 1 checkeo
            // let contador = 0;
            // $("input:checkbox:checked").each(function() {
            //     contador++;
            //     // alert($(this).val());
            // });
            // if (contador < 2) {
            //     $('#errorCheckboxs').text("* Debe haber por lo menos 2 checkbox marcados");
            //     return;
            // } else {
            //     $('#errorCheckboxs').text("");
            // }

            let miForm = {
                accion: 'store',
                nombre: $('#nombre').val(),
                alias: $('#alias').val(),
                rut: $('#rut').val(),
                email: $('#email').val(),
                region_id: $('#selectRegion').val(),
                comuna_id: $('#selectComuna').val(),
                candidato_id: $('#selectCandidato').val(),
                web: $('#cboxWeb').is(':checked'),
                tv: $('#cboxTV').is(':checked'),
                rs: $('#cboxRS').is(':checked'),
                amigo: $('#cboxA').is(':checked'),
            };

            $.ajax({
                type: "POST",
                url: "./controllers/VotarController.php",
                data: miForm,
                success: function(data) {
                    confetti({
                        particleCount: 100,
                        spread: 70,
                        origin: { y: 0.6 },
                    });
                    // alert(data);
                    Swal.fire({
                        // position: 'top-end',
                        icon: 'success',
                        title: data,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        }
    </script>
</body>

</html>