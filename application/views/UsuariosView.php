<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Usuarios</h1>
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
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="form_add">
                                <!-- Usuario -->
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" name="ins_usuario" class="form-control" required>
                                </div>

                                <!-- Contraseña -->
                                <div class="form-group">
                                    <label for="">Contraseña</label>
                                    <input type="text" class="form-control" name="ins_contrasena" required>
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
                            <button type="button" class="btn btn-primary" onclick="insertar()">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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





            <!-- Modal para editar -->
            <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Actualizar Materia</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="form_edit">
                                <input type="hidden" name="edit_id">
                                <!-- Usuario -->
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" name="edit_usuario" class="form-control">
                                </div>
                            </form>
                            <a href="#modal-1" data-toggle="modal" data-dismiss="modal">Previous</a>
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
            <table class="table table-hover table-responsive-md">
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

<script>
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
                        <td>${usuario.IDEmpleado}</td>
                        <td>
                            <a href="#" id="del" value="${usuario.IDUsuario}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                            <a href="#" id="edit" value="${usuario.IDUsuario}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>                                       
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
                let lista = "", nombreCompleto = "";
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

    const seleccionarEmpleado = (id, nombreCompleto) => {
        $('#ins_idEmpleado').val(id);
        $('#nomEmpleado').val(nombreCompleto);
        $('#SeleccionarEmpleado').modal('toggle');
    }

    const insertar = () =>{  
        
        $.post({
            url: 'agregarUsuario',            
            dataType: "json",
            data: {
                ins_usuario      : $("[name='ins_usuario']").val(),
                ins_contrasena   : $("[name='ins_contrasena']").val(),
                ins_rol          : $("[name='ins_rol']").val(),
                ins_idEmpleado   : $("[name='ins_idEmpleado']").val()
            },
            success: function(data) {
                if (data.response == "success") {                    
                    $('#modal_add').modal('toggle');
                    $("#ins_idEmpleado").val('');
                    $("#form_add")[0].reset();
                                        
                    cargarUsuarios();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '¡Registro agregado con exito!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Command: toastr["error"](data.message);

                    toastr.options = {
                        closeButton: false,
                        debug: false,
                        newestOnTop: false,
                        progressBar: false,
                        positionClass: "toast-top-right",
                        preventDuplicates: false,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        timeOut: "5000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                    };
                }
            },
        });



    }


    (() => { //ejecutar a cargar pagina
        cargarUsuarios();
        cargarEmpleados();
    })();
</script>