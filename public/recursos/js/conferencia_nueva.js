$("#foto_plantilla").change(function () {
    // Código a ejecutar cuando se detecta un cambio de archivO
    previsualizar_imagen(this, '#img-preview');
  });
$(function () {
    $('#registrar_conferencia').validate({
        rules: {
            nombre_miraculous: {
                required: true,
            },
            nombre_kwami: {
                required: true,
            },
            objeto: {
                required: true,
            },
            poderes: {
                required: true,
            },
            foto_miraculous: {
                required: false,
            }
        },
        messages: {
            nombre_miraculous: {
                required: 'Se requiere el nombre del miraculous',
            },
            nombre_kwami: {
                required: 'Se requiere el nombre del kwami',
            },
            objeto: {
                required: 'Se requiere el objeto del miraculous',
            },
            poderes: {
                required: 'Se requiere el poder del miraculous',
            },
            foto_miraculous: {
                required: '',
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
});//end validation