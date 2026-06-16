$(function () {
    $("#tablePeliculas").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tablePeliculas_wrapper .col-md-6:eq(0)');
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

$(".editarPeliculaTabla").click(function(){
  var id_peliculas = $(this).attr("id_peliculas");
  var datos  = new FormData();
  datos.append('id_peliculas', id_peliculas)
  datos.append('operacion', 'editar')
  $.ajax({
    url:'ajax/ajaxPeliculas.php',
    method:'POST',
    data: datos,
    cache: false,
    contentType:false,
    processData: false,
    dataType: 'json',
    success: function (respuesta){
      
      console.log("Datos desde PHP", respuesta)
    },
    error: function(xhr, status, error) {
            console.error("Error crítico en la petición AJAX:", error);
            console.log("Detalles del servidor:", xhr.responseText);
        }
  })
});