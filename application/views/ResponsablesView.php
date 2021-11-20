<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Responsables</h1>
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
                                            <input type="text" name="ins_nombres" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Apellidos -->
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <input type="text" name="ins_apellidos" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Fecha de nacimiento -->
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <input type="date" name="ins_fecha" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Sexo -->
                                        <div class="form-group">
                                            <label for="">Sexo</label>
                                            <select name="ins_sexo" class="form-control">
                                                <option value=""></option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Tipo de parentesco -->
                                        <div class="form-group">
                                            <label for="">Tipo de parentesco</label>
                                            <input type="text" name="ins_tipo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- DUI -->
                                        <div class="form-group">
                                            <label for="">DUI</label>
                                            <input class="form-control" type="text" name="ins_dui">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- NIT -->
                                        <div class="form-group">
                                            <label for="">NIT</label>
                                            <input class="form-control" type="text" name="ins_nit">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Telefono -->
                                        <div class="form-group">
                                            <label for="">Telefono</label>
                                            <input class="form-control" type="text" name="ins_telefono">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Actualizar Responsable</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="form_edit">
                                <input type="hidden" name="edit_id">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Nombres -->
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="edit_nombres" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Apellidos -->
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <input type="text" name="edit_apellidos" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Fecha de nacimiento -->
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <input type="date" name="edit_fecha" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Sexo -->
                                        <div class="form-group">
                                            <label for="">Sexo</label>
                                            <select name="edit_sexo" class="form-control">
                                                <option value=""></option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Tipo de parentesco -->
                                        <div class="form-group">
                                            <label for="">Tipo de parentesco</label>
                                            <input type="text" name="edit_tipo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- DUI -->
                                        <div class="form-group">
                                            <label for="">DUI</label>
                                            <input class="form-control" type="text" name="edit_dui">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- NIT -->
                                        <div class="form-group">
                                            <label for="">NIT</label>
                                            <input class="form-control" type="text" name="edit_nit">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Telefono -->
                                        <div class="form-group">
                                            <label for="">Telefono</label>
                                            <input class="form-control" type="text" name="edit_telefono">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </form>
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
                            <th>Fecha nacimiento</th>
                            <th>Sexo</th>
                            <th>Tipo parentesco</th>
                            <th>DUI</th>
                            <th>NIT</th>
                            <th>Telefono</th>
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
    $(document).on("click", "#add", function(e) {
        e.preventDefault();

        var ins_nombres = $("[name=ins_nombres]").val();
        var ins_apellidos = $("[name=ins_apellidos]").val();
        var ins_fecha = $("[name=ins_fecha]").val();
        var ins_sexo = $("[name=ins_sexo]").val();
        var ins_tipo = $("[name=ins_tipo]").val();
        var ins_dui = $("[name=ins_dui]").val();
        var ins_nit = $("[name=ins_nit]").val();
        var ins_telefono = $("[name=ins_telefono]").val();

        $.ajax({
            url: "<?php echo base_url(); ?>agregarResponsable",
            type: "post",
            dataType: "json",
            data: {
                ins_nombres: ins_nombres,
                ins_apellidos: ins_apellidos,
                ins_fecha: ins_fecha,
                ins_sexo: ins_sexo,
                ins_tipo: ins_tipo,
                ins_dui: ins_dui,
                ins_nit: ins_nit,
                ins_telefono: ins_telefono
            },
            success: function(data) {
                if (data.response == "success") {
                    fetch();
                    $("#modal_add").modal("hide");
                    $("#form_add")[0].reset();

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '¡Registro agregado con exito!',
                        showConfirmButton: false,
                        timer: 1500
                    })

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
    });

    function fetch() {
        $.ajax({
            url: "<?php echo base_url(); ?>cargarResponsables",
            type: "get",
            dataType: "json",
            success: function(data) {
                var tbody = "";
                for (var key in data) {
                    tbody += "<tr>";
                    tbody += "<td>" + data[key]["IDResponsable"] + "</td>";
                    tbody += "<td>" + data[key]["Nombres"] + "</td>";
                    tbody += "<td>" + data[key]["Apellidos"] + "</td>";
                    tbody += "<td>" + data[key]["FechaNacimiento"] + "</td>";
                    tbody += "<td>" + data[key]["Sexo"] + "</td>";
                    tbody += "<td>" + data[key]["TipoDeParentesco"] + "</td>";
                    tbody += "<td>" + data[key]["DUI"] + "</td>";
                    tbody += "<td>" + data[key]["NIT"] + "</td>";
                    tbody += "<td>" + data[key]["Telefono"] + "</td>";
                    tbody += `<td>
                                    <a href="#" id="del" value="${data[key]["IDResponsable"]}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                    <a href="#" id="edit" value="${data[key]["IDResponsable"]}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
                                </td>`;
                    tbody += "<tr>";
                }

                $("#tbody").html(tbody);
            },
        });
    }

    fetch();

    $(document).on("click", "#del", function(e) {
        e.preventDefault();

        var del_id = $(this).attr("value");

        if (del_id == "") {
            alert("ID requerido para la eliminación");
        } else {
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
                            url: "<?php echo base_url(); ?>eliminarResponsable",
                            type: "post",
                            dataType: "json",
                            data: {
                                del_id: del_id,
                            },
                            success: function(data) {
                                fetch();
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
    });

    $(document).on("click", "#edit", function(e) {
        e.preventDefault();

        var edit_id = $(this).attr("value");

        if (edit_id == "") {
            alert("ID requerido para editar");
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>editarResponsable",
                type: "post",
                dataType: "json",
                data: {
                    edit_id: edit_id,
                },
                success: function(data) {
                    if (data.response === "success") {
                        $("#modal_edit").modal("show");
                        $("[name=edit_id]").val(data.post.IDResponsable);
                        $("[name=edit_nombres]").val(data.post.Nombres);
                        $("[name=edit_apellidos]").val(data.post.Apellidos);
                        $("[name=edit_fecha]").val(data.post.FechaNacimiento);
                        $("[name=edit_sexo]").val(data.post.Sexo);
                        $("[name=edit_tipo]").val(data.post.TipoDeParentesco);
                        $("[name=edit_dui]").val(data.post.DUI);
                        $("[name=edit_nit]").val(data.post.NIT);
                        $("[name=edit_telefono]").val(data.post.Telefono);
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
    });

    $(document).on("click", "#update", function(e) {
        e.preventDefault();

        var edit_id = $("[name=edit_id]").val();
        var edit_nombres = $("[name=edit_nombres]").val();
        var edit_apellidos = $("[name=edit_apellidos]").val();
        var edit_fecha = $("[name=edit_fecha]").val();
        var edit_sexo = $("[name=edit_sexo]").val();
        var edit_tipo = $("[name=edit_tipo]").val();
        var edit_dui = $("[name=edit_dui]").val();
        var edit_nit = $("[name=edit_nit]").val();
        var edit_telefono = $("[name=edit_telefono]").val();

        $.ajax({
            url: "<?php echo base_url(); ?>actualizarResponsable",
            type: "post",
            dataType: "json",
            data: {
                edit_id: edit_id,
                edit_nombres: edit_nombres,
                edit_apellidos: edit_apellidos,
                edit_fecha: edit_fecha,
                edit_sexo: edit_sexo,
                edit_tipo: edit_tipo,
                edit_dui: edit_dui,
                edit_nit: edit_nit,
                edit_telefono: edit_telefono
            },
            success: function(data) {
                fetch();
                if (data.response === "success") {
                    $("#modal_edit").modal("hide");

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $("#form_edit")[0].reset();

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
    });
</script>