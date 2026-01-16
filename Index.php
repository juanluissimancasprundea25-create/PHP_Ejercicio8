<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <!-- Estilo para hacer que se vea mas bonito el html -->

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            width: 300px;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            font-size: 16px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Añadimos los botones para poner las funciones -->
     
    <div class="container">
        <h1>Agenda</h1>
        <a href="añadir_contacto.php" class="btn">Añadir contacto</a>
        <a href="listar_agenda.php" class="btn">Listar agenda</a>
        <a href="buscar_contacto.php" class="btn">Buscar contacto</a>
    </div>
</body>
</html>
