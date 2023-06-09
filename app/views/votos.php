<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar votos</title>
    <link href="../../public/css/datatables.min.css" rel="stylesheet"/>
    <link href="../../public/css/boostrap/bootstrap.min.css" rel="stylesheet"/>
    <link rel="icon" href="../../public/img/votar.png">
    <link rel="stylesheet" href="../../public/css/olas.css">
    <link rel="stylesheet" href="../../public/css/dataTableCustome.css">
    <style>
        body {
            background-color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card mt-4">
            <div style="padding-bottom: 120px; padding-left: 30px;">
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

                <div style="width: 800px;"><canvas id="acquisitions"></canvas></div>
            </div>
        </div>
        
    </div>
    
    <script src="../../public/js/jquery-3.6.4.min.js"></script>
    <script src="../../public/js/datatables.min.js"></script>
    <script src="../../public/js/boostrap/bootstrap.min.js"></script>
    <script src="../../public/js/chart.js"></script>
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
                    // console.log(data);
                    table.clear().rows.add(data).draw();
                    armarGrafico(data)
                }
            });
        });

        // function listar(){
        // }

        function armarGrafico(votos){
            // console.log("votos: ");
            // console.log(votos);

            var candidatos = [];
            votos.reduce(function(acumulador, voto) {
                if (!candidatos.includes(voto.candidato)) {
                    candidatos.push(voto.candidato);
                }
            }, candidatos);
            // console.log(candidatos); // Todos los candidatos (no repetidos)

            var votosPorCandidato = [];
            for (let i = 0; i < candidatos.length; i++) {
                let candidato = {
                    nombre: candidatos[i],
                    conteo: 0
                }
                for (let i = 0; i < votos.length; i++) {
                    if (votos[i].candidato == candidato.nombre) {
                        candidato.conteo++;
                    }
                }
                votosPorCandidato.push(candidato);
            }
            // console.log(votosPorCandidato); // Array de candidatos con sus votos

            new Chart(
                $('#acquisitions'), 
                {
                    type: 'bar',
                    data: {
                        labels: votosPorCandidato.map(row => row.nombre),
                        datasets: [
                            {
                                label: 'Votos',
                                data: votosPorCandidato.map(row => row.conteo)
                            }
                        ]
                    }
                }
            );
        }
    </script>
</body>
</html>