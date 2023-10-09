<?php
 require __DIR__ . "/../database.php";

$message = ""; // Variable para almacenar mensajes y notificaciones

if ($_SERVER["REQUEST_METHOD"] === "POST") { // Verifica si la solicitud es de tipo POST
    // Obtén los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Verifica la longitud de la contraseña
    if (strlen($password) < 6 || strlen($password) > 8) {
        $message = "La contraseña debe tener entre 6 y 8 caracteres.";
    } elseif ($password !== $confirmPassword) { // Verifica si las contraseñas coinciden
        $message = "Las contraseñas no coinciden.";
    } else {
        // Hash de la contraseña
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Prepara la consulta para insertar un nuevo usuario en la base de datos
        $sql = "INSERT INTO users (nombre, apellido, usuario, email, password) VALUES (:nombre, :apellido, :usuario, :email, :password)";

        try {
            $stmt = $conn->prepare($sql);

            // Asocia los parámetros y ejecuta la consulta
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellido", $apellido);
            $stmt->bindParam(":usuario", $usuario);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $hashedPassword);

            if ($stmt->execute()) { // Verifica si la consulta se ejecutó correctamente
                header("Location: view/registro_exitoso.php"); // Redirige a una página de éxito
                exit();
            } else {
                $message = "Lo sentimos, hubo un problema al crear tu cuenta.";
            }
        } catch (PDOException $e) {
            $message = "Error al ejecutar la consulta: " . $e->getMessage();
        }
    }
}
?>

