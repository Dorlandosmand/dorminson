<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto si usas otro usuario
$password = ""; // Cambia esto si usas una contraseña
$dbname = "construjilo"; // Cambia esto por tu nombre de base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $seg_nom = $_POST['seg_nom'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];

    // Consulta para insertar datos
    $sql = "INSERT INTO chofer (Nombre, Seg_nom, Telefono, Correo, Direccion) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $seg_nom, $telefono, $correo, $direccion);

    if ($stmt->execute()) {
        echo "Registro insertado con éxito";
    } else {
        echo "Error al insertar registro: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Chofer</title>
    <style>
        /* Estilo del cuerpo de la página */
        body {
            background-color: #f5f5dc; /* Color beige claro */
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Header */
        header {
            background-color: #d2b48c; /* Café claro */
            padding: 20px;
            text-align: center;
        }

        /* Título de la página */
        h1 {
            margin: 0;
            font-size: 2em;
            font-weight: bold;
            color: #5b3a29; /* Marrón oscuro */
        }

        /* Menú */
        #main-nav {
            display: flex;
            justify-content: center;
            margin: 10px 0;
        }

        #menu-toggle-btn {
            cursor: pointer;
            font-size: 1.5rem;
            color: #fff;
            background-color: #8c6b4f; /* Marrón medio */
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border: none;
            margin-bottom: 10px;
        }

        #menu-items {
            display: none;
            list-style-type: none;
            padding: 0;
            margin: 10px;
            flex-direction: row;
        }

        #main-nav.open #menu-items {
            display: flex;
        }

        #menu-items li {
            margin: 0 10px;
        }

        #menu-items li a {
            font-size: 1.2rem;
            color: #fff;
            background-color: #9e7b5b;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 8px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
            display: inline-block;
        }

        #menu-items li a:hover {
            background-color: #8c6b4f;
        }

        /* Estilos del formulario */
        form {
            background-color: #e8dcb3;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            margin: 20px auto;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label, input, button {
            font-size: 1rem;
            color: #5b3a29;
            margin: 10px 0;
            width: 100%;
            max-width: 300px;
        }

        input {
            padding: 8px;
            border: 1px solid #5b3a29;
            border-radius: 5px;
        }

        button {
            color: #fff;
            background-color: #7c5c45;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        button:hover {
            background-color: #8c6b4f;
        }

        footer {
            background-color: #d2b48c; /* Café claro */
            color: #fff;
            text-align: center;
            padding: 20px;
            width: 100%;
            position: relative; /* Cambiado de fixed a relative */
            bottom: 0;
        }

        footer a {
            color: #4b3d3d; /* Color oscuro para los enlaces */
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <h1>Agregar Chofer</h1>
    <nav id="main-nav">
        <div id="menu-toggle-btn">Menú</div>
        <ul id="menu-items">
            <li><a href="cliente.php">Cliente</a></li>
            <li><a href="choferes.php">Choferes</a></li>
            <li><a href="autos.php">Automóviles</a></li>
            <li><a href="articulos.php">Artículos</a></li>
            <li><a href="envio.php">Envíos</a></li>
            <li><a href="nota.php">Notas</a></li>
            <li><a href="vista.php">Vistas</a></li>
        </ul>
    </nav>
</header>

<main>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="seg_nom">Segundo Nombre:</label>
        <input type="text" name="seg_nom" id="seg_nom" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" required>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" required>

        <button type="submit">Agregar Chofer</button>
    </form>
</main>

<footer>
    <p>Dorminson &copy; 2024</p>
    <p></p>
    <p>
        <a href="https://wa.me/5545279440">Contáctanos por WhatsApp</a>
    </p>
</footer>

<script>
    const menuToggleBtn = document.getElementById('menu-toggle-btn');
    const mainNav = document.getElementById('main-nav');

    menuToggleBtn.addEventListener('click', function() {
        mainNav.classList.toggle('open');
    });
</script>

</body>
</html>
