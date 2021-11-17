<div class="container">
    <div class="row">
        <!-- IDGrado -->
        <div class="form-group">
            <label for="">Grado</label>
            <select name="ins_grado" id="grados" class="form-control">
                <option value=""></option>
                <?php foreach ($grados as $grado) { ?>
                    <option value="<?= $grado->IDGrado ?>"><?= $grado->Descripcion ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label for="">Secciones</label>
            <select name="ins_seccion" id="secciones" class="form-control"></select>
        </div>
    </div>
</div>

<script>
    //Cargar secciones segun el grado seleccionado
    $("#grados").on('change', function() {
        let id = $(this).val();

        if (id == "") {

            $('#secciones').html("");
        } else {
            cargarSeccionesGrado(id);
        }
    });

    const cargarSeccionesGrado = (id) => {
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
</script>