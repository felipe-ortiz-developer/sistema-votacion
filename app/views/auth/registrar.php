<!-- Archivo: views/register.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Registro de usuario</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <!-- Formulario de registro -->
    <div class="container">
        <h1>Registro de usuario</h1>
        <form id="registerForm" method="POST">
            <div class="form-group">
                <input type="text" name="name" placeholder="Nombre" class="form-control">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Correo electrónico" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Contraseña" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
</body>
</html>
