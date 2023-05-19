<?php

require_once '../models/Usuario.php';

class UsuarioController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el formulario de registro
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password']; // ¡Recuerda encriptar la contraseña antes de almacenarla!

            // Crear un nuevo usuario
            $user = new Usuario();
            $user->setName($name);
            $user->setEmail($email);
            $user->setPassword($password); // ¡Asegúrate de encriptar la contraseña antes de almacenarla!

            // Guardar el usuario en la base de datos
            $user->save();

            // Redireccionar a la página de inicio de sesión
            header('Location: index.php?page=login');
            exit();
        }

        // Mostrar el formulario de registro
        require 'views/register.php';
    }
}
?>
