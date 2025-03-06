<?php
session_start();
header("Content-Type: application/json");
require_once("../../model/bd_class.php");

$conexion = new Conexion();
$db_conexion = $conexion->getConexion();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];

        $consulta = "SELECT * FROM tareas WHERE id_usuario=:id";

        $stmt = $db_conexion->prepare($consulta);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($tareas);
    } else {
        echo json_encode(["error" => "No se ha proporcionado un usuario_id"]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['id'])) {
        $tarea_id = $data['id'];

        $consulta = "DELETE FROM tareas WHERE id = :tarea_id";
        $stmt = $db_conexion->prepare($consulta);
        $stmt->bindParam(':tarea_id', $tarea_id);
        $stmt->execute();

        echo json_encode(["message" => "Tarea eliminada correctamente"]);
    } else {
        echo json_encode(["error" => "No se ha proporcionado un tarea_id"]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['descripcion_tarea'])) {
        if (isset($_SESSION['id'])) {
            $usuario_id = $_SESSION['id'];
            $descripcion_tarea = htmlspecialchars($data['descripcion_tarea']);

            $consulta = "INSERT INTO tareas (id_usuario, descripcion_tarea) VALUES (:usuario_id, :descripcion_tarea)";
            $stmt = $db_conexion->prepare($consulta);
            $stmt->bindParam(':usuario_id', $usuario_id);
            $stmt->bindParam(':descripcion_tarea', $descripcion_tarea);
            $stmt->execute();

            echo json_encode(["message" => "Tarea agregada correctamente"]);
        } else {
            echo json_encode(["error" => "Usuario no autenticado"]);
        }
    } else {
        echo json_encode(["error" => "Falta la descripción de la tarea"]);
    }
}
