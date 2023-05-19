<!-- Archivo: views/login.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <!-- Formulario de inicio de sesión -->
    <div class="container">
        <h1>Iniciar sesión</h1>
        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form id="loginForm" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="Correo electrónico" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Contraseña" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
