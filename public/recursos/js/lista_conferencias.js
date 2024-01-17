document.getElementById('listas').addEventListener('click', function () {
    obtenerConferencias();
});

function obtenerConferencias() {
    // Solicitud AJAX para obtener los datos de las conferencias
    fetch('http://localhost:8080/obtener-conferencias-actuales')
        .then(response => response.json())
        .then(conferencias => {
            // Datos de las conferencias en formato JSON (conferencias)
            mostrarSweetAlert(conferencias);
        })
        .catch(error => {
            console.error('Error al obtener las conferencias:', error);
        });
}

function mostrarSweetAlert(conferencias) {
    
    if(conferencias==""){
        Swal.fire({
            icon: "info",
            title: "Oops...",
            text: "Por el momento no hay conferencias disponibles.",
          });
    }
    else{
        const options = {};
        // Construir dinámicamente las opciones del select
        conferencias.forEach(conferencia => {
            options[conferencia.id_conferencia]=conferencia.nombre_conferencia;
        });

    Swal.fire({
        title: '<small>Conferencias disponibles<small>',
        input: 'select',
        inputOptions: options,
        inputPlaceholder: 'Selecciona una conferencia',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
        customClass: {
            popup: 'input-mas-largo',
        },
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Conferencia seleccionada",
                showConfirmButton: false,
                timer: 1500
              });
            enviarOpcionSeleccionada(result.value);
            setTimeout(function() {
                location.reload();
            }, 1200);
        }
    }
    );
}
}

function enviarOpcionSeleccionada(opcionSeleccionada) {
    // Solicitud AJAX para enviar la opción seleccionada al controlador
    fetch('http://localhost:8080/opcion-seleccionada', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            opcionSeleccionada: opcionSeleccionada,
        }),
    })
    .then(response => response.json())
    .then(data => {
        // Manejar la respuesta del servidor si es necesario
        console.log(data);
    })
    .catch(error => {
        console.error('Error al enviar la opción seleccionada:', error);
    });

}