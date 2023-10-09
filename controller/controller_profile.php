<?php

require __DIR__ . "/../database.php";

// Verifica si la solicitud es de tipo POST y si el usuario tiene una sesión activa
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["user_id"])) {
    

    $user_id = $_SESSION["user_id"]; // Obtiene el ID del usuario de la sesión
    $nombre = $_POST['nombre']; // Obtiene el nombre del formulario
    $apellido = $_POST['apellido']; // Obtiene el apellido del formulario
    $usuario = $_POST['usuario']; // Obtiene el usuario del formulario
    $email = $_POST['email']; // Obtiene el correo electrónico del formulario

    try {
        // Prepara y ejecuta la consulta para actualizar los datos del usuario en la base de datos
        $stmt = $conn->prepare("UPDATE users SET nombre = :nombre, apellido = :apellido, usuario = :usuario, email = :email WHERE id = :user_id");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellido", $apellido);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();

        // Redirige a la página de perfil con un mensaje de éxito en la actualización
        header("Location: ../view/view_profile.html?update=success");
        exit();
    } catch (PDOException $error) {
        // En caso de error, muestra un mensaje indicando el error en la actualización
        echo "Error en la actualización de datos: " . $error->getMessage();
    }
} else {
    
    exit();
}
?>
