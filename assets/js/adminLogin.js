document.getElementById("adminBtn").addEventListener("click", function() {
    var modal = document.getElementById("adminModal");
    modal.style.display = "flex"; // Mostrar el modal con flexbox

    // Añadir clase 'show' al modal para aplicar el cambio de color
    setTimeout(function() {
        modal.classList.add("show");
    }, 100);
});

document.getElementById("adminLoginBtn").addEventListener("click", function() {
    // Validar el usuario y contraseña aquí
    var user = document.getElementById("adminUser").value;
    var password = document.getElementById("adminPassword").value;

    if (user === "Profeta" && password === "Barberia") {
        // Redirigir a la página de administrador
        window.location.href = "pagina_admin.php";
    } else {
        alert("Usuario o contraseña incorrectos");
    }
});

// Para cerrar el modal si se hace clic fuera de él
window.onclick = function(event) {
    var modal = document.getElementById("adminModal");
    if (event.target == modal) {
        modal.style.display = "none";
        modal.classList.remove("show");
    }
};
