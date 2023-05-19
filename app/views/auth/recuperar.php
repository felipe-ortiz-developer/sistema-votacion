<!-- Archivo: views/forgot_password.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <!-- Formulario de recuperación de contraseña -->
    <div class="container">
        <h1>Recuperar contraseña</h1>
        <form id="forgotPasswordForm" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="Correo electrónico" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
