  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Administración de Películas</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href=inicio">Incio</a></li>
                          <li class="breadcrumb-item active">Peliculas</li>
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
                  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-square"></i> Nueva Película</button>


              </div>
              <div class="card-body">
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">

                                  <h4 class="modal-title">Crear Película</h4>
                              </div>
                              <div class="modal-body">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <div class="input-group mb-3">
                                                  <input type="text" class="form-control" name="crearPelicula" id="crearPelicula" placeholder="Ingrese el nombre de la película">
                                                  <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="input-group mb-3">
                                                    <select name="crearGenero" id="crearGenero" class="form-control">
                                                        <option value="0">[Seleccione un género]</option>
                                                        <option value="Terror">Terror</option>
                                                        <option value="Drama">Drama</option>
                                                        <option value="Suspenso">Suspenso</option>
                                                        <option value="Animados">Animados</option>
                                                    </select>
                                                
                                                  <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-photo-video"></i></span>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.card-body -->

          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->