<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Proyecto Académico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .form-card { max-width: 600px; margin: 50px auto; }
    </style>
</head>
<body>

<div class="container">
    <div class="card form-card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h3>Registrar Nuevo Proyecto</h3>
        </div>
        <div class="card-body">
            <form action="procesar_agregar.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nombre del proyecto</label>
                    <input type="text" name="nombre_proyecto" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre del estudiante</label>
                    <input type="text" name="nombre_estudiante" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tecnología principal</label>
                    <input type="text" name="tecnologia_principal" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de entrega</label>
                    <input type="date" name="fecha_entrega" class="form-control">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Guardar Proyecto</button>
                    <a href="index.php" class="btn btn-link mt-2">Volver al listado</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>