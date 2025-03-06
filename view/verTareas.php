<?php
session_start();
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/tareas.css">
    <title>Tareas</title>
</head>

<body>
    <div class="gestor">
        <div class="botones">
            <button id="verTareas">Ver mis tareas</button>
            <button id="insertarTarea">Insertar una nueva tarea</button>
        </div>
        <script>
            let id = <?php echo json_encode($id); ?>;
        </script>
        <script src="../public/script.js"></script>
        <div id="tareas"></div>
    </div>

</body>

</html>