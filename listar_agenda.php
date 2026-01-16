<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listar agenda</title>
    <!-- Estilos para centralizar la tabla y mostrarlo mas "bonito" -->

    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #f0f0f0; }
        a { display: inline-block; margin-top: 15px; color: #007BFF; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Agenda</h2>
        <?php
        // Funcion para mostrar los logs del archivo agenda.txt 

        $file = 'agenda.txt';
        if (file_exists($file) && filesize($file) > 0) {
            $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if (!empty($lines)) {
                echo "<table><thead><tr><th>Nombre</th><th>Telefono</th></tr></thead><tbody>";
                // Mostramos los logs del archivo agenda.txt en la tabla
                
                foreach ($lines as $line) {
                    $parts = explode('|', $line);
                    if (count($parts) == 2) {
                        echo "<tr><td>" . htmlspecialchars($parts[0]) . "</td><td>" . htmlspecialchars($parts[1]) . "</td></tr>";
                    }
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No hay nada en la agenda , sorry</p>";
            }
        } else {
            echo "<p>La agenda esta vacia</p>";
        }
        ?>
        <a href="index.php">Volver al menu</a>
    </div>
</body>
</html>
