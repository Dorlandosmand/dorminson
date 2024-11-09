<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Envíos</title>
    <style>
        /* Estilo del cuerpo de la página */
        body {
            background-color: #f5f5dc;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Header */
        header {
            background-color: #d2b48c;
            padding: 20px;
            text-align: center;
        }

        /* Título de la página */
        h1 {
            margin: 0;
            font-size: 2em;
            font-weight: bold;
            color: #5b3a29;
        }

        /* Tabla de envíos */
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #e8dcb3;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #5b3a29;
            color: #5b3a29;
        }

        th {
            background-color: #9e7b5b;
            color: #fff;
            font-size: 1.2em;
        }

        td {
            font-size: 1em;
        }

        /* Paginación */
        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .pagination a {
            color: #5b3a29;
            margin: 0 5px;
            padding: 10px 15px;
            text-decoration: none;
            border: 1px solid #5b3a29;
            border-radius: 5px;
            background-color: #e8dcb3;
        }

        .pagination a.active {
            font-weight: bold;
            background-color: #9e7b5b;
            color: #fff;
        }

        .pagination a:hover {
            background-color: #8c6b4f;
            color: #fff;
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

        /* Estilos para el menú desplegable */
        #menu-items {
            display: none;
            padding: 0;
            margin: 0;
            list-style-type: none;
            flex-direction: row;
            justify-content: center;
            gap: 15px;
        }

        /* Mostrar el menú de forma horizontal cuando esté abierto */
        #main-nav.open #menu-items {
            display: flex;
        }

        /* Estilo para los elementos del menú */
        #menu-items li {
            margin: 0;
        }

        /* Estilo para los enlaces del menú */
        #menu-items li a {
            font-family: 'Arial', sans-serif;
            font-size: 1.2rem;
            color: #fff;
            background-color: #9e7b5b; /* Color marrón claro */
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
            border-left: 4px solid #5b3a29; /* Color marrón oscuro */
        }

        /* Estilo de hover para los enlaces */
        #menu-items li a:hover {
            background-color: #8c6b4f; /* Color marrón más fuerte para hover */
        }

        /* Botón de menú */
#menu-toggle-btn {
    font-family: 'Arial', sans-serif;
    font-size: 1.2rem;
    color: #fff;
    background-color: #8c6b4f; /* Color marrón más fuerte */
    padding: 10px 20px;
    text-align: center;
    cursor: pointer;
    border-radius: 8px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
    transition: background-color 0.3s ease;
}

/* Efecto hover para el botón de menú */
#menu-toggle-btn:hover {
    background-color: #7b5d42; /* Color aún más fuerte al pasar el ratón */
}
    </style>
</head>
<body>

<header>
    <h1>Lista de Artículos</h1>
<br><br>
            <!-- Menú desplegable -->
            <nav id="main-nav">
            <div id="menu-toggle-btn">Menú</div>
            <br>
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
        <br><br>
</header>

<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "construjilo";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Variables de paginación
$limit = 10; // Envíos por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Consulta a la vista con límite y desplazamiento
$sql = "SELECT * FROM vista_envios LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// Mostrar los resultados en una tabla
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID Envío</th><th>ID Chofer</th><th>ID Vehículo</th><th>ID Cliente</th><th>Fecha de Envío</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id_envio"] . "</td><td>" . $row["chofer_id"] . "</td><td>" . $row["veiculo_id"] . "</td><td>" . $row["cliente_id"] . "</td><td>" . $row["Fecha_envio"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align: center;'>No hay envíos disponibles</p>";
}

// Contar el total de envíos para la paginación
$sql_total = "SELECT COUNT(*) AS total FROM vista_envios";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_items = $row_total['total'];
$total_pages = ceil($total_items / $limit);

// Enlaces de paginación
echo "<div class='pagination'>";
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        echo "<a class='active' href='?page=$i'>$i</a>";
    } else {
        echo "<a href='?page=$i'>$i</a>";
    }
}
echo "</div>";

// Cerrar la conexión
$conn->close();
?>
<script>
    // Obtener el botón y el contenedor del menú
    const menuToggleBtn = document.getElementById('menu-toggle-btn');
    const mainNav = document.getElementById('main-nav');

    // Evento de clic para mostrar/ocultar el menú
    menuToggleBtn.addEventListener('click', function() {
        mainNav.classList.toggle('open'); // Alternar la clase 'open' para el menú
    });
</script>
</body>
<footer>
    <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
    <p><a href="https://wa.me/1234567890">Contáctanos por WhatsApp</a></p>
</footer>
</html>