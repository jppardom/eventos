<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard del sistema</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">

    </div>
    <?php
    $objPelicula = new ControladorPersona();
    $data = $objPelicula->ctrlContarPeliculas();

    //Contar los ingresos
    $objIngreso = new ControladorIngreso();
    $dataIngresos = $objIngreso->ctrlcontarIngresos();

    $objEstudiante = new ControladorEstudiante();
    $dataEstudiantes = $objEstudiante->ctrContarEstudiantes();
    ?>

    <!-- ********** cuerpo de tarjetas ********** -->
    <div class="card-body">
      <div class="row">

        <!-- Trajeta 1 Inicio -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $data['numeroPeliculas'] ?></h3>

              <p>Películas registradas</p>
            </div>
            <div class="icon">
              <i class="fas fa-video"></i>
            </div>
            <a href="peliculas" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- Trajeta 1 Fin-->

        <!-- ************ Trajeta2 estudiantes -inicio ********** -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $dataEstudiantes['numeroEstudiantes']; ?></h3>

              <p>Estudiantes</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-graduate"></i>
            </div>
            <a href="estudiantes" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ******* Trajeta2 estudiantes -fin ******* -->

        <!-- ************ Trajeta3 ingresos -inicio ********** -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $dataIngresos['numeroIngresos']; ?></h3>

              <p>Ingresos</p>
            </div>
            <div class="icon">
              <i class="fas fa-address-book"></i>
            </div>
            <a href="ingresos" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ******* Trajeta3 ingresos -fin ******* -->


        <!-- Default box 2 -->
        <div class="card">

        </div>

        <?php
        $objInvitados = new ControladorInvitado();
        $data = $objInvitados->ctrlContarInvitados();
        ?>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $data['numeroInvitados'] ?></h3>
              <p>Invitados registrados</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-secret"></i>
            </div>
            <a href="Invitados" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- Trajeta 2 Fin-->


      </div>
    </div>
    <!-- /.card-body -->


</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->