<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center"><i class="fa fa-users mr-3"></i>Empleados</h1>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 mt-2">

      <!-- Modal para agregar -->
      <!-- Large modal -->
      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar</button>

      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_add">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">Agregar Empleado</h5>
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
                      <label for="nombres">Nombres</label>
                      <input type="text" name="ins_nombres" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Apellidos -->
                    <div class="form-group">
                      <label for="apellidos">Apelidos</label>
                      <input type="text" name="ins_apellidos" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <!-- Fecha de nacimiento -->
                    <div class="form-group">
                      <label for="fechanac">Fecha de nacimiento</label>
                      <input type="date" name="ins_fecha" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Sexo -->
                    <label for="sexo">Sexo</label>
                    <select name="ins_sexo" class="form-control">
                      <option value=""></option>
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <!-- Telefono -->
                    <div class="form-group">
                      <label for="telefono">Telefono</label>
                      <input type="text" name="ins_telefono" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="dui">DUI</label>
                      <input type="text" name="ins_dui" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <!-- NIT -->
                    <div class="form-group">
                      <label for="nit">NIT</label>
                      <input type="text" name="ins_nit" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Titulo -->
                    <div class="form-group">
                      <label for="titulo">Titulo</label>
                      <input type="text" name="ins_titulo" class="form-control">
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
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">Actualizar Empleado</h5>
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
                      <label for="nombres">Nombres</label>
                      <input type="text" name="edit_nombres" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Apellidos -->
                    <div class="form-group">
                      <label for="apellidos">Apelidos</label>
                      <input type="text" name="edit_apellidos" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <!-- Fecha de nacimiento -->
                    <div class="form-group">
                      <label for="fechanac">Fecha de nacimiento</label>
                      <input type="date" name="edit_fecha" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Sexo -->
                    <label for="sexo">Sexo</label>
                    <select name="edit_sexo" class="form-control">
                      <option value=""></option>
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <!-- Telefono -->
                    <div class="form-group">
                      <label for="telefono">Telefono</label>
                      <input type="text" name="edit_telefono" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="dui">DUI</label>
                      <input type="text" name="edit_dui" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <!-- NIT -->
                    <div class="form-group">
                      <label for="nit">NIT</label>
                      <input type="text" name="edit_nit" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Titulo -->
                    <div class="form-group">
                      <label for="titulo">Titulo</label>
                      <input type="text" name="edit_titulo" class="form-control">
                    </div>
                  </div>
                </div>

              </form>
            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="update">Actualizar</button>
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
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Fecha de nacimiento</th>
            <th>Sexo</th>
            <th>Telfono</th>
            <th>DUI</th>
            <th>NIT</th>
            <th>Título</th>
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

    var ins_nombres = $("[name=ins_nombres]").val();
    var ins_apellidos = $("[name=ins_apellidos]").val();
    var ins_fecha = $("[name=ins_fecha]").val();
    var ins_sexo = $("[name=ins_sexo]").val();
    var ins_telefono = $("[name=ins_telefono]").val();
    var ins_dui = $("[name=ins_dui]").val();
    var ins_nit = $("[name=ins_nit]").val();
    var ins_titulo = $("[name=ins_titulo]").val();

    $.ajax({
      url: "<?php echo base_url(); ?>agregarEmpleado",
      type: "post",
      dataType: "json",
      data: {
        ins_nombres: ins_nombres,
        ins_apellidos: ins_apellidos,
        ins_fecha: ins_fecha,
        ins_sexo: ins_sexo,
        ins_telefono: ins_telefono,
        ins_dui: ins_dui,
        ins_nit: ins_nit,
        ins_titulo: ins_titulo,
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
      url: "<?php echo base_url(); ?>cargarEmpleados",
      type: "get",
      dataType: "json",
      success: function(data) {
        var tbody = "";
        for (var key in data) {
          tbody += "<tr>";
          tbody += "<td>" + data[key]["IDEmpleado"] + "</td>";
          tbody += "<td>" + data[key]["Nombres"] + "</td>";
          tbody += "<td>" + data[key]["Apellidos"] + "</td>";
          tbody += "<td>" + data[key]["FechaNacimiento"] + "</td>";
          tbody += "<td>" + data[key]["Sexo"] + "</td>";
          tbody += "<td>" + data[key]["Telefono"] + "</td>";
          tbody += "<td>" + data[key]["DUI"] + "</td>";
          tbody += "<td>" + data[key]["NIT"] + "</td>";
          tbody += "<td>" + data[key]["Titulo"] + "</td>";
          tbody += `<td>
                                    <a href="#" id="del" value="${data[key]["IDEmpleado"]}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                    <a href="#" id="edit" value="${data[key]["IDEmpleado"]}" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
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
              url: "<?php echo base_url(); ?>eliminarEmpleado",
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
        url: "<?php echo base_url(); ?>editarEmpleado",
        type: "post",
        dataType: "json",
        data: {
          edit_id: edit_id,
        },
        success: function(data) {
          if (data.response === "success") {
            $("#modal_edit").modal("show");
            $("[name=edit_id]").val(data.post.IDEmpleado);
            $("[name=edit_nombres]").val(data.post.Nombres);
            $("[name=edit_apellidos]").val(data.post.Apellidos);
            $("[name=edit_fecha]").val(data.post.FechaNacimiento);
            $("[name=edit_sexo]").val(data.post.Sexo);
            $("[name=edit_telefono]").val(data.post.Telefono);
            $("[name=edit_dui]").val(data.post.DUI);
            $("[name=edit_nit]").val(data.post.NIT);
            $("[name=edit_titulo]").val(data.post.Titulo);
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
    var edit_telefono = $("[name=edit_telefono]").val();
    var edit_dui = $("[name=edit_dui]").val();
    var edit_nit = $("[name=edit_nit]").val();
    var edit_titulo = $("[name=edit_titulo]").val();

    $.ajax({
      url: "<?php echo base_url(); ?>actualizarEmpleado",
      type: "post",
      dataType: "json",
      data: {
        edit_id: edit_id,
        edit_nombres: edit_nombres,
        edit_apellidos: edit_apellidos,
        edit_fecha: edit_fecha,
        edit_sexo: edit_sexo,
        edit_telefono: edit_telefono,
        edit_dui: edit_dui,
        edit_nit: edit_nit,
        edit_titulo: edit_titulo,
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
    $("#form_edit")[0].reset();
  });
</script>