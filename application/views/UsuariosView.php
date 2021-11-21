<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center"><i class="fas fa-users mr-2"></i>Usuarios</h1>
            <hr style="background-color: black; color: black; height: 1px;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-2">

            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_add" onclick="modificarTituloModal('Agregar usuario');">
                Agregar
            </button>

            <!-- Modal para agregar/editar -->
            <div class="modal fade" id="modal_add" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="tituloModal">Agregar/modificar</h5>


                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="form_add">
                                <!-- Usuario -->
                                <!--ins_IDUsuario-->
                                <input type="hidden" name="ins_IDUsuario">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" name="ins_usuario" class="form-control" required>
                                </div>

                                <!-- Contraseña -->

                                <label for="">Contraseña</label>
                                <div class="input-group mb-3">

                                    <input type="password" class="form-control" name="ins_contrasena" required>
                                    <div id="ocultarClave">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" id="btnCambiarClave" name="cambiarClave" onclick="manipularInputClave()">
                                                <span>Cambiar</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Rol -->
                                <div class="form-group">
                                    <label for="">Rol</label>
                                    <select name="ins_rol" class="form-control" required>
                                        <option value="" selected hidden disabled>Seleccione una opción</option>
                                        <option value="Director">Director</option>
                                        <option value="Sub-Director">Sub-Director</option>
                                        <option value="Secretaria">Secretaria</option>
                                        <option value="Maestro">Maestro</option>
                                    </select>
                                </div>

                                <!-- IdEmpleado -->
                                <div class="form-group">
                                    <label for="">Empleado</label>
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" name="ins_idEmpleado" id="ins_idEmpleado" required>
                                        <input type="text" class="form-control" name="nomEmpleado" id="nomEmpleado" placeholder="Ninguno selecionado" required readonly>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SeleccionarEmpleado">
                                            Seleccionar
                                        </button>
                                    </div>
                                </div>
                        </div>

                        <div class="modal-footer">

                            <button id="btnInsertar" type="button" class="btn btn-primary" onclick="insertar()">Guardar</button>
                            <button id="btnEditar" type="button" class="btn btn-primary" onclick="editar()">Guardar cambios</button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarModal();">Cancelar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal seleccionar Empleado -->
            <div class="modal fade" id="SeleccionarEmpleado" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="staticBackdropLabel">Seleccionar Empleado</h5>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <th>Id</th>
                                    <th>Nombre Completo</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody id="tbodyEmpleados">

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
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Empleado</th>
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

        if (titulo === 'Agregar usuario') {
            $("#ocultarClave").hide();
            $("#btnEditar").hide();
            $("#btnInsertar").show();
            $("[name='ins_contrasena']").prop("disabled", false);
        } else {
            $("#btnInsertar").hide();
            $("#btnEditar").show();

            $("[name='ins_contrasena']").prop("disabled", true);
            $("#ocultarClave").show();
        }
    }

    const limpiarModal = () => {
        $("#ins_idEmpleado").val('');
        $('#form_add').trigger("reset");
    }

    const manipularInputClave = () => {
        if ($("#btnCambiarClave").is(":checked")) {
            $("[name='ins_contrasena']").prop("disabled", false);
        } else {
            $("[name='ins_contrasena']").prop("disabled", true);
        }
    }

    const cargarUsuarios = () => {
        $.get({
            url: 'cargarUsuarios',
            success: function(result) {
                let lista = "";
                result.forEach(usuario => {

                    lista += `
                    <tr>
                        <td>${usuario.IDUsuario}</td>
                        <td>${usuario.Usuario}</td>
                        <td>${usuario.Rol}</td>
                        <td>${nombreEmpleadoPorId(usuario.IDEmpleado)}</td>
                        <td>
                            <a href="#" id="edit" onclick="cargarUsuario('${usuario.IDUsuario}')" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>                                       
                            <a href="#" id="del" onclick="eliminarUsuario('${usuario.IDUsuario}')" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>`;
                });
                $('#tbody').html(lista);
            }
        });
    }

    const cargarEmpleados = () => {
        $.get({
            url: 'cargarEmpleados',
            dataType: "json",
            success: function(result) {
                let lista = "",
                    nombreCompleto = "";
                result.forEach(empleado => {
                    nombreCompleto = `${empleado.Nombres} ${empleado.Apellidos}`;
                    lista += `
                    <tr>
                        <td>${empleado.IDEmpleado}</td>
                        <td>${nombreCompleto}</td>                                               
                        <td>
                            <button class="btn btn-primary" onclick="seleccionarEmpleado('${empleado.IDEmpleado}','${nombreCompleto}');" >Seleccionar</button>                                                                                   
                        </td>
                    </tr>`;
                });
                $('#tbodyEmpleados').html(lista);
            }
        });
    }

    const nombreEmpleadoPorId = (id) => {
        let nombre;
        $.get({
            url: 'cargarEmpleado',
            async: false,
            dataType: "json",
            data: {
                id: id
            },
            success: function(empleado) {
                nombre = empleado.Nombres + ' ' + empleado.Apellidos;
            }
        });
        return nombre;
    }

    const cargarUsuario = (id) => {
        $.get({
            url: 'cargarUsuario',
            dataType: "json",
            data: {
                id: id
            },
            success: function(usuario) {

                modificarTituloModal("Modificar usuario");
                $("[name='ins_IDUsuario']").val(usuario.IDUsuario);
                $("[name='ins_usuario']").val(usuario.Usuario);
                $("[name='ins_contrasena']").val(usuario.Clave);
                $("[name='ins_rol']").val(usuario.Rol);
                $("[name='ins_idEmpleado']").val(usuario.IDEmpleado);
                // nomEmpleado
                $("#nomEmpleado").val(nombreEmpleadoPorId(usuario.IDEmpleado));

                $('#modal_add').modal('toggle');

            }
        });
    }

    const seleccionarEmpleado = (id, nombreCompleto) => {
        $('#ins_idEmpleado').val(id);
        $('#nomEmpleado').val(nombreCompleto);
        $('#SeleccionarEmpleado').modal('toggle');
    }

    const insertar = () => {

        let datosFormulario = $("#form_add").serialize();

        $.post({
            url: 'agregarUsuario',
            dataType: "json",
            data: datosFormulario,
            success: function(data) {
                if (data.response == "success") {
                    $('#modal_add').modal('toggle');
                    limpiarModal();

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '¡Registro agregado con exito!',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    cargarUsuarios();
                } else {
                    toastr["error"](data.message);
                }
            },
        });
    }

    const editar = () => {

        let datosFormulario = $("#form_add").serialize();

        $.post({
            url: 'editarUsuario',
            dataType: "json",
            data: datosFormulario,
            success: function(data) {
                if (data.response == "success") {
                    $('#modal_add').modal('toggle');
                    limpiarModal();

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '¡Registro actualizado con exito!',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    cargarUsuarios();
                } else {
                    toastr["error"](data.message);
                }
            },
        });

    }

    const eliminarUsuario = (id) => {
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
                        url: "<?php echo base_url(); ?>eliminarUsuario",
                        type: "post",
                        dataType: "json",
                        data: {
                            id: id,
                        },
                        success: function(data) {
                            cargarUsuarios();
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


    (() => { //ejecutar a cargar pagina
        cargarUsuarios();
        cargarEmpleados();

    })();
</script>