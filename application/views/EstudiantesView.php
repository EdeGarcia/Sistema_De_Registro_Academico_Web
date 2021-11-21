<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center"><i class="fas fa-users mr-2"></i>Estudiantes</h1>
            <hr style="background-color: black; color: black; height: 1px;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-2">

            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_add" onclick="modificarTituloModal('Agregar estudiante');">
                Agregar
            </button>

            <!-- Modal para agregar -->
            <div class="modal fade" id="modal_add" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tituloModal">Agregar/modificar</h5>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="form_add">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="ins_idEstudiante">
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

                            <button id="btnInsertar" type="button" class="btn btn-primary" onclick="insertar()">Guardar</button>
                            <button id="btnEditar" type="button" class="btn btn-primary" onclick="editar()">Guardar cambios</button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarModal();">Cancelar</button>
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
    const modificarTituloModal = (titulo) => {
        $("#tituloModal").text(titulo);
        if (titulo === 'Agregar estudiante') {
            $("#btnEditar").hide();
            $("#btnInsertar").show();
        } else {
            $("#btnInsertar").hide();
            $("#btnEditar").show();
        }
    }

    const limpiarModal = () => {
        $("#ins_idResponsable").val('');
        $('#form_add').trigger("reset");
    }

    const nombreResponsablePorId = (id) => {
        let nombre;
        $.get({
            url: 'cargarResponsable',
            async: false,
            dataType: "json",
            data: {
                id: id
            },
            success: function(responsable) {
                nombre = responsable.Nombres + ' ' + responsable.Apellidos;
            }
        });
        return nombre;
    }

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
                        <td>${nombreResponsablePorId(estudiante.IDResponsable)}</td>
                        <td>
                            <a href="#" id="edit" onclick="cargarEstudiante('${estudiante.IDEstudiante}')" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>                                       
                            <a href="#" id="del" onclick="eliminarEstudiante('${estudiante.IDEstudiante}')" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>`;
                });
                $('#tbody').html(lista);
            }
        });
    }

    const eliminarEstudiante = (id) => {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger mr-2",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "Advertencia",
                text: "¿Desea eliminar el registro seleccionado?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Aceptar",
                cancelButtonText: "Cancelar",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>eliminarEstudiante",
                        type: "post",
                        dataType: "json",
                        data: {
                            id: id,
                        },
                        success: function(data) {
                            cargarEstudiantes();
                            if (data.response === "success") {
                                swalWithBootstrapButtons.fire(
                                    "Aviso",
                                    "¡Registro eliminado correctamente!",
                                    "success"
                                );
                            }
                        },
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        "Cancelado",
                        "La acción fue cancelada",
                        "error"
                    );
                }
            });
    }

    const cargarEstudiante = (id) => {
        $.get({
            url: 'cargarEstudiante',
            dataType: "json",
            data: {
                id: id
            },
            success: function(estudiante) {
                modificarTituloModal("Modificar estudiante");
                $("[name='ins_idEstudiante']").val(estudiante.IDEstudiante);
                $("[name='ins_nombres']").val(estudiante.Nombres);
                $("[name='ins_apellidos']").val(estudiante.Apellidos);
                $("[name='ins_direccion']").val(estudiante.Direccion);
                $("[name='ins_fecha']").val(estudiante.FechaNacimiento);
                $("[name='ins_sexo']").val(estudiante.Sexo);
                $("[name='ins_nie']").val(estudiante.NIE);
                // nomEstudiante
                $("[name='ins_idResponsable']").val(estudiante.IDResponsable);
                $("#nomResponsable").val(nombreResponsablePorId(estudiante.IDResponsable));
                $('#modal_add').modal('toggle');
            }
        });
    }

    const editar = () => {

        let datosFormulario = $("#form_add").serialize();

        $.post({
            url: 'editarEstudiante',
            dataType: "json",
            data: datosFormulario,
            success: function(data) {
                if (data.response == "success") {
                    $('#modal_add').modal('toggle');
                    limpiarModal();

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
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

    (() => { //ejecutar a cargar pagina
        cargarEstudiantes();
        cargarResponsables();
    })();
</script>