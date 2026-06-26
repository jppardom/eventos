$(function () {
  $("#tableInvitados")
    .DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    })
    .buttons()
    .container()
    .appendTo("#tableInvitados_wrapper .col-md-6:eq(0)");
  $("#example2").DataTable({
    paging: true,
    lengthChange: false,
    searching: false,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
  });
});

$(".editarInvitadoTabla").click(function () {
  var id_invitados = $(this).attr("id_invitados");
  var datos = new FormData();
  datos.append("id_invitados", id_invitados);
  datos.append("operacion", "editar");
  $.ajax({
    url: "ajax/ajaxInvitado.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {

      console.log("Respuesta del servidor:", respuesta); 

    $("#id_invitado").val(respuesta["id_invitado"]);
    $("#editarEstudiante").val(respuesta["id_estudiante"]);
    $("#editarEvento").val(respuesta["id_evento"]);
    $("#editarCupo").val(respuesta["cupo"]);
    $("#editarqr").val(respuesta["codigo_qr"]);

    },
    error: function (xhr, status, error) {
      console.error("Error crítico en la petición AJAX:", error);
      console.log("Detalles del servidor:", xhr.responseText);
    },
  });
});

$(".eliminarInvitadoTabla").click(function () {
  var id_invitados = $(this).attr("id_invitados");
  var datos = new FormData();
  datos.append("id_invitados", id_invitados);
  datos.append("operacion", "eliminar");
  Swal.fire({
    title: "Está seguro que desea eliminar los datos del invitado?",
    text: "No podrá recuperar los datos!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminalo!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: "ajax/ajaxInvitado.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          if (respuesta == 1) {
            Swal.fire({
              icon: "success",
              title: "Elimando",
              text: "Datos Eliminados conexito!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
            }).then(function (result) {
              if (result.value) {
                window.location = "Invitados";
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "No se pudo eliminar los datos!",
            });
          }
        },
      });
    }
  });
});