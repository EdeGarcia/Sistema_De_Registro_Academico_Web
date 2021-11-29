<div class="container-fluid">
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <img src="<?php echo base_url(); ?>assets/img/logo_sistema.png" width="90" height="90" style="float:left;" alt="">
                        <h1 class="display-3" style="margin-left: 100px;">Listado de matriculas</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="text-center">
                <h6>Grado</h6>
            </div>
            <select name="ins_grado" id="ins_grado" class="form-control">
                <option value=""></option>
                <?php foreach ($grados as $grado) { ?>
                    <option value="<?= $grado->IDGrado ?>"><?= $grado->Descripcion ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="row mt-2">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="text-center">
                <h6>Sección</h6>
            </div>
            <div class="form-group">
                <select name="ins_seccion" id="ins_seccion" class="form-control"></select>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="row mt-2">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-success" id="cargar">Aceptar</button>
            <a class="btn btn-outline-success" href="<?php echo site_url('MatriculasController'); ?>" role="button">Regresar</a>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NIE</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
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
    $("#ins_grado").on('change', function() {
        let id = $(this).val();

        if (id == "") {

            $('#ins_seccion').html("");
        } else {
            cargarSeccionesGrado(id);
        }
    });

    const cargarSeccionesGrado = (id) => {
        $.ajax({
            url: "<?php echo base_url(); ?>cargarSeccionesGrado",
            type: "post",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {
                var sOption = "";
                for (var key in data) {
                    sOption += `<option value="${data[key]["IDSeccion"]}">${data[key]["Descripcion"]}</option>`;
                }

                $("#ins_seccion").html(sOption);
            },
        });
    }

    const fetch = (idGrado, idSeccion) => {
        $.ajax({
            url: "<?php echo base_url(); ?>cargarMatriculas",
            type: "post",
            dataType: "json",
            data: {
                idGrado: idGrado,
                idSeccion: idSeccion
            },
            success: function(data) {
                var tbody = "";
                for (var key in data) {
                    tbody += "<tr>";
                    tbody += "<td>" + data[key]["IDMatricula"] + "</td>";
                    tbody += "<td>" + data[key]["NIE"] + "</td>";
                    tbody += "<td>" + data[key]["Apellidos"] + "</td>";
                    tbody += "<td>" + data[key]["Nombres"] + "</td>";
                    tbody += `<td>
                                    <a href="#" id="del" value="${data[key]["IDMatricula"]}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                </td>`;
                    tbody += "<tr>";
                }

                $("#tbody").html(tbody);
            },
        });
    }

    $(document).on("click", "#cargar", function(e) {
        let idGrado = $("[name=ins_grado]").val();
        let idSeccion = $("[name=ins_seccion]").val();

        if (idGrado == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '¡Debe seleccionar un grado!',
            })
        } else {
            fetch(idGrado, idSeccion);
        }

    });

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
                    text: "¿Desea retirar la matricula del estudiante seleccionado?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Aceptar",
                    cancelButtonText: "Cancelar",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>eliminarMatricula",
                            type: "post",
                            dataType: "json",
                            data: {
                                del_id: del_id,
                            },
                            success: function(data) {
                                let idGrado = $("[name=ins_grado]").val();
                                let idSeccion = $("[name=ins_seccion]").val();
                                fetch(idGrado, idSeccion);
                                if (data.response === "success") {

                                    swalWithBootstrapButtons.fire(
                                        "Aviso",
                                        "¡Matricula retirada correctamente!",
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


</script>