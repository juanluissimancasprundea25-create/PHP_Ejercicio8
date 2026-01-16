<?php
$resultados = [];
$buscado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $buscado = trim($_POST['nombre'] ?? '');
    if ($buscado) {
        $file = 'agenda.txt';
        // Buscamos si existe el archivo de la agenda y leemos las lineas tomando en cuenta que saltamos las que estan vacias

        if (file_exists($file)) {
            $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                $parts = explode('|', $line);
                if (count($parts) == 2 && stripos($parts[0], $buscado) !== false) {
                    $resultados[] = $parts;
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar contacto</title>
    <!-- Lo mismo que en apartado de list_agenda , centralizamos las cosas y lo ponemos mas "bonito" -->

    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        .container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        input[type="text"] { width: 100%; padding: 8px; margin: 10px 0; }
        button { background: #17a2b8; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
        a { display: inline-block; margin-top: 15px; color: #007BFF; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Creamos la tabla donde buscaremos los contactos -->
         
        <h2>Buscar contacto</h2>
        <form method="POST">
            <input type="text" name="nombre" placeholder="Que nombre buscas" value="<?= htmlspecialchars($buscado) ?>" required>
            <button type="submit">Buscar contacto</button>
        </form>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <?php if (!empty($resultados)): ?>
                <h3>El contacto es:</h3>
                <table>
                    <thead><tr><th>Nombre</th><th>Telefono</th></tr></thead>
                    <tbody>
                        <?php foreach ($resultados as $r): ?>
                            <tr>
                                <td><?= htmlspecialchars($r[0]) ?></td>
                                <td><?= htmlspecialchars($r[1]) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="color: red;">Ese contacto no existe sorry , intenta con otro si eso</p>
            <?php endif; ?>
        <?php endif; ?>
        <a href="index.php">Volver al menu</a>
    </div>
</body>
</html>
