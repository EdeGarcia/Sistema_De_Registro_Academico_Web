<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcout icon" href="<?php echo base_url(); ?>assets/img/logo_sistema.png">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">

  <!-- Estilos generales -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

  <!-- Toastr -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!--FontAwesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


  <title><?= $titulo ?></title>
</head>

<body>
  <!-- Scripts necesarios -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">

    <div class="container-fluid">
      <!-- Logo del sistema -->
      <a class="navbar-brand" href="<?= site_url('PageController') ?>">
        <img src="<?php echo base_url(); ?>assets/img/logo_sistema.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Sistema Acad??mico
      </a>

      <!-- Botnon toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Opciones de menu -->
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <!-- Director -->
          <?php if ($this->session->userdata('rol') == 'Director') : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                General
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('EmpleadosController') ?>">Gesti??n de empleados</a></li>
                <li><a class="dropdown-item" href="<?= site_url('UsuariosController') ?>">Gesti??n de usuarios</a></li>
                <li><a class="dropdown-item" href="<?= site_url('PeriodosController') ?>">Gesti??n de periodos</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Grados y secciones
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('GradosController') ?>">Gesti??n de grados</a></li>
                <li><a class="dropdown-item" href="<?= site_url('SeccionesController') ?>">Gesti??n de secciones</a></li>
                <li><a class="dropdown-item" href="<?= site_url('MaestrosSeccionesController') ?>">Gesti??n de maestro por seccion</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Responsables y estudiantes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('ResponsablesController') ?>">Gesti??n de responsables</a></li>
                <li><a class="dropdown-item" href="<?= site_url('EstudiantesController') ?>">Gesti??n de estudiantes</a></li>
              </ul>
            </li>

          <?php elseif ($this->session->userdata('rol') == 'Sub-Director') : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Grados y secciones
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('GradosController') ?>">Gesti??n de grados</a></li>
                <li><a class="dropdown-item" href="<?= site_url('SeccionesController') ?>">Gesti??n de secciones</a></li>
                <li><a class="dropdown-item" href="<?= site_url('MaestrosSeccionesController') ?>">Gesti??n de maestro por seccion</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Materias
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('MateriasController') ?>">Gesti??n de materias</a></li>
                <li><a class="dropdown-item" href="<?= site_url('GradosMateriasController') ?>">Gesti??n de materias por grado</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Responsables y estudiantes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('ResponsablesController') ?>">Gesti??n de responsables</a></li>
                <li><a class="dropdown-item" href="<?= site_url('EstudiantesController') ?>">Gesti??n de estudiantes</a></li>
              </ul>
            </li>

          <?php elseif ($this->session->userdata('rol') == 'Secretaria') : ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Responsables y estudiantes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('ResponsablesController') ?>">Gesti??n de responsables</a></li>
                <li><a class="dropdown-item" href="<?= site_url('EstudiantesController') ?>">Gesti??n de estudiantes</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Matricula
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('MatriculasController') ?>">Gesti??n de matricula</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Notas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('NotasController') ?>">Gesti??n de notas</a></li>
              </ul>
            </li>

          <?php else : ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Responsables y estudiantes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('ResponsablesController') ?>">Gesti??n de responsables</a></li>
                <li><a class="dropdown-item" href="<?= site_url('EstudiantesController') ?>">Gesti??n de estudiantes</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Matr??cula
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('MatriculasController') ?>">Gesti??n de matr??cula</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Notas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('NotasController') ?>">Gesti??n de notas</a></li>
              </ul>
            </li>

          <?php endif; ?>
        </ul>


        <div class="btn-group">
          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" data-display="static" aria-expanded="false">
            <i class="fas fa-cogs"></i> Opciones
          </button>
          <div class="dropdown-menu dropdown-menu-md-right">
            <button class="dropdown-item" type="button"><i class="fas fa-user"></i> Usuario : <?php echo $this->session->userdata('usuario') ?></button>
            <button class="dropdown-item" type="button"><i class="far fa-id-card"></i> Rol : <?php echo $this->session->userdata('rol') ?></button>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('LoginController/logout'); ?>" type="button" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Cerrar sesi??n</a>
          </div>
        </div>

  </nav>