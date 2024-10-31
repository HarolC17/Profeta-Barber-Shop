<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "login_register_db");

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta para obtener las citas
$query = "SELECT usuario, fecha, hora FROM citas ORDER BY fecha, hora";
$result = mysqli_query($conexion, $query);

// Verificar si hay citas disponibles
$citas = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $citas[] = $row;
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas Administrador</title>
    <link rel="stylesheet" href="assets/css/estilosAdmin.css"> <!-- Añadir tu archivo CSS aquí -->
    <script src="assets/js/filtrarCitas.js" defer></script> <!-- Incluye el archivo JavaScript -->
</head>
<body style="background-color: #e0f7fa;"> <!-- Fondo azul claro -->
    <header>
        <h1>Lista de Citas Disponibles</h1>
        <button onclick="window.location.href='index.php'">Cerrar Sesión</button> <!-- Botón para cerrar sesión -->
    </header>

    <main>
        <div class="filtros">
            <input type="date" id="filterFecha" oninput="filtrarTabla()">
            <input type="text" id="filterHora" placeholder="Filtrar por hora (HH:MM)" onkeyup="filtrarTabla()">
        </div>

        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody id="tablaCitas">
                <?php if (!empty($citas)): ?>
                    <?php foreach ($citas as $cita): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cita['usuario']); ?></td>
                            <td><?php echo htmlspecialchars($cita['fecha']); ?></td>
                            <td><?php echo htmlspecialchars($cita['hora']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No hay citas disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
