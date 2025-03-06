<?php
require_once("../model/bd_class.php");
require_once("../model/bd_control.php");
$conexion = new Conexion();
try {
    if ($conexion) {
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['username'])) {

            $nombre = $_POST["username"];
            $contrasena = $_POST["password"];
            $correo = $_POST["email"];

            $control = new Control();
            $insercion = $control->registro($nombre, $contrasena, $correo);

            if ($insercion == true) {
                echo "usuario registrado correctamente";
            } else {
                echo "Usuario no registrado";
            }
        }
    } else {
        echo "Error al conectarse con la base de datos";
    }
} catch (PDOException $e) {

    error_log($e->getMessage());
    echo "Hubo un problema con la conexión a la base de datos.";
}
