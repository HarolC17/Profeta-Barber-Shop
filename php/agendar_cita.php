<?php
session_start();
include 'conexion_be.php'; // Asegúrate de que la conexión se realiza correctamente

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

// Obtener datos del formulario
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$usuario = $_SESSION['usuario'];

// Insertar la cita en la base de datos
$query = "INSERT INTO citas (usuario, fecha, hora) VALUES ('$usuario', '$fecha', '$hora')";
$result = mysqli_query($conexion, $query);

// Verificar si la cita se ha agendado correctamente
if ($result) {
    echo "Cita agendada exitosamente.";
} else {
    echo "Error al agendar la cita: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>
