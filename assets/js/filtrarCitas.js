function filtrarTabla() {
    var inputFecha = document.getElementById("filterFecha").value; // Obtiene la fecha seleccionada
    var inputHora = document.getElementById("filterHora").value.toLowerCase();
    var tabla = document.getElementById("tablaCitas");
    var filas = tabla.getElementsByTagName("tr");

    for (var i = 0; i < filas.length; i++) {
        var celdaFecha = filas[i].getElementsByTagName("td")[1]?.textContent; // Cambia el índice a 1 para la fecha
        var celdaHora = filas[i].getElementsByTagName("td")[2]?.textContent.toLowerCase(); // Cambia el índice a 2 para la hora

        // Asegúrate de que solo se esté filtrando si se encuentra en el rango
        if (
            (celdaFecha && celdaFecha === inputFecha || inputFecha === "") && 
            (celdaHora && celdaHora.includes(inputHora) || inputHora === "")
        ) {
            filas[i].style.display = ""; // Muestra la fila si pasa el filtro
        } else {
            filas[i].style.display = "none"; // Oculta la fila si no pasa el filtro
        }
    }
}
