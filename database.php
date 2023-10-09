<?php
// Configuración para la conexión a la base de datos
$server = "localhost"; 
$username = "root"; //Es un usuario con privilegios elevados en un sistema, en este caso para el ejercicio.
$password = ""; // Se deja en blanco si no hay contraseña
$database = "asistencia";

try {
    // Intentamos crear una nueva instancia de la clase PDO para interactuar con la base de datos MySQL. Si algo va mal durante 
//esta operación (por ejemplo, no se puede establecer la conexión por alguna razón), se lanzará una excepción.
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    // Establecemos el modo de error para que PDO lance excepciones en caso de error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//catch block:Aquí, estamos capturando excepciones de tipo PDOException. Si se lanza una excepción de este tipo dentro del bloque try, 
//el flujo de ejecución se desvía a este bloque catch. El parámetro $error captura la instancia de la excepción que se ha lanzado.
} catch (PDOException $error) { 
//En este bloque, estamos manejando la excepción capturada. Utilizamos la función die() para terminar la ejecución del script y mostrar 
//un mensaje de error que incluye el mensaje de la excepción ($error->getMessage()). Esto proporciona información sobre el problema 
//que ocurrió durante la conexión a la base de datos.

    // Si hay un error en la conexión, mostramos un mensaje de error y terminamos la ejecución del script
    die("Error al conectar: " . $error->getMessage());
    //En resumen, este bloque try-catch intenta establecer una conexión a la base de datos utilizando PDO. Si algo sale mal 
    //durante la conexión (por ejemplo, credenciales incorrectas o servidor inaccesible), se lanza una excepción de tipo PDOException. 
    //Esta excepción se captura en el bloque catch, donde se muestra un mensaje de error con información detallada sobre la excepción, 
    //ayudando así a entender y abordar el problema de manera adecuada.
}

// Asegura de que la conexión a la base de datos esté correctamente establecida
if ($conn) {
    echo "Conexión exitosa a la base de datos.";
} else {
    die("La conexión a la base de datos ha fallado.");
}
?>