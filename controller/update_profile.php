<?php
session_start(); // Inicia la sesión

// Verifica si la solicitud es de tipo POST y si hay un usuario en sesión
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["user_id"])) {
    require __DIR__ . "/../database.php"; 

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $user_id = $_SESSION["user_id"]; // Obtiene el ID del usuario en sesión

    try {
        // Actualizar los datos del usuario en la base de datos
        $stmt = $conn->prepare("UPDATE users SET nombre = :nombre, apellido = :apellido, usuario = :usuario, email = :email WHERE id = :user_id");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellido", $apellido);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute(); // Ejecuta la consulta de actualización

        // Redirige a la página de perfil con un mensaje de éxito
        header("Location: ../view/profile.php?update=success");
        exit(); // Termina el script
    } catch (PDOException $error) {
        // Redirige a la página de error con el mensaje de error
        header("Location: ../view/view_error.html?error_message=" . urlencode("Error en la actualización de datos: " . $error->getMessage()));
        exit(); // Termina el script
    }
} else {
    // Redirige a la página de error con un mensaje de acceso no válido
    header("Location: ../view/view_error.html?error_message=" . urlencode("Acceso no válido."));
    exit(); // Termina el script
}
?>
