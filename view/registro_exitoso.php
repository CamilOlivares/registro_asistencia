<!DOCTYPE html>
<html>
<head>
<?php  require __DIR__ . "/../database.php"; ?> 

    <title>Registro Exitoso</title>
    <link rel="stylesheet" href="assets\css\style.css">  <!-- Incluye tu archivo CSS aquí -->
</head>
<body>
    <h1>Registro Exitoso</h1>
    <p>El registro se ha completado exitosamente, Atte.. >>La Dirección del Colegio María Auxiliadora<<</p>

    <!-- Enlaces para volver a la página de inicio o a alguna otra página importante -->
    <a href="../registro_asistencia.php">Realizar otra Operación</a>
    <a href="../Index.php">Inicio</a>
    
    <!-- Botón de logout -->
    <?php require("cerrar_sesion.php"); ?>  <!-- invoco el boton de "cerrar sesion" -->
</body>
</html>