$(function () {
    if ($("#tablePeliculas").length === 0) {
        $(".table").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('.card-dark .card-header');
    }

    // Escuchar el clic en el botón amarillo de Editar
    $(document).on("click", ".btnEditarEvento", function(){
        var idEvento = $(this).attr("idEvento"); 
        var datos = new FormData();
        datos.append('id_evento', idEvento);
        datos.append('operacion', 'editar');

        $.ajax({
            url: 'ajax/ajaxEventos.php', 
            method: 'POST',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (respuesta){
               console.dir(respuesta);
                $("#idEditar").val(respuesta.id_evento);
                $("#nombre_evento").val(respuesta.nombre); 
                $("#fecha_evento").val(respuesta.fecha);
                $("#lugar_evento").val(respuesta.ubicacion);
                $("#categoria_evento").val("");
                $("#descripcion_evento").val("");
                $("form button[type='submit']").removeClass("btn-primary").addClass("btn-warning").text("Actualizar Evento");
                $('html, body').animate({ scrollTop: 0 }, 'slow');
            }
        });
    });

    // Escuchar cuando el usuario presione el botón Limpiar
    $(document).on("click", "button[type='reset']", function(){
        $("#idEditar").val("");
        $("form button[type='submit']")
            .removeClass("btn-warning")
            .addClass("btn-primary")
            .text("Guardar Evento");
    });
});
