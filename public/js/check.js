document.addEventListener("DOMContentLoaded", function () {
    const estadoCheckbox = document.getElementById("ganador1");
    const estadoCheckbox2 = document.getElementById("ganador2");
    const estadoVisible = document.getElementById("visible");

    // Evento de clic en el botón de tipo "checkbox"
    estadoCheckbox.addEventListener("change", function () {
        const nuevoEstado = estadoCheckbox.checked; // Valor booleano (TRUE o FALSE)

        // Realiza una solicitud AJAX para actualizar el estado en el servidor
        fetch("actualizar_estado.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ nuevoEstado })
        })
            .then(response => response.json())
            .then(data => {
                console.log("Estado actualizado:", data);
            })
            .catch(error => console.error(error));
    });

    // Evento de clic en el botón de tipo "checkbox 2"
    estadoCheckbox2.addEventListener("change", function () {
        const nuevoEstado2 = estadoCheckbox.checked; // Valor booleano (TRUE o FALSE)

        // Realiza una solicitud AJAX para actualizar el estado en el servidor
        fetch("actualizar_estado.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ nuevoEstado2 })
        })
            .then(response => response.json())
            .then(data => {
                console.log("Estado actualizado:", data);
            })
            .catch(error => console.error(error));
    });

    estadoVisible.addEventListener("change", function () {
        const visible = estadoVisible.checked; // Valor booleano (TRUE o FALSE)

        // Realiza una solicitud AJAX para actualizar el estado en el servidor
        fetch("actualizar_estado.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ visible })
        })
            .then(response => response.json())
            .then(data => {
                console.log("Estado actualizado:", data);
            })
            .catch(error => console.error(error));
    });
});
