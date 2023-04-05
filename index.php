<?php 
    require_once 'controllers/Index.php';
    $index = new Index();
    // print "<pre>"; print_r($index->datos); print "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h3>FORMULARIO DE VOTACIÓN: </h3>
        <table>
            <tr>
                <td>Nombre y Apellido</td>
                <td><input type="text" id="nombre"></td>
            </tr>
            <tr>
                <td>Alias</td>
                <td><input type="text" id="alias"></td>
            </tr>
            <tr>
                <td>RUT</td>
                <td><input type="text" id="rut"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" id="email"></td>
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
            </tr>
            <tr>
                <td><button onclick="votar()">
                    Votar
                </button></td>
                <td></td>
            </tr>
        </table>

    <script src="js/jquery-3.6.4.min.js"></script>
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
            
        });

        function votar(){
            // if($('#cboxWeb').is(':checked')) {
            //     let web = true;
            // }else{}
            
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