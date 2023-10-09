<?php
 require "../database.php"; // Requiere el archivo con la conexión a la base de datos

session_start(); // Inicia la sesión

if ($_SERVER["REQUEST_METHOD"] === "POST") { // Verifica si la solicitud es de tipo POST
    $tipo_registro = $_POST['tipo_registro']; // Obtiene el tipo de registro (Entrada o Salida)
   

    try {
        $fecha_hora = date('Y-m-d H:i:s'); // Obtiene la fecha y hora actual en formato MySQL
        $usuario_email = isset($_SESSION['email']) ? $_SESSION['email'] : ''; // Obtiene el email del usuario si está en sesión, de lo contrario, vacío

        // Prepara la consulta SQL para insertar el registro de asistencia
        $sql_registro = "INSERT INTO registros_asistencia (email, tipo_registro, fecha_hora) 
                        VALUES ('$usuario_email', '$tipo_registro', '$fecha_hora')";  // Corrección aquí

        $conn->exec($sql_registro); // Ejecuta la consulta

        header("Location: ../view/registro_exitoso.php"); // Redirige a una página de éxito
        exit(); // Termina el script
    } catch (PDOException $error) {
        echo "Error en la ejecución de la consulta: " . $error->getMessage(); // Muestra un mensaje de error si ocurre una excepción
    }
} else {
    header("Location: ../view/view_error.php"); // Redirige a una página de error si la solicitud no es de tipo POST
    exit(); // Termina el script
}
?>
