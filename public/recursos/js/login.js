$(function () {
    $('#form-inicio').validate({
        rules: {
            email: {
                required: true, // El correo electrónico es requerido
                email: true,    // El correo electrónico debe tener un formato válido
            }
        },
        messages: {
            email: {
                required: "El correo electrónico es requerido",
                email: "La estructura del correo no es la correcta",
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});

document.getElementById('Registrar').addEventListener('click', function () {
    mostrarSweetAlert();
});