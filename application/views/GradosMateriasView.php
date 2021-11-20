<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center"><i class="fa fa-book mr-3"></i>Materias por grado</h1>
            <hr style="background-color: black; color: black; height: 1px;">
        </div>
    </div>
    <div class="row">

        <div class="col-md-4"></div>

        <div class="col-md-4">
            <div class="text-center">
                <h5>Grado</h5>
            </div>
            <select name="ins_grado" class="form-control" id="grados">
                <option value=""></option>
                <?php foreach ($grados as $grado) { ?>
                    <option value="<?= $grado->IDGrado ?>"><?= $grado->Descripcion ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-4"></div>
    </div>
    <div class="row mt-3">
        <div class="col text-center">
            <button type="button" id="agregarMaterias" class="btn btn-outline-warning" data-toggle="modal">Agregar Materia</button>
        </div>

        <div class="modal fade" id="SeleccionarMateria" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="staticBackdropLabel">Seleccionar Materia</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <th>Id</th>
                                <th>Materia</th>
                                <th class="text-center" colspan="3">Acción</th>
                            </thead>
                            <tbody id="tbodyMaterias">
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

    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Materia</th>
                            <th>Descripción</th>
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
    //Cargar materias cuando cambie el option del select
    $("#grados").on('change', function() {
        let id = $(this).val();

        if (id == "") {
            $('#tbody').html("");
        } else {
            cargarMateriasGrado(id);
        }
    });

    //Cargar materias al hacer clic en agregar
    $(document).on("click", "#agregarMaterias", function(e) {
        e.preventDefault();

        let id = $("[name=ins_grado]").val();

        if (id == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '¡Debe selecciona un grado!',
            })
        } else {
            $("#SeleccionarMateria").modal("show");
            cargarMaterias(id);
        }
    });

    //Cargar materias por grado
    function cargarMateriasGrado(id) {
        $.ajax({
            url: "<?php echo base_url(); ?>cargarMateriasGrado",
            type: "post",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {
                var tbody = "";
                for (var key in data) {
                    tbody += "<tr>";
                    tbody += "<td>" + data[key]["IDGrado_Materia"] + "</td>";
                    tbody += "<td>" + data[key]["Nombre"] + "</td>";
                    tbody += "<td>" + data[key]["Descripcion"] + "</td>";
                    tbody += `<td class="tex-center">
                                    <a href="#" id="del" value="${data[key]["IDGrado_Materia"]}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                </td>`;
                    tbody += "<tr>";
                }

                $("#tbody").html(tbody);
            },
        });
    }

    //Cargar materias 
    const cargarMaterias = (id) => {

        $.get({
            url: 'cargarMaterias',
            dataType: "json",
            success: function(result) {
                let lista = "";
                result.forEach(materia => {
                    lista += `
                    <tr>
                        <td>${materia.IDMateria}</td>
                        <td>${materia.Nombre}</td>
                        <td>
                        <td>
                            <button class="btn btn-primary" onclick="GuardarMateriaGrado('${materia.IDMateria}','${id}');" >Seleccionar</button>                                                                                   
                        </td>
                    </tr>`;
                });
                $('#tbodyMaterias').html(lista);
            }
        });
    }

    const GuardarMateriaGrado = (idMateria, idGrado) => {
        $.post({
            url: 'agregarMateriaGrado',
            dataType: "json",
            data: {
                idGrado: idGrado,
                idMateria: idMateria
            },
            success: function(data) {
                if (data.response == "success") {
                    $('#SeleccionarMateria').modal('hide');

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '¡Registro agregado con exito!',
                        showConfirmButton: false,
                        timer: 1500
                    });


                    cargarMateriasGrado(idGrado);
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Advertencia',
                        text: '¡No ha agregado ninguna materia!',
                    })
                }
            },
        });
    }

    //Eliminar materia
    $(document).on("click", "#del", function(e) {
        e.preventDefault();

        let del_id = $(this).attr("value");

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
                            url: "<?php echo base_url(); ?>eliminarMateriaGrado",
                            type: "post",
                            dataType: "json",
                            data: {
                                del_id: del_id,
                            },
                            success: function(data) {
                                let id = $("[name=ins_grado]").val();
                                cargarMateriasGrado(id);
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
</script>