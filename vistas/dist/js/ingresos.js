$(function () {
    $("#tableIngresos").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tableIngresos_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


  $(".editarIngresoTabla").click(function(){
    var id_ingreso = $(this).attr("id_ingreso");
    var datos  = new FormData();
    datos.append('id_ingreso', id_ingreso)
    datos.append('operacion', 'editar')
    $.ajax({
      url:'ajax/ajaxIngresos.php',
      method:'POST',
      data: datos,
      cache: false,
      contentType:false,
      processData: false,
      dataType: 'json',

      success: function (respuesta){
        
        $("#editarIdIngreso").val(respuesta.id_ingreso);
        $("#editarInvitado").val(respuesta.id_invitado);
        $("#editarCantidad").val(respuesta.cantidad_personas);
        
        let fecha = respuesta.fecha.replace(" ", "T");
        $("#editarFecha").val(fecha);
        
        console.log("Datos desde PHP", respuesta)
      },
      error: function(xhr, status, error) {
              console.error("Error crítico en la petición AJAX:", error);
              console.log("Detalles del servidor:", xhr.responseText);
          }
    })
    
  });

  //funcion para eliminar un ingreso
  $(".eliminarIngresoTabla").click(function () {

    var id_ingreso = $(this).attr("id_ingreso");
  
    var datos = new FormData();
    datos.append("id_ingreso", id_ingreso);
    datos.append("operacion", "eliminar");
  
    Swal.fire({
      title: "Está seguro que desea eliminar los datos del ingreso?",
      text: "No podrá recuperar los datos!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sí, eliminar!",
      cancelButtonText: "Cancelar",
    }).then((result) => {
  
      if (result.value) {
  
        $.ajax({
          url: "ajax/ajaxIngresos.php",
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
                title: "Eliminado",
                text: "Datos eliminados con éxito!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
              }).then(function (result) {
  
                if (result.value) {
                  window.location = "ingresos";
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

  function switchTab(tab) {
    if (tab === 'camera') {
        $('#tabCamera').addClass('active').show();
        $('#tabUpload').removeClass('active').hide();
        $('#btnTabCamera').addClass('active btn-primary').removeClass('btn-outline-primary');
        $('#btnTabUpload').removeClass('active btn-secondary').addClass('btn-outline-secondary');
        initCamera();
    } else {
        $('#tabUpload').addClass('active').show();
        $('#tabCamera').removeClass('active').hide();
        $('#btnTabUpload').addClass('active btn-secondary').removeClass('btn-outline-secondary');
        $('#btnTabCamera').removeClass('active btn-primary').addClass('btn-outline-primary');
        stopCamera();
    }
}

// Inicializar Escáner de Cámara
let html5QrcodeScanner = null;

function initCamera() {
    if (!html5QrcodeScanner) {
        html5QrcodeScanner = new Html5QrcodeScanner("reader", { 
            fps: 10, 
            qrbox: { width: 200, height: 200 } 
        });

        html5QrcodeScanner.render((decodedText) => {
            // Llenar el input de texto con el resultado
            $("#crearInvitado").val(decodedText);
            
            Swal.fire({
                icon: 'success',
                title: 'QR Detectado',
                text: 'ID Obtenido: ' + decodedText,
                timer: 1500,
                showConfirmButton: false
            });

            stopCamera();
        });
    }
}

function stopCamera() {
    if (html5QrcodeScanner) {
        html5QrcodeScanner.clear();
        html5QrcodeScanner = null;
    }
}

$("#btnLeerQRFile").click(function () {
    var fileInput = $('#qr_file')[0].files[0];
    
    if (!fileInput) {
        Swal.fire('Atención', 'Por favor selecciona una imagen primero.', 'warning');
        return;
    }

    var datos = new FormData();
    datos.append('qr_file', fileInput);
    datos.append('operacion', 'leerQR');

    $.ajax({
        url: 'ajax/ajaxIngresos.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (respuesta) {
          console.log("respuestan: ", respuesta.codigo)
            if (respuesta.status === 'success') {
                // Rellenar el input de ID de invitado sin cerrar el modal
                $("#crearInvitado").val(respuesta.codigo);

                Swal.fire({
                    icon: 'success',
                    title: 'QR Leído Correctamente',
                    text: 'ID del invitado asignado: ' + respuesta.codigo,
                    timer: 2000,
                    showConfirmButton: false
                });
            } else {
                Swal.fire('Error', respuesta.mensaje, 'error');
            }
        },
        error: function (xhr, status, error) {
            console.error("Respuesta del servidor:", xhr.responseText);
            Swal.fire('Error', 'Ocurrió un fallo en el servidor al decodificar la imagen.', 'error');
        }
    });
});
  