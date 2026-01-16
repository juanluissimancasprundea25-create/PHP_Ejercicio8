<?php
$error_file = 'errores.log';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    if ($nombre && $telefono) {
        $line = "$nombre|$telefono\n";
        // Parte para guardar los contactos en una agenda

        if (file_put_contents('agenda.txt', $line, FILE_APPEND | LOCK_EX)) {
            echo "<p style='color:green;'>Hemos añadido el contacto que querias</p>";
        } else {
            error_log("Error al escribir en agenda.txt", 3, $error_file);
            echo "<p style='color:red;'>No pudimos guardarlo sorry T.T</p>";
        }
    } else {
        echo "<p style='color:red;'>No puedes dejar cosas en blanco, revisalo</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Contacto</title>
    <!-- Mas estilos para que se vea bonito -->

    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        .container { max-width: 400px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        input[type="text"], input[type="tel"] { width: 100%; padding: 8px; margin: 10px 0; }
        button { background: #28a745; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
        a { display: inline-block; margin-top: 15px; color: #007BFF; }
    </style>
</head>
<body>
    <!-- Funcion para guardar los contactos -->

    <div class="container">
        <h2>Añadir Contacto</h2>
        <form method="POST">
            <input type="text" name="nombre" placeholder="Pon tu nombre" required>
            <input type="tel" name="telefono" placeholder="Pon tu telefono" required>
            <button type="submit">Guardar</button>
        </form>
        <a href="index.php">Volver al menu</a>
    </div>
</body>
</html>
