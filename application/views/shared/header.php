<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

  <title>Inicio</title>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">

    <div class="container-fluid">
      <!-- Logo del sistema -->
      <a class="navbar-brand" href="#">
        <img src="<?php echo base_url(); ?>assets/img/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Sistema Academico
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
                <li><a class="dropdown-item" href="#">Gestión de empleados</a></li>
                <li><a class="dropdown-item" href="#">Gestión de usuarios</a></li>
                <li><a class="dropdown-item" href="#">Gestión de maestros</a></li>
                <li><a class="dropdown-item" href="#">Gestión de periodos</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Grados y secciones
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de grados</a></li>
                <li><a class="dropdown-item" href="#">Gestión de secciones</a></li>
                <li><a class="dropdown-item" href="#">Gestión de maestro por seccion</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Responsables y estudiantes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de responsables</a></li>
                <li><a class="dropdown-item" href="#">Gestión de estudiantes</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Reportes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Estudiantes por sección</a></li>
                <li><a class="dropdown-item" href="#">Notas por sección</a></li>
                <li><a class="dropdown-item" href="#">Responsables por sección</a></li>
                <li><a class="dropdown-item" href="#">Asistencias por sección</a></li>
              </ul>
            </li>

          <?php elseif ($this->session->userdata('rol') == 'Sub-Director') : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Grados y secciones
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de grados</a></li>
                <li><a class="dropdown-item" href="#">Gestión de secciones</a></li>
                <li><a class="dropdown-item" href="#">Gestión de maestro por seccion</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Materias
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de materias</a></li>
                <li><a class="dropdown-item" href="#">Gestión de materias por grado</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Responsables y estudiantes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de responsables</a></li>
                <li><a class="dropdown-item" href="#">Gestión de estudiantes</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Reportes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Estudiantes por sección</a></li>
                <li><a class="dropdown-item" href="#">Notas por sección</a></li>
                <li><a class="dropdown-item" href="#">Responsables por sección</a></li>
                <li><a class="dropdown-item" href="#">Asistencias por sección</a></li>
              </ul>
            </li>

          <?php elseif ($this->session->userdata('rol') == 'Secretaria') : ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Responsables y estudiantes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de responsables</a></li>
                <li><a class="dropdown-item" href="#">Gestión de estudiantes</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Matricula
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de matricula</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Notas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de notas</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Asistencias
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de asistencia</a></li>
              </ul>
            </li>

          <?php else : ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Responsables y estudiantes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de responsables</a></li>
                <li><a class="dropdown-item" href="#">Gestión de estudiantes</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Matricula
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de matricula</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Notas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de notas</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Asistencias
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gestión de asistencia</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Reportes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Estudiantes por sección</a></li>
                <li><a class="dropdown-item" href="#">Notas por sección</a></li>
                <li><a class="dropdown-item" href="#">Responsables por sección</a></li>
                <li><a class="dropdown-item" href="#">Asistencias por sección</a></li>
              </ul>
            </li>


          <?php endif; ?>
        </ul>

        <div class="navbar-nav ms-auto mt-2">
          <a href="<?php echo site_url('LoginController/logout'); ?>" type="button" class="btn btn-outline-warning" id="logout">Cerrar sesión</a>
        </div>
      </div>
    </div>

  </nav>