<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id_proyecto']);
    $nombre = $conn->real_escape_string($_POST['nombre_proyecto']);
    $estudiante = $conn->real_escape_string($_POST['nombre_estudiante']);
    $tec = $conn->real_escape_string($_POST['tecnologia_principal']);
    $estado = $conn->real_escape_string($_POST['estado']);

    $sql = "UPDATE proyectos SET 
            nombre_proyecto = '$nombre', 
            nombre_estudiante = '$estudiante', 
            tecnologia_principal = '$tec', 
            estado = '$estado' 
            WHERE id_proyecto = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?exito=1");
    } else {
        echo "Error actualizando: " . $conn->error;
    }
}
?>