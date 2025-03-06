<?php
session_start();
header("Content-Type: application/json");
require_once("../../model/bd_class.php");
require_once("../../model/bd_control.php");

$conexion = new Conexion();
$controlBD = new Control();
$db_conexion = $conexion->getConexion();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];

        $tareas = $controlBD->obtenerTareas($id);
        echo json_encode($tareas);
    } else {
        echo json_encode(["error" => "No se ha proporcionado un usuario_id"]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['id'])) {
        $tarea_id = $data['id'];

        $tareaEliminada = $controlBD->eliminarTarea($tarea_id);
        echo json_encode($tareaEliminada);
    } else {
        echo json_encode(["error" => "No se ha proporcionado un usuario_id"]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['descripcion_tarea'])) {
        if (isset($_SESSION['id'])) {
            $usuario_id = $_SESSION['id'];
            $descripcion_tarea = htmlspecialchars($data['descripcion_tarea']);
            $tareaInsertada = $controlBD->insertarTarea($usuario_id, $descripcion_tarea);
            echo json_encode($tareaInsertada);
        } else {
            echo json_encode(["error" => "Usuario no autenticado"]);
        }
    } else {
        echo json_encode(["error" => "Falta la descripción de la tarea"]);
    }
}
