<div class="container">
    <form action="" method="POST" id="form_add">
        <div class="row mt-4">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <!-- IDGrado -->
                <div class="form-group">
                    <label for="">Grado</label>
                    <select name="ins_grados" id="ins_grados" class="form-control">
                        <option value=""></option>
                        <?php foreach ($grados as $grado) { ?>
                            <option value="<?= $grado->IDGrado ?>"><?= $grado->Descripcion ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Secciones</label>
                    <select name="ins_secciones" id="ins_secciones" class="form-control"></select>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <!-- Buscar -->
                <div class="form-group">
                    <label for="">Estudiante</label>
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="ins_idEstudiante" id="ins_idEstudiante" required>
                        <input type="text" class="form-control mr-1" name="nomEstudiante" id="nomEstudiante" placeholder="Ninguno selecionado" required readonly>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#SeleccionarEstudiante">
                            Seleccionar
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Fecha</label>
                    <input id="ins_fecha" class="form-control" type="date" name="ins_fecha">
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <input type="button" class="btn btn-primary" value="Matricular" onclick="insert()">
                <a class="btn btn-primary" href="<?php echo site_url('MatriculasController'); ?>" role="button">Regresar</a>
            </div>
            <div class="col-md-4"></div>
        </div>
    </form>

    <!-- Modal para seleccionar el estudiante -->
    <div class="modal fade" id="SeleccionarEstudiante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buscar Estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Buscar</label>
                        <div class="input-group">
                            <input type="text" name="search_text" id="search_text" placeholder="Escriba el estudiante a buscar" class="form-control" />
                        </div>
                    </div>
                    <div id="result"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    //Cargar secciones segun el grado seleccionado
    $("#ins_grados").on('change', function() {
        let id = $(this).val();

        if (id == "") {

            $('#ins_secciones').html("");
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

                $("#ins_secciones").html(sOption);
            },
        });
    }

    // Buscar
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>cargarEstudiantesBuscar",
                method: "post",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            })
        }

        $('#search_text').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });

    const nombreEstudiantePorId = (id) => {
        let nombre;
        $.get({
            url: "<?php echo base_url(); ?>cargarEstudiante",
            async: false,
            dataType: "json",
            data: {
                id: id
            },
            success: function(estudiante) {
                nombre = estudiante.Nombres + ' ' + estudiante.Apellidos;
            }
        });
        return nombre;
    }

    const seleccionarEstudiante = (id) => {
        $('#ins_idEstudiante').val(id);
        $('#nomEstudiante').val(nombreEstudiantePorId(id));
        $('#SeleccionarEstudiante').modal('hide');
    }

    const insert = () => {
        let datosFormulario = $("#form_add").serialize();

        $.post({
            url: "<?php echo base_url(); ?>guardarMatricula",
            dataType: "json",
            data: datosFormulario,
            success: function(data) {
                if (data.response == "success") {
                    //hacer algo aquí de reenvio
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '¡Matricula realizada con exito!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    toastr["error"](data.message);
                }
            },
        });

        $("#ins_idEstudiante").val('');
        $("#ins_secciones").html("");
        $('#form_add').trigger("reset");
        // location.replace("<?php echo base_url(); ?>PageController");
    }
</script>