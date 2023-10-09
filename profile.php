<?php

require "database.php";  // Requiere el archivo que contiene la conexión a la base de datos

session_start();  // Inicia o reanuda una sesión
        
require "view/view_profile.html";  // Requiere la vista HTML para el perfil

require "controller/controller_profile.php";  // Requiere el controlador para el perfil

require "model/model_profile.php";  // Requiere el modelo para el perfil
?>
