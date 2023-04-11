<?php 
    require_once 'controllers/Index.php';
    $index = new Index();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de votación</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <h3>FORMULARIO DE VOTACIÓN: </h3>
        <table>
            <tr>
                <td>Nombre y Apellido</td>
                <td><input type="text" id="nombre"></td>
                <td><label class="labelError" for="" id="errorNombre"></label></td>
            </tr>
            <tr>
                <td>Alias</td>
                <td><input type="text" id="alias"></td>
                <td><label class="labelError" for="" id="errorAlias"></label></td>
            </tr>
            <tr>
                <td>RUT</td>
                <td><input type="text" id="rut"></td>
                <td><label class="labelError" for="" id="errorRut"></label></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" id="email"></td>
                <td><label class="labelError" for="" id="errorEmail"></label></td>
            </tr>
            <tr>
                <td>Región</td>
                <td>
                    <select name="" id="selectRegion">
                        <option disabled selected value="">Seleccione una región</option>
                        <?php 
                            foreach ($index->datos["regiones"] as $region ) {
                                print "<option value='".$region['id']."'>".$region['nombre']."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Comuna</td>
                <td>
                    <select name="" id="selectComuna">
                    </select>
                </td>
            </tr>
            <tr>
                <td>Candidato</td>
                <td>
                    <select name="" id="selectCandidato">
                        <option disabled selected value="">Seleccione un candidato</option>
                        <?php 
                            foreach ($index->datos["candidatos"] as $candidato ) {
                                print "<option value='".$candidato['id']."'>".$candidato['nombre']."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Como se enteró de Nosotros</td>
                <td>
                    <label><input type="checkbox" id="cboxWeb"> Web</label>
                    <label><input type="checkbox" id="cboxTV"> TV</label>
                    <label><input type="checkbox" id="cboxRS"> Redes sociales</label>
                    <label><input type="checkbox" id="cboxA"> Amigo</label>
                </td>
                <td><label class="labelError" for="" id="errorCheckboxs"></label></td>
            </tr>
            <tr>
                <td><button onclick="votar()">
                    Votar
                </button></td>
                <td><label class="labelError" for="" id="errorVoto"></label></td>
                <td></td>
            </tr>
        </table>

    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/jquery.rut.js"></script>

    <script>
        let comunas = <?php print json_encode($index->datos["comunas"]); ?>;
        
        $(function() {
            $('#selectRegion').on('change', function() {
                let comunas_region = comunas.filter(comuna => comuna.region_id == this.value);
                // console.log(comunas_region);
                let html = "<option disabled selected value=''>Seleccione una comuna</option>";
                for (let i = 0; i < comunas_region.length; i++) {
                    const element = comunas_region[i];
                    html += `<option value="${element.id}">
                        ${element.nombre}
                    </option>`;
                }

                $('#selectComuna').html(html);
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
                .rut({formatOn: 'keyup', validateOn: 'keyup'})
                .on('rutInvalido', function(){ 
                    // console.log("Invalido");
                    $('#errorRut').text("* RUT invalido");
                })
                .on('rutValido', function(){ 
                    // console.log("Valido");
                    $('#errorRut').text("");
                });
            
        });

        function votar(){
            // Validacion de nombre no vacio
            if ($('#nombre').val() == '') {
                $('#errorNombre').text("* Este campo es requerido");
                return;
            }else{
                $('#errorNombre').text("");
            }

            // Validacion de alias bebe tener mas de 5 caracteres
            if($("#alias").val().length < 6){
                $('#errorAlias').text("* Este campo debe tener mas de 5 caracteres");
                return;
            }else{
                $('#errorAlias').text("");
            }

            // Validar correo
            if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
                // alert('El correo electrónico introducido no es correcto.');
                $('#errorEmail').text("* Email es invalido");
                return;
            }else{
                $('#errorEmail').text("");
            }

            // Validar que hallan mas de 1 checkeo
            let contador = 0;
            $("input:checkbox:checked").each(function() {
                contador++;
                // alert($(this).val());
            });
            if(contador < 2) {
                $('#errorCheckboxs').text("* Debe haber por lo menos 2 checkbox marcados");
                return;
            }else{
                $('#errorCheckboxs').text("");
            }
            
            let miForm = { 
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
                type:"POST",  
                url:"./controllers/Votar.php",  
                data: miForm,  
                success: function(data) {
                    alert(data);
                }
            });   
        }

    </script>
</body>
</html>