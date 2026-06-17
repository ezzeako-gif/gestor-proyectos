<?php
include 'conexion.php';

// Verificar si se recibió el ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("<div class='alert alert-danger'>Error: ID de proyecto no especificado. <a href='index.php'>Volver</a></div>");
}

$id = intval($_GET['id']);

// Consultar los datos actuales
$sql = "SELECT * FROM proyectos WHERE id_proyecto = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 0) {
    die("<div class='alert alert-warning'>Proyecto no encontrado. <a href='index.php'>Volver</a></div>");
}

$row = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Proyecto</title>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Editar Proyecto: <?php echo htmlspecialchars($row['nombre_proyecto']); ?></h4>
        </div>
        <div class="card-body p-4">
            <form action="procesar_editar.php" method="POST">
                <input type="hidden" name="id_proyecto" value="<?php echo $row['id_proyecto']; ?>">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nombre del Proyecto</label>
                        <input type="text" name="nombre_proyecto" class="form-control" value="<?php echo htmlspecialchars($row['nombre_proyecto']); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nombre del Estudiante</label>
                        <input type="text" name="nombre_estudiante" class="form-control" value="<?php echo htmlspecialchars($row['nombre_estudiante']); ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Tecnología Principal</label>
                    <input type="text" name="tecnologia_principal" class="form-control" value="<?php echo htmlspecialchars($row['tecnologia_principal']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Estado</label>
                    <select name="estado" class="form-select">
                        <option value="Pendiente" <?php echo ($row['estado'] == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                        <option value="En Proceso" <?php echo ($row['estado'] == 'En Proceso') ? 'selected' : ''; ?>>En Proceso</option>
                        <option value="Completado" <?php echo ($row['estado'] == 'Completado') ? 'selected' : ''; ?>>Completado</option>
                    </select>
                </div>

                <div class="text-end">
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary px-4">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>