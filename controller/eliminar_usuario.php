<?php
require __DIR__ . "/../database.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Eliminar registros asociados al usuario
    $stmt1 = $conn->prepare("DELETE FROM registros_asistencia WHERE id_usuario = :id_usuario");
    $stmt1->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt1->execute();

    // Eliminar el usuario
    $stmt2 = $conn->prepare("DELETE FROM users WHERE id = :id_usuario");
    $stmt2->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

    if ($stmt2->execute()) {
        echo "Usuario y sus registros han sido eliminados exitosamente.";
    } else {
        echo "Error al eliminar el usuario y sus registros.";
    }
} else {
    echo "ID de usuario no válido.";
}
?>
