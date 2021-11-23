<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Notas</h1>
            <hr style="background-color: black; color: black; height: 1px;">
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
            <div class="text-center">
                <h6>Periodo</h6>
            </div>
            <div class="form-group">
                <select name="ins_periodo" id="ins_periodo" class="form-control"></select>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="text-center">
                <h6>Materia</h6>
            </div>
            <div class="form-group">
                <select name="ins_materia" id="ins_materia" class="form-control"></select>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="text-center">
                <h6>Fecha</h6>
            </div>
            <div class="form-group">
                <input id="ins_fecha" class="form-control" type="date" name="ins_fecha">
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <button class="btn btn-outline-success" type="button" onclick="fetch()">Aceptar</button>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="row mt-2">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NIE</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>Nota</th>
                        <th style="display:none;">IDNota</th>
                        <th style="display:none;">IDEstudiante</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>

            <button class="btn btn-warning" type="button" onclick="insertarNotas()">Guadar</button>
        </div>
    </div>
</div>

<script>
    //Cargar secciones segun el grado seleccionado
    $("#ins_grado").on('change', function() {
        let id = $(this).val();

        if (id == "") {

            $('#ins_seccion').html("");
            $('#ins_materia').html("");
        } else {
            cargarSeccionesGrado(id);
            cargarMaterias(id);
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

    const cargarPeriodos = () => {
        $.ajax({
            url: "<?php echo base_url(); ?>cargarPeriodos",
            type: "get",
            dataType: "json",
            success: function(data) {
                var sOption = "";
                sOption += `<option value=""></option>`;
                for (var key in data) {
                    sOption += `<option value="${data[key]["IDPeriodo"]}">${data[key]["Periodo"]}</option>`;
                }

                $("#ins_periodo").html(sOption);
            },
        });
    }

    const cargarMaterias = (id) => {
        $.ajax({
            url: "<?php echo base_url(); ?>cargarMateriasGrado",
            type: "post",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {
                var sOption = "";
                sOption += `<option value=""></option>`;
                for (var key in data) {
                    sOption += `<option value="${data[key]["IDMateria"]}">${data[key]["Nombre"]}</option>`;
                }

                $("#ins_materia").html(sOption);
            },
        });
    }

    function fetch() {
        let idMateria = $('#ins_materia').val();
        let idPeriodo = $('#ins_periodo').val();
        let idGrado = $('#ins_grado').val();
        let idSeccion = $('#ins_seccion').val();
        let res = 0;

        if (idGrado == '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '¡Debe selecciona un grado!',
            })
            res += 1;
        }

        if (idPeriodo == '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '¡Debe selecciona un periodo!',
            })
            res += 1;
        }

        if (idMateria == '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '¡Debe selecciona una materia!',
            })
            res += 1;
        }

        if (res == 0) {
            $.ajax({
                url: "<?php echo base_url(); ?>cargarNotas",
                type: "post",
                dataType: "json",
                data: {
                    idMateria: idMateria,
                    idPeriodo: idPeriodo,
                    idGrado: idGrado,
                    idSeccion: idSeccion
                },
                success: function(data) {
                    var tbody = "";
                    for (var key in data) {
                        tbody += "<tr>";
                        tbody += "<td>" + data[key]["NIE"] + "</td>";
                        tbody += "<td>" + data[key]["Apellidos"] + "</td>";
                        tbody += "<td>" + data[key]["Nombres"] + "</td>";

                        if (data[key]["Nota"] === null) {
                            tbody += "<td>" + "<input type='text' name='notas' style='width:150px;margin:0 auto;float:note;' class='form-control' value=''>" + "</td>";
                        } else {
                            tbody += "<td>" + "<input type='text' name='notas' style='width:150px;margin:0 auto;float:note;' class='form-control' value='" + data[key]["Nota"] + "'>" + "</td>";
                        }

                        if (data[key]["IDNota"] === null) {

                            tbody += "<td style='display:none;'>" + "<input type='hidden' name='id' value='-1'>" + "</td>";
                        } else {

                            tbody += "<td style='display:none;'>" + "<input type='hidden' name='id' value='" + data[key]["IDNota"] + "'>" + "</td>";
                        }

                        tbody += "<td style='display:none;'>" + "<input type='hidden' name='estudiantes' value='" + data[key]["IDEstudiante"] + "'>" + "</td>";
                    }

                    $("#tbody").html(tbody);
                },
            });
        }

    }

    const insertarNotas = () => {

        //Array donde se almacenaran todas las notas
        let notas = [];

        //obteniendo todas los valores de los input que tengan como nombre "notas" y guardando en el array
        $("input[name='notas']").each(function() {
            notas.push($(this).val());
        });

        let estudiantes = [];
        $("input[name='estudiantes']").each(function() {
            estudiantes.push($(this).val());
        });

        let id = [];
        $("input[name='id']").each(function() {
            id.push($(this).val());
        });

        let ins_fecha = $('[name=ins_fecha]').val();
        let ins_materia = $('[name=ins_materia]').val();
        let ins_periodo = $('[name=ins_periodo]').val();

        //Convirtiendo el array en un JSON para enviar al controlador
        let notas_ = JSON.stringify(notas);
        let estudiantes_ = JSON.stringify(estudiantes);
        let id_ = JSON.stringify(id);

        $.ajax({
            url: "<?php echo base_url(); ?>guardarNotas",
            type: "post",
            dataType: "json",
            data: {
                notas_: notas_,
                estudiantes_: estudiantes_,
                id_: id_,
                ins_fecha: ins_fecha,
                ins_materia: ins_materia,
                ins_periodo: ins_periodo
            },
            success: function(data) {
                if (data.response == "success") {
                    fetch();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
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
    }

    (() => { //ejecutar a cargar pagina

        cargarPeriodos();

    })();
</script>