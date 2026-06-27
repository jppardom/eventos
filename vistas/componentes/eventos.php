<?php
// Instanciamos el controlador y ejecutamos el método de actualización
$editar = new ControladorEventos();
$editar -> ctrEditarEvento();
// Procesar eliminación si viene por GET
$eliminar = new ControladorEventos();
$eliminar->ctrEliminarEvento();
?>
<div class="content-wrapper">
  <!-- Cabecera de la Página -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administracion de Eventos</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Contenido Principal -->
  <section class="content">
    <div class="container-fluid">
      
      <!-- FILA 1: EL FORMULARIO DE INGRESO -->
      <div class="row mb-4">
        <div class="col-md-10 offset-md-1">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Datos del Nuevo Evento</h3>
            </div>
            
            <form method="POST">
              <!-- AGREGA ESTA LÍNEA JUSTO AQUÍ ABAJO DE LA APERTURA DEL FORM -->
               <input type="hidden" id="idEditar" name="id_evento" value="">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre_evento">Nombre del Evento</label>
                  <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" placeholder="Ej. Conferencia de Tecnología" required>
                </div>

                <div class="form-group">
                  <label for="categoria_evento">Categoría</label>
                  <select class="form-control" id="categoria_evento" name="categoria_evento" required>
                    <option value="">Seleccione una categoría...</option>
                    <option value="Eventos Académicos">Eventos Académicos</option>
                    <option value="Eventos Sociales">Eventos Sociales</option>
                    <option value="Corporativos">Corporativos</option>
                  </select>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="fecha_evento">Fecha</label>
                      <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="lugar_evento">Lugar / Ubicación</label>
                      <input type="text" class="form-control" id="lugar_evento" name="lugar_evento" placeholder="Ej. Auditorio Principal" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="descripcion_evento">Descripción</label>
                  <textarea class="form-control" id="descripcion_evento" name="descripcion_evento" rows="3" placeholder="Detalles adicionales del evento..."></textarea>
                </div>
              </div>

              <div class="card-footer text-right">
               <button type="reset" class="btn btn-secondary mr-2">Limpiar</button>
               <!-- Le agregamos id="btnAccion" y vuelve a iniciar en azul -->
               <button type="submit" id="btnAccion" class="btn btn-primary">Guardar Evento</button>
             </div>
              <?php
                // Ejecuta el controlador para guardar el evento cuando se presione el botón
                $registro = new ControladorEventos();
                $registro -> ctrCrearEvento();
                // AGREGA ESTAS DOS LÍNEAS AQUÍ PARA PROCESAR LA ACTUALIZACIÓN:
                $editar = new ControladorEventos();
                $editar -> ctrEditarEvento();
              ?>
            </form>
          </div>
        </div>
      </div>

      <!-- FILA 2: LA TABLA DE REGISTROS DINÁMICOS -->
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Lista de Eventos Registrados</h3>
            </div>
            <div class="card-body p-0">
        <table class="table table-striped table-bordered m-0">
            <thead>
              <tr>
                <th style="width: 5%">#</th>
                <th style="width: 40%">Nombre del Evento</th>
                <th style="width: 20%">Fecha</th>
                <th style="width: 20%">Lugar / Ubicación</th>
                <th style="width: 15%">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $eventos = ControladorEventos::ctrMostrarEventos();

                foreach ($eventos as $key => $value) {
               echo '<tr>
               <td>'.($key+1).'</td>
               <td>'.$value["nombre"].'</td>
               <td>'.$value["fecha"].'</td>
              <td>'.$value["ubicacion"].'</td>
             <td>
     <button class="btn btn-warning btn-sm btnEditarEvento" idEvento="'.$value["id_evento"].'"><i class="fas fa-edit"></i></button>
     <button class="btn btn-danger btn-sm btnEliminarEvento" idEvento="'.$value["id_evento"].'"><i class="fas fa-trash" style="color: black;"></i></button>
    </td>
  </tr>';
}
                
              ?>
            </tbody>
        </table>
<?php
        $eliminar = new ControladorEventos();
         $eliminar -> ctrEliminarEvento();
?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
      <!-- ... Todo el código anterior de la tabla ... -->
    </div>
  </section>
</div> <!-- ÉSTE ES EL ÚLTIMO DIV DEL ARCHIVO -->

<!-- AQUÍ PEGAS EL SCRIPT -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<script>
$(document).on("click", ".btnEliminarEvento", function() {
    var idEvento = $(this).attr("idEvento");
    
    Swal.fire({
        title: '¿Está seguro de borrar el evento?',
        text: "¡Si no lo está puede cancelar esta acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: 'rgb(129, 36, 36)',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar evento!'
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?enlace=eventos&idEliminar=" + idEvento;
        }
    })
})

</script>



