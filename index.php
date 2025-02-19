<?php
include('scripts/.php/conexion.php');

$sql = "SELECT idDonacion, nombreDonacion, imagenDonacion FROM donaciones";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Más Allá Del Muro</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="scripts/.css/index.css">
</head>
<body>

    <section class="hero">
        <h1>Más Allá Del Muro</h1>
    </section>

    <section class="descripcion">
        <p>El peligro acecha más allá del muro. Los caminantes blancos liderados por el Rey de la Noche se acercan a Poniente y el muro es lo único que los separa del reino. La Guardia de la Noche y el Pueblo Libre hemos creado esta página para que todo aquel que quiera aportar a la causa pueda hacerlo. Encontraréis todo tipo de causas a las que podréis aportar, toda ayuda será bien recibida. El reino os necesita, ¡conseguiremos evitar la larga noche!</p>
    </section>

    <section class="donaciones">
        <h2>Donaciones Disponibles</h2>
        <div class="donaciones-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='donacion'>";
                    echo "<a href='donacion.php?donacion=" . $row["idDonacion"] . "'>";
                    echo "<img src='" . $row["imagenDonacion"] . "' alt='" . htmlspecialchars($row["nombreDonacion"], ENT_QUOTES) . "'>";
                    echo "</a>";
                    echo "<a href='donacion.php?donacion=" . $row["idDonacion"] . "'>" . htmlspecialchars($row["nombreDonacion"], ENT_QUOTES) . "</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay donaciones disponibles.</p>";
            }
            ?>
        </div>
    </section>
    <footer>
         <p>&copy; Más Allá Del Muro. Todos los derechos reservados.</p>
    </footer>

</body>
</html>

<?php
$conn->close();
?>

