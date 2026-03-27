document.addEventListener("DOMContentLoaded", function () {

    // ================= VALIDAR FORM PRODUCTOS =================
    const formProducto = document.querySelector("#formProducto");

    if (formProducto) {

        formProducto.addEventListener("submit", function (e) {

            let nombre = document.querySelector("#Nombre").value.trim();
            let precio = document.querySelector("#Precio").value;
            let cantidad = document.querySelector("#Cantidad").value;

            // Validación nombre
            if (nombre === "") {
                alert("El nombre no puede estar vacío");
                e.preventDefault();
                return;
            }

            // Validación precio
            if (precio === "" || parseFloat(precio) <= 0) {
                alert("El precio debe ser mayor a 0");
                e.preventDefault();
                return;
            }

            // Validación cantidad
            if (cantidad === "" || parseInt(cantidad) < 0) {
                alert("La cantidad no puede ser negativa");
                e.preventDefault();
                return;
            }

        });
    }

});