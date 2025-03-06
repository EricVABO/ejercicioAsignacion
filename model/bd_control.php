<?php
class Control extends Conexion
{
    public function __construct()
    {

        parent::__construct();
    }

    function registro($nombre, $contrasena, $correo)

    {
        $db_conexion = $this->getConexion();
        if ($db_conexion) {

            $consulta = "INSERT INTO usuarios (nombre, contrasena, email) VALUES (:nombre, :contrasena, :correo)";

            $stmt = $db_conexion->prepare($consulta);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':contrasena', password_hash($contrasena, PASSWORD_DEFAULT));
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        }
    }
}
