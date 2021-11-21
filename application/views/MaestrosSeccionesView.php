<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Maestros encargados de sección</h1>
            <hr style="background-color: black; color: black; height: 1px;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-2">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_add">
                Agregar
            </button>

            <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Asignar sección a maestro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="form_add">

                                <div class="form-group">
                                    <label for="my-input">Grado</label>
                                    <select name="ins_grado" id="ins_grado" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($grados as $grado) { ?>
                                            <option value="<?= $grado->IDGrado ?>"><?= $grado->Descripcion ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Sección</label>
                                    <select name="ins_seccion" id="ins_seccion" class="form-control"></select>
                                </div>

                                <div class="form-group">
                                    <label for="">Maestro</label>
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" name="ins_maestro" id="ins_maestro" required>
                                        <input type="text" class="form-control" name="nomMaestro" id="nomMaestro" placeholder="Ninguno selecionado" required readonly>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SeleccionarMaestro">
                                            Seleccionar
                                        </button>
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
        </div>


        <!-- Modal para agregar Maestro -->
        <div class="modal fade" id="SeleccionarMaestro" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="staticBackdropLabel">Seleccionar Maestro</h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Maestro</th>
                                    <th>Título</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody id="tbodyMaestros">
                                </tbody>
                            </table>
                        </div>
                        <center>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </center>
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
                            <th>Maestro</th>
                            <th>Grado</th>
                            <th>Sección</th>
                            <th>Turno</th>
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
    function fetch() {
        $.ajax({
            url: "<?php echo base_url(); ?>cargarMaestrosSecciones",
            type: "get",
            dataType: "json",
            success: function(data) {
                var tbody = "";
                for (var key in data) {
                    tbody += "<tr>";
                    tbody += "<td>" + data[key]["IDMaestro_Seccion"] + "</td>";
                    tbody += "<td>" + data[key]["Maestro"] + "</td>";
                    tbody += "<td>" + data[key]["Grado"] + "</td>";
                    tbody += "<td>" + data[key]["Seccion"] + "</td>";
                    tbody += "<td>" + data[key]["Turno"] + "</td>";
                    tbody += `<td>
                                    <a href="#" id="del" value="${data[key]["IDMaestro_Seccion"]}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                </td>`;
                    tbody += "<tr>";
                }

                $("#tbody").html(tbody);
            },
        });
    }

    fetch();

    const limpiarModal = () => {
        $("#ins_idMaestro").val('');
        $('#form_add').trigger("reset");
    }

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
                            url: "<?php echo base_url(); ?>eliminarMaestroSeccion",
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

    const insertar = () => {
        let datosFormulario = $("#form_add").serialize();
        $.post({
            url: 'agregarMaestroSeccion',
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

                    fetch();
                } else {
                    toastr["error"](data.message);
                }
            },
        });
    }

    const cargarMaestros = () => {
        $.get({
            url: 'cargarMaestros',
            dataType: "json",
            success: function(result) {
                let lista = "";
                result.forEach(maestro => {
                    lista += `
                    <tr>
                        <td>${maestro.IDMaestro}</td>
                        <td>${maestro.Maestro}</td>                                               
                        <td>${maestro.Titulo}</td>                                                                                 
                        <td>
                            <button class="btn btn-primary" onclick="seleccionarMaestro('${maestro.IDMaestro}','${maestro.Maestro}');" >Seleccionar</button>                                                                                   
                        </td>
                    </tr>`;
                });
                $('#tbodyMaestros').html(lista);
            }
        });
    }

    const seleccionarMaestro = (id, maestro) => {
        $('#ins_maestro').val(id);
        $('#nomMaestro').val(maestro);
        $('#SeleccionarMaestro').modal('toggle');
    }

    (() => { //ejecutar a cargar pagina
        cargarMaestros();
    })();
</script>