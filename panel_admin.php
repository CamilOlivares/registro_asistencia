<?php
    require "database.php";  // Requiere el archivo que contiene la conexión a la base de datos

    require "view/view_panel_admin.html";  // Requiere la vista del panel de administración

    require_once "controller/controller_busqueda.php";  // Requiere el controlador para procesar la búsqueda

    include('view/view_busqueda.php');  // Incluye la vista de resultados de búsqueda

?>
    </table> <!-- Cierre de la tabla -->

    <script src="model/confirmar_eliminar.js"></script>  <!-- Incluye el script para confirmar eliminación -->

</body>
</html>
