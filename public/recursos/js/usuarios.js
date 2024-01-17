$('#table-usuarios').dataTable({
    'processing': true,
    "responsive": true,
    // "scrollX": true,
    "language": {
        "lengthMenu": "Mostrar _MENU_ datos",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "Datos no disponibles por el momento",
        "processing":     "Procesando ...",
        "search":         "Buscar:",
        "zeroRecords":    "Datos no disponibles por el momento",
        "paginate": {
        "first":      "Primera",
        "last":       "Última",
        "next":       "Siguiente",
        "previous":   "Anterior"
        },
    }//End language
});


// //===========ELIMINAR COMPONENTE(USUARIO) DESDE JS===============
// $(document).on('click', '.eliminar', function() {
//     //path : https://localhost:8080/eliminar_usuario/primaryKey 
//     let id = $(this).attr('id');
//     /**
//      * let array = [
//      *              0 => ' a este usuario : parte de la pregunta'
//      *              1 => 'Está acción : mensaje o texto'
//      *             ];
//      */
// 	let array = [' al usuario ', 'Este acción será permanente.'];
// 	let url = path +'/eliminar_usuario/'+ id;
//     eliminar(url, array, 'question');
// });//end onclick eliminar