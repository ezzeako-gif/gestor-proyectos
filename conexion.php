<?php
// Credenciales de tu base de datos en Filess.io
$host = "smw0g7.h.filess.io"; 
$usuario = "Examen_lovelyelse";
$password = "9b997f376466c888e8771e48bd6acc7e7111b413";
$base_datos = "Examen_lovelyelse"; // Generalmente coincide con el usuario
$puerto = 61002;

// Crear la conexión
$conn = new mysqli($host, $usuario, $password, $base_datos, $puerto);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
// Si llegas aquí, la conexión funciona correctamente
?>