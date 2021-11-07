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
                <div class="modal-dialog">
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
                                    <input type="text" name="ins_usuario" class="form-control">
                                </div>

                                <!-- Contraseña -->
                                <div class="form-group">
                                    <label for="">Contraseña</label>
                                    <input type="text" class="form-control" name="ins_contrasena">
                                </div>

                                <!-- Rol -->
                                <div class="form-group">
                                    <label for="">Rol</label>
                                    <select name="ins_rol" class="form-control">
                                        <option value="Director">Director</option>
                                        <option value="Sub-Director">Sub-Director</option>
                                        <option value="Secretaria">Secretaria</option>
                                        <option value="Maestro">Maestro</option>
                                    </select>
                                </div>
                            </form>

                            <a href="#modal_add" data-toggle="modal" data-dismiss="modal">Next</a>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="add">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
