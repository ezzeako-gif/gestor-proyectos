<?php
include 'conexion.php';

$sql = "CREATE TABLE proyectos (
    id_proyecto INT AUTO_INCREMENT PRIMARY KEY,
    nombre_proyecto VARCHAR(100) NOT NULL,
    nombre_estudiante VARCHAR(100) NOT NULL,
    tecnologia_principal VARCHAR(50),
    descripcion TEXT,
    fecha_entrega DATE,
    estado VARCHAR(20) DEFAULT 'Pendiente'
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla 'proyectos' creada correctamente.";
} else {
    echo "Error al crear la tabla: " . $conn->error;
}

$conn->close();
?>