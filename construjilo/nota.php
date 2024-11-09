<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Cambia esto si usas una contraseña
$dbname = "construjilo"; // Cambia esto por tu nombre de base de datos real

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['cliente_id'];
    $articulo_id = $_POST['articulo_id'];
    $envio_id = $_POST['envio_id'];
    $estatus_id = $_POST['estatus_id'];
    $cantidad = $_POST['cantidad'];
    $iva = $_POST['IVA'];
    $importe = $_POST['Importe'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO nota (cliente_id, articulo_id, envio_id, estatus_id, cantidad, IVA, Importe) VALUES ('$cliente_id', '$articulo_id', '$envio_id', ' $estatus_id', '$cantidad', '$iva', '$importe')";
    $stmt = $conn->prepare($sql);
    
    // Comprobar si la preparación fue exitosa
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Registro insertado con éxito.";
    } else {
        echo "Error al insertar registro: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Detalle de Envío</title>
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
    <h1>Agregar Detalle de Envío</h1>
</header>

<!-- Menú desplegable -->
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

<script>
    // Obtener el botón y el contenedor del menú
    const menuToggleBtn = document.getElementById('menu-toggle-btn');
    const mainNav = document.getElementById('main-nav');

    // Evento de clic para mostrar/ocultar el menú
    menuToggleBtn.addEventListener('click', function() {
        mainNav.classList.toggle('open'); // Alternar la clase 'open' para el menú
    });
</script>

<!-- Formulario para agregar detalle de envío -->
<form method="POST" action="">
    <label for="cliente_id">ID del Cliente:</label>
    <input type="number" id="cliente_id" name="cliente_id" required>

    <label for="articulo_id">ID del Artículo:</label>
    <input type="number" id="articulo_id" name="articulo_id" required>

    <label for="envio_id">ID del Envío:</label>
    <input type="number" id="envio_id" name="envio_id" required>

    <label for="estatus_id">ID del Estatus:</label>
    <input type="number" id="estatus_id" name="estatus_id" required>

    <label for="cantidad">Cantidad:</label>
    <input type="number" id="cantidad" name="cantidad" required>

    <label for="IVA">IVA:</label>
    <input type="number" step="0.01" id="IVA" name="IVA" required>

    <label for="Importe">Importe:</label>
    <input type="number" step="0.01" id="Importe" name="Importe" required>

    <button type="submit">Agregar</button>
</form>

<footer>
    <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
    <p><a href="https://wa.me/1234567890">Contáctanos por WhatsApp</a></p>
</footer>

</body>
</html>
