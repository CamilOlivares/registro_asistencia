<?php
//Este código en PHP se encarga de verificar si hay un usuario autenticado almacenado en la sesión 
//($_SESSION["user_id"]). Si existe, realiza una consulta a la base de datos para obtener información asociada a ese usuario. 

if (isset($_SESSION["user_id"])) {
    // Prepara la consulta para obtener información del usuario
    $records = $conn->prepare("SELECT id, email, password FROM users WHERE id = :id");
    $records->bindParam(":id", $_SESSION["user_id"]); // Vincula el parámetro
    $records->execute(); // Ejecuta la consulta
    $results = $records->fetch(PDO::FETCH_ASSOC); // Obtiene los resultados como un array asociativo
    $user = null;

    if (is_array($results) && count($results) > 0) {
        $user = $results; // Si hay resultados, asigna el usuario
    }
}
?>
