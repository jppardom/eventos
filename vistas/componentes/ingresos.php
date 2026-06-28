<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administración de Ingresos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Incio</a></li>
                        <li class="breadcrumb-item active">Ingresos</li>
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
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-square"></i> Nuevo Ingreso</button>
            </div>
            <div class="card-body">
                <!-- Modal para guardar datos -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Crear Ingreso</h4>
                            </div>
                            <form method="post">
                                <div class="modal-body">
                                    <div class="card-body">
                                        <!-- ID Invitado -->
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <div class="input-group mb-3">
                                                    <select name="crearInvitado" class="form-control" required>
                                                        <option value="0">Seleccione ID del invitado</option>

                                                        <?php
                                                        $objDatosInvitado = new ControladorDatosInvitado();
                                                        $datosInvitado = $objDatosInvitado->ctrlCargarDatosInvitados();
                                                        foreach ($datosInvitado as $key => $value) {
                                                        ?>
                                                            <option value="<?php echo $value['id_invitado']; ?>">
                                                                <?php echo $value['id_invitado']; ?>
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
                                            <!-- Cantidad Personas -->
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="crearCantidad" placeholder="Cantidad de personas"
                                                        min="1"
                                                        step="1"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-users"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Fecha -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="input-group mb-3">
                                                    <input type="datetime-local"
                                                        class="form-control"
                                                        name="crearFecha"
                                                        step="1"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
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
                                $objIngreso  = new ControladorIngreso();
                                $objIngreso->ctrlGuardarIngreso();
                                ?>

                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal para editar datos -->
                <div class="modal fade" id="myModalEditar" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Editar Ingreso</h4>
                            </div>
                            <form method="post">
                                <div class="modal-body">
                                    <div class="card-body">
                                        <!-- ID Invitado -->
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <div class="input-group mb-3">
                                                    <select id="editarInvitado" name="editarInvitado" class="form-control" required>
                                                        <option value="0">Seleccione ID del invitado</option>

                                                        <?php
                                                        $objDatosInvitado = new ControladorDatosInvitado();
                                                        $datosInvitado = $objDatosInvitado->ctrlCargarDatosInvitados();

                                                        foreach ($datosInvitado as $key => $value) {
                                                        ?>
                                                            <option value="<?php echo $value['id_invitado']; ?>">
                                                                <?php echo $value['id_invitado']; ?>
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
                                            <!-- Cantidad Personas -->
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="number" id="editarCantidad" class="form-control" name="editarCantidad" placeholder="Cantidad de personas"
                                                        min="1"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-users"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Fecha -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="input-group mb-3">
                                                    <input type="datetime-local"
                                                        id="editarFecha"
                                                        class="form-control"
                                                        name="editarFecha"
                                                        step="1"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="editarIdIngreso" name="editarIdIngreso">
                                <input type="hidden" id="eliminarIdIngreso" name="eliminarIdIngreso">

                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary">Editar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                                </div>

                                <?php
                                $objIngreso->ctrlActualizarIngreso();
                                ?>

                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tabla de para presentar los ingresos -->
                <table id="tableIngresos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID_INVITADO</th>
                            <th>CANTIDAD_PERSONAS</th>
                            <th>FECHA</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dataIngresos = $objIngreso->ctrlCargarDatosIngresos(true, 0);

                        foreach ($dataIngresos as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value['id_ingreso']; ?></td>
                                <td><?php echo $value['id_invitado']; ?></td>
                                <td><?php echo $value['cantidad_personas']; ?></td>
                                <td><?php echo $value['fecha']; ?></td>

                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning editarIngresoTabla"
                                            data-toggle="modal"
                                            data-target="#myModalEditar"
                                            id_ingreso="<?php echo $value['id_ingreso']; ?>">

                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <button class="btn btn-danger eliminarIngresoTabla"
                                            data-toggle="modal"
                                            id_ingreso="<?php echo $value['id_ingreso']; ?>">

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
                            <th>ID_INVITADO</th>
                            <th>CANTIDAD_PERSONAS</th>
                            <th>FECHA</th>
                            <th>ACCIONES</th>
                        </tr>
                    </tfoot>
                </table>
                <!-- Fin de la tabla de ingresos -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->