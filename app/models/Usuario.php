<?php

class Usuario
{
    // Atributos del usuario
    private $id;
    private $nombre_usuario;
    private $email;
    private $password;
    private $rol_id;

    // Métodos de acceso y asignación de atributos

    // ...

    // Método para guardar el usuario en la base de datos
    public function save()
    {
        // Lógica para guardar el usuario en la base de datos
        // ...
    }

    // Método estático para buscar un usuario por correo electrónico
    public static function findByEmail($email)
    {
        // Lógica para buscar un usuario por correo electrónico en la base de datos
        // ...
    }

    // Otros métodos de utilidad
    // ...
}
?>
