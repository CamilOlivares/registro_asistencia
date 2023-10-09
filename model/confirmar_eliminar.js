// model/confirmar_eliminar.js
function confirmarEliminar(id) {
    if (confirm("¿Estás seguro de que deseas eliminar este usuario y sus registros?")) {
        // Redirige a la página de eliminación
        window.location.href = "controller/eliminar_usuario.php?id=" + id;
    }
}
