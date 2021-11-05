<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Secciones</h1>
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

                            <h5 class="modal-title" id="exampleModalLabel">Agregar Sección</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="form_add">
                                <!-- Descripcion -->
                                <div class="form-group">
                                    <label for="">Sección</label>
                                    <input type="text" name="ins_descripcion" class="form-control">
                                </div>
                                <!-- Turno -->
                                <div class="form-group">
                                    <label for="">Turno</label>
                                    <select name="ins_turno" class="form-control">
                                        <option value=""></option>
                                        <option value="Matutino">Matutino</option>
                                        <option value="Vespertino">Vespertino</option>
                                    </select>
                                </div>
                                <!-- Aula -->
                                <div class="form-group">
                                    <label for="">Aula</label>
                                    <input type="text" name="ins_aula" class="form-control">
                                </div>
                                <!-- Cupo -->
                                <div class="form-group">
                                    <label for="">Cupo</label>
                                    <input type="text" name="ins_cupo" class="form-control">
                                </div>
                                <!-- IDGrado -->
                                <div class="form-group">
                                    <label for="">Grado</label>
                                    <select name="ins_grado" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($grados as $grado) { ?>
                                            <option value="<?= $grado->IDGrado ?>"><?= $grado->Descripcion ?></option>
                                        <?php } ?>
                                    </select>
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


            <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Actualizar Sección</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="form_edit">
                                <input type="hidden" name="edit_id">
                                <!-- Descripcion -->
                                <div class="form-group">
                                    <label for="">Sección</label>
                                    <input type="text" name="edit_descripcion" class="form-control">
                                </div>
                                <!-- Turno -->
                                <div class="form-group">
                                    <label for="">Turno</label>
                                    <select name="edit_turno" class="form-control">
                                        <option value=""></option>
                                        <option value="Matutino">Matutino</option>
                                        <option value="Vespertino">Vespertino</option>
                                    </select>
                                </div>
                                <!-- Aula -->
                                <div class="form-group">
                                    <label for="">Aula</label>
                                    <input type="text" name="edit_aula" class="form-control">
                                </div>
                                <!-- Cupo -->
                                <div class="form-group">
                                    <label for="">Cupo</label>
                                    <input type="text" name="edit_cupo" class="form-control">
                                </div>
                                <!-- IDGrado -->
                                <div class="form-group">
                                    <label for="">Grado</label>
                                    <select name="edit_grado" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($grados as $grado) { ?>
                                            <option value="<?= $grado->IDGrado ?>"><?= $grado->Descripcion ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
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
            <table class="table table-hover table-responsive-md">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Secion</th>
                        <th>Turno</th>
                        <th>Aula</th>
                        <th>Cupo</th>
                        <th>Grado</th>
                        <th style="display:none;">IDGrado</th>
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
    $(document).on("click", "#add", function(e) {
        e.preventDefault();

        var ins_descripcion = $("[name=ins_descripcion]").val();
        var ins_turno = $("[name=ins_turno]").val();
        var ins_aula = $("[name=ins_aula]").val();
        var ins_cupo = $("[name=ins_cupo]").val();
        var ins_grado = $("[name=ins_grado]").val();

        $.ajax({
            url: "<?php echo base_url(); ?>agregarSeccion",
            type: "post",
            dataType: "json",
            data: {
                ins_descripcion: ins_descripcion,
                ins_turno: ins_turno,
                ins_aula: ins_aula,
                ins_cupo: ins_cupo,
                ins_grado: ins_grado
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
            url: "<?php echo base_url(); ?>cargarSecciones",
            type: "get",
            dataType: "json",
            success: function(data) {
                var tbody = "";
                for (var key in data) {
                    tbody += "<tr>";
                    tbody += "<td>" + data[key]["IDSeccion"] + "</td>";
                    tbody += "<td>" + data[key]["Descripcion"] + "</td>";
                    tbody += "<td>" + data[key]["Turno"] + "</td>";
                    tbody += "<td>" + data[key]["Aula"] + "</td>";
                    tbody += "<td>" + data[key]["Cupo"] + "</td>";
                    tbody += "<td>" + data[key]["Descripcion"] + "</td>";
                    tbody += "<td style='display:none;'>" + data[key]["IDGrado"] + "</td>";
                    tbody += `<td>
                                    <a href="#" id="del" value="${data[key]["IDSeccion"]}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                    <a href="#" id="edit" value="${data[key]["IDSeccion"]}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
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
                            url: "<?php echo base_url(); ?>eliminarSeccion",
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
                url: "<?php echo base_url(); ?>editarSeccion",
                type: "post",
                dataType: "json",
                data: {
                    edit_id: edit_id,
                },
                success: function(data) {
                    if (data.response === "success") {
                        $("#modal_edit").modal("show");
                        $("#modal_edit").modal("show");
                        $("[name=edit_id]").val(data.post.IDSeccion);
                        $("[name=edit_descripcion]").val(data.post.Descripcion);
                        $("[name=edit_turno]").val(data.post.Turno);
                        $("[name=edit_aula]").val(data.post.Aula);
                        $("[name=edit_cupo]").val(data.post.Cupo);
                        $("[name=edit_grado]").val(data.post.IDGrado);
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
        var edit_descripcion = $("[name=edit_descripcion]").val();
        var edit_turno = $("[name=edit_turno]").val();
        var edit_aula = $("[name=edit_aula]").val();
        var edit_cupo = $("[name=edit_cupo]").val();
        var edit_grado = $("[name=edit_grado]").val();


        $.ajax({
            url: "<?php echo base_url(); ?>actualizarSeccion",
            type: "post",
            dataType: "json",
            data: {
                edit_id: edit_id,
                edit_descripcion: edit_descripcion,
                edit_turno: edit_turno,
                edit_aula: edit_aula,
                edit_cupo: edit_cupo,
                edit_grado: edit_grado
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