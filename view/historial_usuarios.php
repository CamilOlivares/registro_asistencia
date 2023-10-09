<!DOCTYPE html>
<html>
<head>
    <title>Historial de Registros</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Historial de Registros</h1>
     <!-- Sección para mostrar el historial de registros -->
     <h2>Historial de Registros</h2>
    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Tipo de Registro</th>
                <th>Fecha y Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Obtener y mostrar el historial de registros
            require __DIR__ . "/../database.php";
            $historial_query = $conn->query("SELECT * FROM registros_asistencia");
            if ($historial_query) {
                while ($row = $historial_query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['tipo_registro'] . "</td>";
                    echo "<td>" . $row['fecha_hora'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "Debes iniciar sesión para acceder a esta página.";
            }
            ?>
        </tbody>
    </table>

    <a href="../panel_admin.php">
        <button>Volver al Panel de Administración</button>
    </a>
</body>
</html>