<?php
require __DIR__ . "/../database.php";

// Obtener los datos del usuario desde la base de datos
$user_id = $_SESSION["user_id"]; // Obtiene el ID del usuario en sesión
$stmt = $conn->prepare("SELECT nombre, apellido, usuario, email FROM users WHERE id = :user_id"); // Prepara la consulta SQL
$stmt->bindParam(":user_id", $user_id); // Asocia el parámetro :user_id con el valor de $user_id
$stmt->execute(); // Ejecuta la consulta
$row = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene la fila de resultados como un array asociativo
?>
