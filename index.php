<?php
include 'conexion.php';

// Manejo de búsqueda
$busqueda = isset($_GET['buscar']) ? $conn->real_escape_string($_GET['buscar']) : '';
$sql = "SELECT * FROM proyectos";
if ($busqueda != '') {
    $sql .= " WHERE nombre_proyecto LIKE '%$busqueda%' OR nombre_estudiante LIKE '%$busqueda%'";
}
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Proyectos Académicos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; font-family: 'Poppins', sans-serif; }
        .card { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); padding: 20px; }
        .table thead { background-color: #2c3e50; color: white; border-radius: 10px; }
        .table tbody tr { transition: all 0.3s ease; }
        .table tbody tr:hover { background-color: #e8f4fd; transform: scale(1.01); }
        .btn-edit { background: #3498db; color: white; border-radius: 10px; transition: 0.3s; }
        .btn-delete { background: #e74c3c; color: white; border-radius: 10px; transition: 0.3s; }
        .btn-edit:hover { background: #2980b9; transform: rotate(5deg); color: white; }
        .btn-delete:hover { background: #c0392b; transform: scale(1.1); color: white; }
        .badge { padding: 8px 15px; border-radius: 50px; animation: pulse 2s infinite; }
        @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.05); } 100% { transform: scale(1); } }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-primary fw-bold text-center">Gestor de Proyectos Académicos</h2>
    
    <div class="d-flex justify-content-between mb-4">
        <a href="agregar.php" class="btn btn-success rounded-pill shadow-sm"><i class="bi bi-plus-circle"></i> Nuevo Proyecto</a>
        <form class="d-flex" method="GET">
            <input class="form-control me-2 rounded-pill" type="search" name="buscar" placeholder="Buscar..." value="<?php echo htmlspecialchars($busqueda); ?>">
            <button class="btn btn-primary rounded-pill" type="submit">Buscar</button>
        </form>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="text-center">
                    <tr>
                        <th>Proyecto</th>
                        <th>Estudiante</th>
                        <th>Tecnología</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php while($row = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($row['nombre_proyecto']); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['nombre_estudiante']); ?></td>
                        <td><span class="badge bg-secondary"><?php echo htmlspecialchars($row['tecnologia_principal']); ?></span></td>
                        <td>
                            <?php 
                                $color = ($row['estado'] == 'Completado') ? 'bg-success' : 'bg-warning text-dark';
                                echo "<span class='badge $color'>{$row['estado']}</span>";
                            ?>
                        </td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['id_proyecto']; ?>" class="btn btn-sm btn-edit"><i class="bi bi-pencil-square"></i></a>
                            <a href="eliminar.php?id=<?php echo $row['id_proyecto']; ?>" class="btn btn-sm btn-delete" onclick="return confirm('¿Seguro que deseas eliminar?')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>