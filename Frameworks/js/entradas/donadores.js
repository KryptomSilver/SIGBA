$("#formulario").submit((e) => {
  AgregarDonacion();
});

$("#formulario2").submit((e) => {
  AgregarDetalleDonacion();
  $("#formulario2").trigger("reset");
});

function cargar(id) {
  $("#tab").load("procesos/donaciones/donaciones_listar.php?id=" + id);
  if ($("#id").val() != "") {
    cambiarboton();
  }
}

function deshabilitar() {
  $("#donador").attr("disabled", true);
  $("#fecha").attr("disabled", true);
  $("#btnfinalizar").attr("disabled", false);
  $("#btncrear").attr("disabled", true);
}

function cambiarboton() {
  $("#panelagregar").attr("hidden", false);
  $("#btncrear").attr("hidden", true);
  $("#btnborrar").attr("hidden", false);
}

function limpiarCampos() {
  $("#cantidad").val("");
  $("#caducidad").val("");
  $("#precioc").val("");
  $("#preciov").val("");
}

function AgregarDonacion() {
  var id_donador = $("#donador").val();
  var fecha = $("#fecha").val();

  var datos = "id=" + id_donador + "&fecha=" + fecha;
  console.log(datos);

  $.ajax({
    type: "POST",
    url: "procesos/donaciones/donaciones_add.php",
    data: datos,
    success: function (r) {
      cambiarboton();
      deshabilitar();
      $("#id").val(r);
    },
  });
}

function TerminarDonacion() {
  var id_donador = $("#id").val();
  var datos = "id=" + id_donador;

  $.ajax({
    type: "POST",
    url: "procesos/donaciones/donacion_finish.php",
    data: datos,
    success: function () {
      location.href = "donaciones.php";
    },
  });
}

function AgregarDetalleDonacion() {
  var id_donador = $("#id").val();
  var articulo = $("#producto").val();
  var cantidad = $("#cantidad").val();
  var caducidad = $("#caducidad").val();
  var precio = $("#precioc").val();

  var datos =
    "id=" +
    id_donador +
    "&articulo=" +
    articulo +
    "&cantidad=" +
    cantidad +
    "&caducidad=" +
    caducidad +
    "&precio=" +
    precio;
  console.log(datos);

  $.ajax({
    type: "POST",
    url: "procesos/donaciones/donaciones_adddetalle.php",
    data: datos,
    success: function (r) {
      cargar(id_donador);
      alert_success();
    },
  });
}

function EliminarDonacion() {
  var id = $("#id").val();
  var datos = "id=" + id;
  $.ajax({
    type: "POST",
    url: "procesos/donaciones/donaciones_delete.php",
    data: datos,
    success: function () {
      $("#id").val("");
      location.href = "donaciones.php";
    },
  });
}

function EliminarArticulo(idp) {
  var id = $("#id").val();
  Swal.fire({
    title: "Aviso",
    text: "Está seguro que desea eliminarlo",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.value) {
      var id_donador = $("#id").val();
      var datos = "idp=" + idp;
      $.ajax({
        type: "POST",
        url: "procesos/donaciones/detalledonacion_delete.php",
        data: datos,
        success: function (r) {
          Swal.fire("Eliminado correctamente", "", "success");
          console.log(id + " " + idp);
          cargar(id);
        },
      });
    }
  });
}
