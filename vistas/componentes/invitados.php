  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Administración de Invitados</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="inicio">Incio</a></li>
                          <li class="breadcrumb-item active">Invitados</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <!-- Trigger the modal with a button -->
                  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-square"></i> Nuevo invitado</button>


              </div>
              <div class="card-body">
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">

                                  <h4 class="modal-title">Crear Invitado</h4>
                              </div>
                              <div class="modal-body">
                                  <form method="post">
                                      <div class="card-body">
                                          <div class="row">
                                              <!-- Persona -->
                                              <div class="input-group mb-3">
                                                  <!-- nombre -->
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                  </div>
                                                  <input type="text" name="txtCedula" id="txtCedula" class="form-control" placeholder="Seleccione Cedula" readonly>
                                                  <input type="hidden" name="codigoEstudiante" id="codigoEstudiante" class="form-control">

                                                  <!-- apellido -->
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                  </div>
                                                  <input type="text" name="txtNombres" id="txtNombres" class="form-control" placeholder="Seleccione Apellido" readonly>

                                                  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myEstudiantes">Estudiantes</button>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <!-- ESTUDIANTE -->


                                              <div class="input-group mb-3">
                                                  <select name="crearEvento" id="crearEvento" class="form-control" required>
                                                      <option value="0">[Seleccione un evento]</option>
                                                      <?php
                                                        $objEventos = new ControladorEventos();
                                                        $dataeventos = $objEventos->ctrMostrarEventos();
                                                        foreach ($dataeventos as $key => $value) {
                                                        ?>
                                                          <option value="<?php echo $value["id_evento"]; ?>">
                                                              <?php echo $value["nombre"]; ?>
                                                          </option>
                                                      <?php } ?>
                                                  </select>
                                                  <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                                  </div>
                                              </div>

                                          </div>
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="number" name="crearCupo" class="form-control" placeholder="Ingrese el cupo disponible" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="text" name="crearqr" class="form-control" placeholder="Ingrese el código QR" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <?php
                                            $objInvitado  = new ControladorInvitado();
                                            $id = $objInvitado->ctrlGenerarId();
                                            ?>
                                          <input type="hidden" name="id_invitado" class="form-control" value="<?php echo $id; ?>" placeholder="Ingrese" required>
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Guardar</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                              <?php
                                $objInvitado  = new ControladorInvitado();
                                $objInvitado->ctrlGuardarInvitado();
                                ?>
                              </form>
                          </div>
                      </div>
                  </div>
                  <!-- Modal para cosultar Estudiantes -->

                  <div id="myEstudiantes" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
                      <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">Consultar estudianes</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <div class="modal-body">
                                  <table id="tableEstudiantes" class="table table-bordered table-striped">
                                      <thead>
                                          <tr>
                                           
                                              <th>CEDULA</th>
                                              <th>NOMBRES</th>
                                              
                                              <th>ACCIONES</th>

                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                            $objEstudiante = new ControladorEstudiante();
                                            $dataEstudiantes = $objEstudiante->ctrlCargarDatosEstudiante(true, 0);

                                            foreach ($dataEstudiantes as $key => $value) {
                                            ?>
                                              <tr>
                                                 
                                                  <td><?php echo $value['cedula']; ?></td>
                                                  <td><?php echo $value['nombres'] . " " . $value['apellido']; ?></td>
                                                  
                                                  

                                                  <td>
                                                      <div class="btn-group">
                                                          <button class="btn btn-warning capturarEstudiantes"
                                                             data-dismiss="modal" data-dismiss="modal" aria-hidden="true"
                                                              id_estudiante="<?php echo $value['id_estudiante']; ?>"
                                                              cedula="<?php echo $value['cedula']; ?>"
                                                              nombres="<?php echo $value['nombres']; ?>"
                                                              apellidos="<?php echo $value['apellido']; ?>">

                                                              <i class="fas fa-edit"></i>
                                                          </button>

                                                          
                                                          </button>
                                                      </div>
                                                  </td>

                                              </tr>
                                          <?php } ?>

                                      </tbody>

                                      <!-- Pie de tabla -->
                                      <tfoot>
                                          <tr>
                                      
                                              <th>CEDULA</th>
                                              <th>NOMBRES</th>
                                              <th>ACCIONES</th>
                                          </tr>
                                      </tfoot>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- Modal para editar datos -->
                  <div class="modal fade" id="myModalEditar" role="dialog">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">

                                  <h4 class="modal-title">Editar Invitado</h4>
                              </div>
                              <div class="modal-body">
                                  <form method="post">
                                      <div class="card-body">
                                          <div class="row">
                                              <div class="col-lg-6">

                                                  <div class="input-group mb-3">

                                                      <select name="editarEstudiante" id="editarEstudiante" class="form-control" required>

                                                          <option value="0">[Seleccione un estudiante]</option>

                                                          <?php
                                                            $objEstudiantes = new ControladorEstudiante();
                                                            $dataestudiantes = $objEstudiantes->ctrlCargarDatosEstudiante(true, 0);

                                                            foreach ($dataestudiantes as $key => $value) {
                                                            ?>

                                                              <option value="<?php echo $value["id_estudiante"]; ?>">
                                                                  <?php echo "(" . $value["cedula"] . ") " . $value["nombres"] . " " . $value["apellido"]; ?>
                                                              </option>

                                                          <?php } ?>

                                                      </select>


                                                      <div class="input-group-append">
                                                          <span class="input-group-text">
                                                              <i class="fas fa-user"></i>
                                                          </span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <select name="editarEvento" id="editarEvento" class="form-control" required>
                                                          <option value="0">[Seleccione un evento]</option>
                                                          <?php
                                                            $objEventos = new ControladorEventos();
                                                            $dataeventos = $objEventos->ctrMostrarEventos();
                                                            foreach ($dataeventos as $key => $value) {
                                                            ?>
                                                              <option value="<?php echo $value["id_evento"]; ?>">
                                                                  <?php echo $value["nombre"]; ?>
                                                              </option>
                                                          <?php } ?>
                                                      </select>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input name="editarCupo" id="editarCupo" class="form-control" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input name="editarqr" id="editarqr" class="form-control" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                  </div>
                                              </div>
                                          </div>
                                          <input type="hidden" id="id_invitado" name="id_invitado">
                                      </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Editar</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                              <?php
                                $objInvitado->ctrlActualizarDatosI();
                                ?>
                              </form>
                          </div>
                      </div>
                  </div>
                  <!-- Tabla para presentar los datos de película -->
                  <table id="tableInvitados" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Id_Invitado</th>
                              <th>Estudiante</th>
                              <th>Evento</th>
                              <th>cupo</th>
                              <th>QR</th>
                              <th>ACCIONES</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $datainvitados = $objInvitado->ctrlCargarDatosI(true, 0);
                            foreach ($datainvitados as $key => $value) {
                            ?>
                              <tr>
                                  <td><?php echo $value["id_invitado"];  ?></td>
                                  <td><?php echo $value["estudiantes"]; ?></td>
                                  <td><?php echo $value["eventos"]; ?></td>
                                  <td><?php echo $value["cupo"];  ?></td>
                                  <td><?php echo $value["codigo_qr"];  ?></td>
                                  <td>
                                      <div class="btn-group">
                                          <button class="btn btn-warning"><i class="fas fa-edit editarInvitadoTabla" data-toggle="modal" data-target="#myModalEditar" id_invitados="<?php echo $value["id_invitado"]; ?>"></i></button>
                                          <button class="btn btn-danger"><i class="fas fa-trash-alt eliminarInvitadoTabla" style="color: rgb(0, 0, 0);" id_invitados="<?php echo $value["id_invitado"]; ?>"></i></button>
                                  </td>
                              </tr>
                          <?php }  ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>Id_Invitado</th>
                              <th>Estudiante</th>
                              <th>Evento</th>
                              <th>cupo</th>
                              <th>QR</th>
                              <th>ACCIONES</th>
                          </tr>
                      </tfoot>
                  </table>
              </div>
              <!-- /.card-body -->

          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->