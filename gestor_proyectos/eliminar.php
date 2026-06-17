<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Aseguramos que sea un número
    $sql = "DELETE FROM proyectos WHERE id_proyecto = $id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=eliminado");
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}
$conn->close();
?>
