<div class="container" style="margin-top: 60px;">

  <div class="row row-cols-1 row-cols-md-3">
    <div class="col mb-4 ">
      <div class="card border-primary mb-3" style="max-width: 18rem;">
        <div class="card-header bg-primary text-white">
          <p class="mb-0 pr-5"><i class="fa fa-users mr-3"></i>Listado de matrículas</p>
        </div>
        <div class="card-body text-primary">
          <p class="card-text">Vea los estudiantes que ya han siso matriculados.</p>
          <a href="<?= site_url('MatriculasController/listado_matriculas') ?>" class="btn btn-info">Ver Información</a>
        </div>
      </div>
    </div>
    <div class="col mb-4">
      <div class="card border-primary mb-3" style="max-width: 18rem;">
        <div class="card-header bg-primary text-white">
          <p class="mb-0 pr-5"><i class="fas fa-star mr-3"></i>Gestión de Notas</p>
        </div>
        <div class="card-body text-primary">
          <p class="card-text">Asignación de notas a cada estudiante de las diferentes secciones.</p>
          <a href="<?= site_url('NotasController') ?>" class="btn btn-info">Ver Información</a>
        </div>
      </div>
    </div>
    <div class="col mb-4 ">
      <div class="card border-primary mb-3" style="max-width: 18rem;">
        <div class="card-header bg-primary text-white">
          <p class="mb-0 pr-5"><i class="fa fa-user mr-3"></i>Gestión de Estudiantes</p>
        </div>
        <div class="card-body text-primary">
          <p class="card-text">Listado general de los nuevos estudiantes ingresados en el complejo educativo.</p>
          <a href="<?= site_url('EstudiantesController') ?>" class="btn btn-info">Ver Información</a>
        </div>
      </div>
    </div>

  </div>

  <div class="row row-cols-1 row-cols-md-3">
    <div class="col mb-4"></div>
    <div class="col mb-4">
      <div class="card border-primary mb-3" style="max-width: 18rem;">
        <div class="card-header bg-primary text-white">
          <p class="mb-0 pr-5"><i class="fa fa-user mr-3"></i>Matrícula</p>
        </div>
        <div class="card-body text-primary">
          <p class="card-text">Realice el proceso de matrícula de estudiantes en su respectivo grado y sección.</p>
          <a href="<?= site_url('MatriculasController/matricular') ?>" class="btn btn-info">Ver Información</a>
        </div>
      </div>
    </div>
    <div class="col mb-4"></div>
  </div>
</div>