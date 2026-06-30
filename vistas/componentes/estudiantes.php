<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administración de Estudiantes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Incio</a></li>
                        <li class="breadcrumb-item active">Estudiantes</li>
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
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-square"></i> Nuevo Estudiante</button>

            </div>
            <div class="card-body">
                <!-- Modal para guardad datos-->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Crear Estudiante</h4>
                            </div>
                            <form method="post">
                                <div class="modal-body">
                                    <div class="card-body">

                                        <!-- Estudiante -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="crearCedula" id="crearCedula" placeholder="Ingrese Cedula"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-id-card"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="crearNombres" id="crearNombres" placeholder="Ingrese Nombres"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-users"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="crearApellido" id="crearApellido" placeholder="Ingrese Apellidos"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-users"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- correo -->
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="email" class="form-control" name="crearCorreo" id="crearCorreo" placeholder="Ingrese Correo"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <select name="crearEspecialidad" id="crearEspecialidad" class="form-control" required>
                                                        <option value="0">Selecione Especialidad</option>
                                                        <option value="Desarrollo de Software">Desarrollo de Software</option>
                                                        <option value="Enfermeria">Enfermeria</option>
                                                        <option value="Educación Básica">Educación Básica</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-user-graduate"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- periodo -->
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="crearPeriodo" id="crearPeriodo" placeholder="Ingrese periódo" required>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar-day"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <button type="button"
                                        class="btn btn-default"
                                        data-dismiss="modal">
                                        Cerrar
                                    </button>
                                </div>
                                <?php
                                $objEstudiante  = new ControladorEstudiante();
                                $objEstudiante->ctrlGuardarEstudiante();
                                ?>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal para editar datos-->
                <div class="modal fade" id="myModalEditar" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Editar Estudiante</h4>
                            </div>
                            <form method="post">
                                <div class="modal-body">
                                    <div class="card-body">

                                        <!-- Estudiante -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="editarCedula" id="editarCedula" placeholder="Ingrese Cedula"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-id-card"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="editarNombres" id="editarNombres" placeholder="Ingrese Nombres"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-users"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="editarApellido" id="editarApellido" placeholder="Ingrese Apellidos"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-users"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- correo -->
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="email" class="form-control" name="editarCorreo" id="editarCorreo" placeholder="Ingrese Correo"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <select name="editarEspecialidad" id="editarEspecialidad" class="form-control" required>
                                                        <option value="0">Selecione Especialidad</option>
                                                        <option value="Desarrollo de Software">Desarrollo de Software</option>
                                                        <option value="Enfermeria">Enfermeria</option>
                                                        <option value="Educación Básica">Educación Básica</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-user-graduate"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- periodo -->
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">

                                                    <input type="text" class="form-control" name="editarPeriodo" id="editarPeriodo" placeholder="Ingrese periódo" required>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar-day"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <input type="hidden" id="editarIdEstudiante" name="editarIdEstudiante">
                                <input type="hidden" id="eliminarIdUsuario" name="eliminarIdUsuario"> -->
                                <input type="hidden" name="editarIdEstudiante" id="editarIdEstudiante">

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">
                                        Editar
                                    </button>
                                    <button type="button"
                                        class="btn btn-default"
                                        data-dismiss="modal">
                                        Cerrar
                                    </button>
                                </div>
                                <?php
                                $objEstudiante->ctrlActualizarEstudiante();
                                ?>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tabla de para presentar los estudiantes -->
                <table id="tableEstudiantes" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CEDULA</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>CORREO</th>
                            <th>ESPECIALIDAD</th>
                            <th>PERIODO</th>
                            <th>ACCIONES</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dataEstudiantes = $objEstudiante->ctrlCargarDatosEstudiante(true, 0);

                        foreach ($dataEstudiantes as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value['id_estudiante']; ?></td>
                                <td><?php echo $value['cedula']; ?></td>
                                <td><?php echo $value['nombres']; ?></td>
                                <td><?php echo $value['apellido']; ?></td>
                                <td><?php echo $value['correo']; ?></td>
                                <td><?php echo $value['especialidad']; ?></td>
                                <td><?php echo $value['periodo']; ?></td>

                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning editarEstudianteTabla"
                                            data-toggle="modal"
                                            data-target="#myModalEditar"
                                            id_estudiante="<?php echo $value['id_estudiante']; ?>">

                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <button class="btn btn-danger eliminarEstudianteTabla"
                                            data-toggle="modal"
                                            data-target="#myModalEliminar"
                                            id_estudiante="<?php echo $value['id_estudiante']; ?>">

                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        <?php } ?>

                    </tbody>

                    <!-- Pie de tabla -->
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>CEDULA</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>CORREO</th>
                            <th>ESPECIALIDAD</th>
                            <th>PERIODO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </tfoot>
                </table>
                <!-- Fin de la tabla de estudiantes -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->