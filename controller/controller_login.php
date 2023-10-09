<?php

// Requerir la conexión a la base de datos y otras dependencias
require __DIR__ . "/../database.php";

// Verifica si el usuario ya está autenticado (tiene una sesión activa)
if (isset($_SESSION["user_id"])) {
    // Redirige al usuario a la página de registro de asistencia y finaliza el script
    header("Location: /registro_asistencia.php");
    exit();
}

$message = ""; // Variable para almacenar mensajes de error o información

// Verifica si se enviaron datos de inicio de sesión (email y contraseña)
if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    // Prepara una consulta SQL para obtener los datos del usuario a partir del email
    $records = $conn->prepare("SELECT id, nombre, apellido, usuario, email, password FROM users WHERE email = :email");
    $records->bindParam(":email", $_POST["email"]);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC); // Obtiene los resultados de la consulta

    // Verifica si se encontraron resultados y si la contraseña es correcta
    if ($results && password_verify($_POST["password"], $results["password"])) {
        // Almacena información del usuario en variables de sesión
        $_SESSION["user_id"] = $results["id"];
        $_SESSION["nombre"] = $results["nombre"];
        $_SESSION["apellido"] = $results["apellido"];
        $_SESSION["usuario"] = $results["usuario"];
        $_SESSION["email"] = $_POST["email"];

        // Redirige al usuario a la página de registro de asistencia y finaliza el script
        header("Location: /registro_asistencia.php");
        exit();
    } else {
        $message = "Lo sentimos, esas credenciales no coinciden.";
    }
}

// Se Puede incluir aquí más lógica o manipulación de datos antes de requerir la vista si se desea escalar mas.

?>
