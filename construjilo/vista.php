<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vistas autos</title>
    <style>
        /* Estilo del cuerpo de la página */
        body {
            background-color: #f5f5dc; /* Color beige claro */
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Estilos para el contenedor de logo y h1 */
        #logo-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        /* Estilos para el logo */
        #Logo {
            margin-top: 20px;
        }

        /* Ocultar logo cuando el menú está abierto */
        #logo-section.hide-logo #Logo {
            display: none;
        }

        /* Estilos para el h1 */
        #xd {
            margin-top: 20px;
            font-size: 2em;
            font-weight: bold;
            color: #5b3a29; /* Marrón oscuro */
            text-align: center;
        }

        /* Estilo para el botón del menú */
        #menu-toggle-btn {
            cursor: pointer;
            font-family: 'Arial', sans-serif;
            font-size: 1.5rem;
            color: #fff;
            background-color: #7c5c45; /* Color marrón medio */
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border: none;
            text-align: center;
            margin-bottom: 10px;
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
    </style>
</head>
<body>
<header>
    <section id="logo-section">
        <img id="Logo" src="img/dorminson.png" alt="consultorio">
        <h1 id="xd">Bienvenido al Dorminson</h1>

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
    </section>
    <br>
</header>
<!-- Sección Vistas con estilos -->
<section class="vistas-section">
    <div class="vistas-block">
        <a href="vista_arti.php">Vista de artículos</a>
    </div>
    <div class="vistas-block">
        <a href="vista_cliente.php">Vista de clientes</a>
    </div>
    <div class="vistas-block">
        <a href="vista_envio.php">Vista de envíos</a>
    </div>
    <div class="vistas-block">
        <a href="vista_nota.php">Vista de notas</a>
    </div>
</section>

<style>
    /* Estilos para la sección de vistas */
    .vistas-section {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: center;
        padding: 20px;
        background-color: #f5f5dc; /* Fondo beige claro */
    }

    .vistas-block {
        background-color: #d2b48c; /* Café claro */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        padding: 15px 20px;
    }

    .vistas-block a {
        color: #fff; /* Texto blanco */
        font-size: 1.2rem;
        font-weight: bold;
        text-decoration: none;
        padding: 10px 20px;
        display: inline-block;
        background-color: #8c6b4f; /* Marrón medio */
        border-radius: 5px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
        transition: background-color 0.3s ease;
    }

    .vistas-block a:hover {
        background-color: #5b3a29; /* Marrón oscuro */
    }
</style>

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