<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/index.css">
    <title>Registro</title>
</head>

<body>
    <div class="titulo">
        <h1>Sistema de Gestión de tareas</h1>
        <p>Este sistema te permite crear tareas y modificarlas</p>
    </div>
    <div>
        <h1></h1>
        <form action="../control/registro.php" method="post">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <br>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <br>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit" name="enviar" id="enviar">Registrase</button>
        </form>
        <div class="linea-container">
            <div class="linea"></div>
            <span class="o">o</span>
            <div class="linea"></div>
        </div>
    </div>
</body>

</html>