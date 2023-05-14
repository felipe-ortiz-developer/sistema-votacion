<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar votos</title>
    <link href="../css/datatables.min.css" rel="stylesheet"/>
    <link href="../css/boostrap/bootstrap.min.css" rel="stylesheet"/>
    <link rel="icon" href="../img/votar.png">
    <link rel="stylesheet" href="../css/olas.css">
    <style>
        body {
            background-color: black;
        }
        .card {
    overflow: auto;
  }
    </style>
</head>
<body>
    <div class="container">
        <div class="card mt-4">
            <div style="padding-bottom: 170px; padding-left: 30px;">
                <h2 class="border">Votos</h2>
                <h2 class="wave">Votos</h2>
            </div>
            <div class="card-body" style="padding-left: 32px;">
                <table id="myDataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre y Apellido</th>
                            <th>Alias</th>
                            <th>RUT</th>
                            <th>Email</th>
                            <th>Región</th>
                            <th>Comuna</th>
                            <th>Candidato</th>
                            <th>Ref. web</th>
                            <th>Ref. TV</th>
                            <th>Ref. Redes sociales</th>
                            <th>Ref. Amigo</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    
    <script src="../js/jquery-3.6.4.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/boostrap/bootstrap.min.js"></script>
    <script>

        $(function() {
            var table = $('#myDataTable').DataTable({
                columns: [
                    { data: 'id' },
                    { data: 'nombre' },
                    { data: 'alias' },
                    { data: 'rut' },
                    { data: 'email' },
                    { data: 'region' },
                    { data: 'comuna' },
                    { data: 'candidato' },
                    { data: 'ref_web' },
                    { data: 'ref_tv' },
                    { data: 'ref_redes_sociales' },
                    { data: 'ref_amigo' },
                ],
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                    },
                    "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });

            let miForm = {
                accion: 'index'
            }

            $.ajax({
                type: "POST",
                url: "../controllers/VotarController.php",
                data: miForm,
                dataType: 'json',
                success: function(data) {
                    table.clear().rows.add(data).draw();
                }
            });
        });

        function listar(){
            
        }
    </script>
</body>
</html>