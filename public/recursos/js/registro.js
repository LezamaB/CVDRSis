$(function () {
    $('#form-usuario').validate({
        rules: {
            nombre: {
                required: true, // El nombre es requerido
            },
            email: {
                required: true, // El correo electrónico es requerido
                email: true,    // El correo electrónico debe tener un formato válido
            },
            genero: {
                required: true, // El género es requerido
            },
        },
        messages: {
            nombre: {
                required: "Por favor ingrese su nombre",
            },
            email: {
                required: "Por favor ingrese un correo electrónico",
                email: "La estructura del correo no es la correcta",
            },
            genero: {
                required: "Por favor seleccione un género",
            },
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

