// ================= FUNCIONES PARA SWEETALERT EN PRODUCTOS =================

// Confirmar eliminación de producto
function confirmarEliminacion(id, nombre) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `¿Deseas eliminar el producto "${nombre}"? Esta acción no se puede deshacer.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `eliminarProducto.php?id=${id}`;
        }
    });
    return false;
}

// Alerta de éxito después de agregar producto
function mostrarAlertaExito(mensaje) {
    Swal.fire({
        title: '¡Éxito!',
        text: mensaje,
        icon: 'success',
        confirmButtonColor: '#28a745',
        confirmButtonText: 'Aceptar'
    });
}

// Alerta de error
function mostrarAlertaError(mensaje) {
    Swal.fire({
        title: 'Error',
        text: mensaje,
        icon: 'error',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Aceptar'
    });
}

// Confirmar cambios en producto
function confirmarActualizacion() {
    Swal.fire({
        title: '¿Actualizar producto?',
        text: 'Confirma que deseas actualizar la información de este producto',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Sí, actualizar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formProducto').submit();
        }
    });
    return false;
}

// Mostrar alerta cuando se carga la página si hay mensajes GET
$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const mensaje = urlParams.get('mensaje');
    
    if (mensaje === 'eliminado') {
        Swal.fire({
            title: '¡Eliminado!',
            text: 'El producto ha sido eliminado correctamente',
            icon: 'success',
            confirmButtonColor: '#28a745',
            confirmButtonText: 'Aceptar'
        });
    } else if (mensaje === 'registrado') {
        Swal.fire({
            title: '¡Registrado!',
            text: 'El producto ha sido agregado correctamente',
            icon: 'success',
            confirmButtonColor: '#28a745',
            confirmButtonText: 'Aceptar'
        });
    } else if (mensaje === 'editado') {
        Swal.fire({
            title: '¡Actualizado!',
            text: 'El producto ha sido actualizado correctamente',
            icon: 'success',
            confirmButtonColor: '#28a745',
            confirmButtonText: 'Aceptar'
        });
    }
});

// Confirmar agregar al carrito (si aplica)
function confirmarAgregarCarrito(nombreProducto) {
    Swal.fire({
        title: 'Agregar al carrito',
        text: `¿Deseas agregar "${nombreProducto}" al carrito?`,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Sí, agregar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            mostrarAlertaExito('¡Producto agregado al carrito!');
        }
    });
}
