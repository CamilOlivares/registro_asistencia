<?php
require __DIR__ . "/../database.php";

// Verifica si la solicitud es de tipo POST y si se envió un parámetro de búsqueda
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['busqueda'])) {
    // Obtiene el término de búsqueda del formulario
    $busqueda = $_POST['busqueda'];

    // Construye la consulta SQL para buscar usuarios que coincidan con el término de búsqueda
    $sql = "SELECT * FROM users WHERE 
            nombre LIKE '%$busqueda%' OR 
            apellido LIKE '%$busqueda%' OR 
            email LIKE '%$busqueda%'";
} else {
    // Si no se envió un término de búsqueda, se obtienen todos los usuarios
    $sql = "SELECT * FROM users";
}

// Prepara la consulta SQL
$stmt = $conn->prepare($sql);

// Ejecuta la consulta SQL
$stmt->execute();

// Verificar si hay resultados
$resultCount = $stmt->rowCount();

if ($resultCount > 0) {
    // Puedes devolver los resultados o hacer más con ellos según sea necesario
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $results = array();  // No hay resultados, inicializa un array vacío
}
?>
