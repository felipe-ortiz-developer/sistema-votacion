<?php
// Archivo: controllers/AuthController.php

require_once '../models/Usuario.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el formulario de inicio de sesión
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validar las credenciales del usuario
            $user = Usuario::findByEmail($email);
            if ($user && password_verify($password, $user->getPassword())) {
                // Iniciar sesión exitosamente
                session_start();
                $_SESSION['user'] = $user->getId();

                // Redireccionar a la página de inicio o a donde sea necesario
                header('Location: index.php');
                exit();
            } else {
                // Credenciales inválidas
                $error = 'Credenciales inválidas. Por favor, intenta de nuevo.';
            }
        }

        // Mostrar el formulario de inicio de sesión
        require 'views/login.php';
    }

    public function forgotPassword()
    {
        // Lógica para recuperar la contraseña
        // ...
        // Mostrar el formulario de recuperación de contraseña
        require 'views/forgot_password.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();

        // Redireccionar a la página de inicio de sesión
        header('Location: index.php?page=login');
        exit();
    }
}
?>
