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
    $nombre = $_POST['nombre'];
    $seg_nom = $_POST['seg_nom'];
    $ap_pat = $_POST['ap_pat'];
    $ap_mat = $_POST['ap_mat'];
    $telefono = $_POST['telefono'];
    $domicilio = $_POST['domicilio'];
    $sexo = $_POST['sexo'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO cliente (Nombre, Seg_nom, Ap_pat, Ap_mat, Telefono, Domicilio, Sexo) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    // Aquí está la corrección en la cantidad de tipos
    $stmt->bind_param("sssssss", $nombre, $seg_nom, $ap_pat, $ap_mat, $telefono, $domicilio, $sexo);

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
    <title>Agregar Cliente</title>
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
    <h1>Agregar Cliente</h1>
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

<!-- Formulario para agregar cliente -->
<form method="POST" action="">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="seg_nom">Segundo Nombre:</label>
    <input type="text" id="seg_nom" name="seg_nom" required>

    <label for="ap_pat">Apellido Paterno:</label>
    <input type="text" id="ap_pat" name="ap_pat" required>

    <label for="ap_mat">Apellido Materno:</label>
    <input type="text" id="ap_mat" name="ap_mat" required>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" required>

    <label for="domicilio">Domicilio:</label>
    <input type="text" id="domicilio" name="domicilio" required>

    <label for="sexo">Sexo:</label>
    <input type="text" id="sexo" name="sexo" required>

    <button type="submit">Registrar Cliente</button>
</form>

<footer>
    <p>&copy; 2024 Construjilo. Todos los derechos reservados.</p>
    <p><a href="https://wa.me/525528958554">Contáctanos por WhatsApp</a></p>
</footer>

</body>
</html>
