<?php
session_start();
require_once("../model/bd_class.php");
require_once("../model/bd_consultas.php");
$conexion = new Conexion();
try {
    $db_conexion = $conexion->getConexion();
    if ($db_conexion) {
        if (isset($_POST['username']) && isset($_POST["password"])) {
            $usuario = $_POST["username"];
            $contrasena = $_POST['password'];

            $consulta = new Consultas();
            $usuario_db = $consulta->usuario($usuario);

            if (!$usuario_db) {
                $_SESSION["msgUser"] = "<p style='color:red'>Usuario incorrecto</p>";
                header("location: ../index.php");
            } else {
                if (password_verify($contrasena, $usuario_db['contrasena'])) {
                    $_SESSION["nombre"] = $usuario;
                    $_SESSION["id"] = $usuario_db['id'];
                    header("location: ../view/verTareas.php");
                } else {
                    $_SESSION["msgPasswd"] = "<p style='color:red'>Contraseña incorrecta</p>";
                    header("location: ../index.php");
                }
            }
        }
    }
} catch (PDOException $e) {

    error_log($e->getMessage());
    echo "Hubo un problema con la conexión a la base de datos.";
}
