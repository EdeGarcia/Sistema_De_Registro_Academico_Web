<div class="container" style="margin-top: 60px;">

  <div class="row row-cols-1 row-cols-md-3">
    <div class="col mb-4 ">
      <div class="card border-primary mb-3" style="max-width: 18rem;">
        <div class="card-header bg-primary text-white">
          <p class="mb-0 pr-5"><i class="fa fa-user mr-3"></i>Gestión de Estudiantes</p>
        </div>
        <div class="card-body text-primary">
          <p class="card-text">Listado de los nuevos estudiantes ingresados en el complejo educativo.</p>
          <a href="<?= site_url('EstudiantesController') ?>" class="btn btn-info">Ver Información</a>
        </div>
      </div>
    </div>
    <div class="col mb-4">
      <div class="card border-primary mb-3" style="max-width: 18rem;">
        <div class="card-header bg-primary text-white">
          <p class="mb-0 pr-5"><i class="fas fa-clipboard mr-3"></i>Listado de Matricula</p>
        </div>
        <div class="card-body text-primary">
          <p class="card-text">Vea los estudiantes que ya han sido matriculados. </p>
          <a href="<?= site_url('MatriculasController/listado_matriculas') ?>" class="btn btn-info">Ver Información</a>
        </div>
      </div>
    </div>
    <div class="col mb-4 ">
      <div class="card border-primary mb-3" style="max-width: 18rem;">
        <div class="card-header bg-primary text-white">
          <p class="mb-0 pr-5"><i class="fa fa-users mr-3"></i>Gestión de Responsables</p>
        </div>
        <div class="card-body text-primary">
          <p class="card-text">Listado general de los representantes de cada estudiante.</p>
          <a href="<?= site_url('ResponsablesController') ?>" class="btn btn-info">Ver Información</a>
        </div>
      </div>
    </div>


  </div>

  <div class="row row-cols-1 row-cols-md-3">
    <div class="col mb-4"></div>
    <div class="col mb-4">
      <div class="card border-primary mb-3" style="max-width: 18rem;">
        <div class="card-header bg-primary text-white">
          <p class="mb-0 pr-5"><i class="fa fa-users mr-3"></i>Gestión de Notas</p>
        </div>
        <div class="card-body text-primary">
          <p class="card-text">Ingrese notas de los Estudiantes al sistema.</p>
          <a href="<?= site_url('NotasController') ?>" class="btn btn-info">Ver Información</a>
        </div>
      </div>
    </div>
    <div class="col mb-4"></div>
  </div>
</div>