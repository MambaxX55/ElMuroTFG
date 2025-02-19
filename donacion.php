<?php
include('scripts/.php/conexion.php');

$idDonacion = $_GET['donacion'];

$dataDonacion = mysqli_query($conn, "SELECT * FROM donaciones WHERE idDonacion = '$idDonacion'");
$donacion = mysqli_fetch_array($dataDonacion);

if ($donacion) {
    $idUsuario = $donacion['idUsuario'];

    $dataUsuario = mysqli_query($conn, "SELECT nombreUsuario, fotoPerfil FROM usuarios WHERE idUsuario = '$idUsuario'");
    $usuario = mysqli_fetch_array($dataUsuario);
} else {
    echo "No se encontró la donación.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donación</title>
    <link rel="stylesheet" href="scripts/.css/donacion.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="hero">
        <h1><a href="index.php">Más Allá Del Muro</a></h1>
    </header>

    <section class="donacion-section">
        <h2><?php echo htmlspecialchars($donacion["nombreDonacion"]); ?></h2>

        <div class="donacion-imagen-container">
            <img class="donacion-imagen" src="<?php echo $donacion["imagenDonacion"]; ?>" alt="Imagen de la donación">
        </div>

        <div class="descripcion">
            <p><?php echo nl2br(htmlspecialchars($donacion["descripcion"])); ?></p>
        </div>

        <div class="total-recaudado">
            <h3>Total Recaudado: $<?php echo number_format($donacion["totalRecaudado"], 2); ?></h3>
        </div>

        <div class="usuario-info">
            <div class="usuario-imagen">
                <img src="<?php echo $usuario["fotoPerfil"]; ?>" alt="Foto de usuario">
            </div>
            <div class="nombre-usuario">
                <p><?php echo htmlspecialchars($usuario["nombreUsuario"]); ?></p>
            </div>
        </div>

        <a href="scripts/.html/hacerDonacion.html" class="btn-donar">Donar</a>
    </section>
</body>
</html>

<?php
$conn->close();
?>

