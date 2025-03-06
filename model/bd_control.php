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
            $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

            $consulta = "INSERT INTO usuarios (nombre, contrasena, email) VALUES (:nombre, :contrasena, :correo)";

            $stmt = $db_conexion->prepare($consulta);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        }
    }

    public function obtenerTareas($id)
    {
        $db_conexion = $this->getConexion();
        if ($db_conexion) {
            $consulta = "SELECT * FROM tareas WHERE id_usuario=:id";
            $stmt = $db_conexion->prepare($consulta);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function eliminarTarea($idTarea)
    {
        $db_conexion = $this->getConexion();

        if ($db_conexion) {
            $consulta = "DELETE FROM tareas WHERE id = :id";
            $stmt = $db_conexion->prepare($consulta);
            $stmt->bindParam(':id', $idTarea);
            return $stmt->execute();
        }
    }

    public function insertarTarea($idUsuario, $descripcion)
    {

        $db_conexion = $this->getConexion();

        if ($db_conexion) {
            $consulta = "INSERT INTO tareas (id_usuario, descripcion_tarea) VALUES (:id_usuario, :descripcion)";
            $stmt = $db_conexion->prepare($consulta);
            $stmt->bindParam(':id_usuario', $idUsuario);
            $stmt->bindParam(':descripcion', $descripcion);
            return $stmt->execute();
        }
    }
}
