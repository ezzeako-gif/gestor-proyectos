<?php
include 'conexion.php';

// Recibir datos del formulario
$nombre_p = $_POST['nombre_proyecto'];
$nombre_e = $_POST['nombre_estudiante'];
$tec = $_POST['tecnologia_principal'];
$desc = $_POST['descripcion'];
$fecha = $_POST['fecha_entrega'];

// Insertar en la base de datos
$sql = "INSERT INTO proyectos (nombre_proyecto, nombre_estudiante, tecnologia_principal, descripcion, fecha_entrega) 
        VALUES ('$nombre_p', '$nombre_e', '$tec', '$desc', '$fecha')";

if ($conn->query($sql) === TRUE) {
    echo "Proyecto registrado con éxito. <a href='index.php'>Volver al listado</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>