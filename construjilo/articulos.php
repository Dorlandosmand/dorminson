<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Artículo</title>
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

    <!-- Encabezado con el título y el menú -->
    <header>
        <h1>Agregar Artículo</h1>
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

    <!-- Formulario de Artículo -->
    <form action="" method="POST">
        <label for="nombre">Nombre del artículo:</label>
        <input type="text" id="nombre" name="nombre" maxlength="15" required>
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" maxlength="15" required>
        <button type="submit">Guardar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conexión a la base de datos
        $host = "localhost";
        $usuario = "root";
        $password = "";
        $base_datos = "construjilo";

        $conn = new mysqli($host, $usuario, $password, $base_datos);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];

        $sql = "INSERT INTO articulo (Nomre, Precio) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nombre, $precio);

        if ($stmt->execute()) {
            echo "<p style='text-align: center; color: green;'>Artículo agregado exitosamente.</p>";
        } else {
            echo "<p style='text-align: center; color: red;'>Error al agregar el artículo: " . $conn->error . "</p>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>

    <!-- Footer -->
    <footer>
        <p>Dorminson &copy; 2024</p>
        <p><a href="https://wa.me/5545279440">Contáctanos por WhatsApp</a></p>
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
