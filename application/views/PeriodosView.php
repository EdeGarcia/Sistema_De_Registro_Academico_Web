<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <img src="<?php echo base_url(); ?>assets/img/logo_sistema.png" width="90" height="90" style="float:left;" alt="">
                <h1 class="display-3" style="margin-left: 100px;">Periodos</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-md-12 mt-2">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_add">
                Agregar
            </button>

            <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Agregar Periodo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="form_add">
                                <div class="form-group">
                                    <label for="">Periodo</label>
                                    <input type="text" name="ins_periodo" class="form-control">
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

                            <h5 class="modal-title" id="exampleModalLabel">Actualizar Periodo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="form_edit">
                                <input type="hidden" name="edit_id">
                                <div class="form-group">
                                    <label for="">Periodo</label>
                                    <input type="text" name="edit_periodo" class="form-control">
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
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Periodo</th>
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

        var ins_periodo = $("[name=ins_periodo]").val();

        $.ajax({
            url: "<?php echo base_url(); ?>agregarPeriodo",
            type: "post",
            dataType: "json",
            data: {
                ins_periodo: ins_periodo,
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
            url: "<?php echo base_url(); ?>cargarPeriodos",
            type: "get",
            dataType: "json",
            success: function(data) {
                var tbody = "";
                for (var key in data) {
                    tbody += "<tr>";
                    tbody += "<td>" + data[key]["IDPeriodo"] + "</td>";
                    tbody += "<td>" + data[key]["Periodo"] + "</td>";
                    tbody += `<td>
                                    <a href="#" id="del" value="${data[key]["IDPeriodo"]}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                    <a href="#" id="edit" value="${data[key]["IDPeriodo"]}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
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
                            url: "<?php echo base_url(); ?>eliminarPeriodo",
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
                url: "<?php echo base_url(); ?>editarPeriodo",
                type: "post",
                dataType: "json",
                data: {
                    edit_id: edit_id,
                },
                success: function(data) {
                    if (data.response === "success") {
                        $("#modal_edit").modal("show");
                        $("#modal_edit").modal("show");
                        $("[name=edit_id]").val(data.post.IDPeriodo);
                        $("[name=edit_periodo]").val(data.post.Periodo);
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
        var edit_periodo = $("[name=edit_periodo]").val();

        $.ajax({
            url: "<?php echo base_url(); ?>actualizarPeriodo",
            type: "post",
            dataType: "json",
            data: {
                edit_id: edit_id,
                edit_periodo: edit_periodo,

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