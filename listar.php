<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar votos</title>
    <link href="css/datatables.min.css" rel="stylesheet"/>
    <link href="css/boostrap/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <table id="myDataTable">
        <thead>
            <tr>
                <th>Nombre y Apellido</th>
                <th>Alias</th>
                <th>RUT</th>
                <th>Email</th>
                <th>Región</th>
                <th>Comuna</th>
                <th>Candidato</th>
                <th>Como se enteró de nosotros</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/boostrap/bootstrap.min.js"></script>
    <script>
        $(function() {
            var data = [
                [
                    "Tiger Nixon",
                    "System Architect",
                    "Edinburgh",
                    "5421",
                    "2011/04/25",
                    "$3,120"
                ],
                [
                    "Garrett Winters",
                    "Director",
                    "Edinburgh",
                    "8422",
                    "2011/07/25",
                    "$5,300"
                ]
            ];

            $('#myDataTable').DataTable({
                data: data
            });
        });
    </script>
</body>
</html>