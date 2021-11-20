<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Estudiantes</h1>
            <hr style="background-color: black; color: black; height: 1px;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-2">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add">
                Agregar
            </button>

            <!-- Modal para agregar -->
            <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Agregar Responsable</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="form_add">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Nombres -->
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input class="form-control" type="text" name="ins_nombres">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Apellidos -->
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <input class="form-control" type="text" name="ins_apellidos">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Direccion -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <input class="form-control" type="text" name="ins_direccion">
                                        </div>
                                    </div>
                                    <!-- Fecha de nacimiento -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <input class="form-control" type="date" name="ins_fecha">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Sexo</label>
                                            <select name="ins_sexo" class="form-control">
                                                <option value=""></option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIE</label>
                                            <input class="form-control" type="text" name="ins_nie">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <!-- IDResponsable -->
                                        <div class="form-group">
                                            <label for="">Responsable</label>
                                            <div class="input-group">
                                                <input type="hidden" class="form-control" name="ins_idResponsable" id="ins_idResponsable" required>
                                                <input type="text" class="form-control" name="nomResponsable" id="nomResponsable" placeholder="Ninguno selecionado" required readonly>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SeleccionarResponsable">
                                                    Seleccionar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="insertar()">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>

                    </div>
                </div>
            </div>



            <!-- Modal para seleccionar Responsable -->
            <div class="modal fade" id="SeleccionarResponsable" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="staticBackdropLabel">Seleccionar Responsable</h5>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <th>DUI</th>
                                    <th>Nombre Completo</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody id="tbodyResponsables">
                                </tbody>
                            </table>
                            <center>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para editar -->
            <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Actualizar Grado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="form_add">
                                <input type="hidden" name="edit_id">
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="update">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Fecha nacimiento</th>
                            <th>Sexo</th>
                            <th>NIE</th>
                            <th>Responsable</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script>
    const cargarResponsables = () => {
        $.get({
            url: 'cargarResponsables',
            dataType: "json",
            success: function(result) {
                let lista = "",
                    nombreCompleto = "";
                result.forEach(responsable => {
                    nombreCompleto = `${responsable.Nombres} ${responsable.Apellidos}`;
                    lista += `
                    <tr>
                        <td>${responsable.DUI}</td>
                        <td>${nombreCompleto}</td>                                               
                        <td>
                            <button class="btn btn-primary" onclick="seleccionarResponsable('${responsable.IDResponsable}','${nombreCompleto}');" >Seleccionar</button>                                                                                   
                        </td>
                    </tr>`;
                });
                $('#tbodyResponsables').html(lista);
            }
        });
    }

    const seleccionarResponsable = (id, nombreCompleto) => {
        $('#ins_idResponsable').val(id);
        $('#nomResponsable').val(nombreCompleto);
        $('#SeleccionarResponsable').modal('toggle');
    }

    const insertar = () => {
        let datosFormulario = $("#form_add").serialize();

        $.post({
            url: 'agregarEstudiante',
            dataType: "json",
            data: datosFormulario,
            success: function(data) {
                if (data.response == "success") {
                    $('#modal_add').modal('toggle');
                    $('#ins_idResponsable').val('');
                    $('#form_add').trigger("reset");

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '¡Registro agregado con exito!',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    cargarEstudiantes();

                } else {
                    toastr["error"](data.message);
                }
            },
        });
    }

    const cargarEstudiantes = () => {
        $.get({
            url: 'cargarEstudiantes',
            success: function(result) {
                let lista = "";
                result.forEach(estudiante => {
                    lista += `
                    <tr>
                        <td>${estudiante.IDEstudiante}</td>
                        <td>${estudiante.Nombres}</td>
                        <td>${estudiante.Apellidos}</td>
                        <td>${estudiante.Direccion}</td>
                        <td>${estudiante.FechaNacimiento}</td>
                        <td>${estudiante.Sexo}</td>
                        <td>${estudiante.NIE}</td>
                        <td>${estudiante.IDResponsable}</td>
                        <td>
                            <a href="#" id="edit" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>                                       
                            <a href="#" id="del" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>`;
                });
                $('#tbody').html(lista);
            }
        });
    }

    (() => { //ejecutar a cargar pagina
        cargarEstudiantes();
        cargarResponsables();
    })();
</script>