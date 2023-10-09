
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración - Resultados de Búsqueda</title>
</head>
<body>
    <h1>Resultados de Búsqueda</h1>

 <!-- Tabla para mostrar los resultados -->
    <table border="1">
        
        <tr>  <!-- Encabezados de la tabla -->
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>

        <?php
        // Mostrar los datos de cada usuario
    
        // Iterar sobre los resultados y mostrar cada usuario en una fila de la tabla
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>"; // Mostrar el ID del usuario
            echo "<td>" . $row["nombre"] . "</td>"; // Mostrar el nombre del usuario
            echo "<td>" . $row["apellido"] . "</td>"; // Mostrar el apellido del usuario
            echo "<td>" . $row["email"] . "</td>"; // Mostrar el email del usuario
            echo "<td><a href='view/historial_usuarios.php?id=" . $row["id"] . "'>Historial</a>"; // Enlace al historial del usuario
            echo "<button onclick='confirmarEliminar(" . $row["id"] . ")'>Eliminar</button></td>"; // Botón para eliminar el usuario
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
