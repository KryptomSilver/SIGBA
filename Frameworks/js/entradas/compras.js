$("#formulario").submit((e) => {
  AgregarCompra();
});

$("#formulario2").submit((e) => {
  AgregarDetalleCompra();
  $("#formulario2").trigger("reset");
});

function cargar(id) {
  $("#tab").load("procesos/compras/compras_listar.php?id=" + id);
  if ($("#id").val() != "") {
    cambiarboton();
  }
}

function deshabilitar() {
  $("#donador").attr("disabled", true);
  $("#factura").attr("disabled", true);
  $("#fecha").attr("disabled", true);
  $("#tpago").attr("disabled", true);
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

function AgregarCompra() {
  var id_donador = $("#donador").val();
  var fecha = $("#fecha").val();
  var factura = $("#factura").val();
  var tpago = $("#tpago").val();

  var datos =
    "id=" +
    id_donador +
    "&fecha=" +
    fecha +
    "&factura=" +
    factura +
    "&tpago=" +
    tpago;
  console.log(datos);

  $.ajax({
    type: "POST",
    url: "procesos/compras/compras_add.php",
    data: datos,
    success: function (r) {
      cambiarboton();
      deshabilitar();
      alert_success();
      $("#id").val(r);
    },
  });
}

function TerminarCompra() {
  var id_donador = $("#id").val();
  var datos = "id=" + id_donador;

  $.ajax({
    type: "POST",
    url: "procesos/compras/compras_finish.php",
    data: datos,
    success: function () {
      location.href = "compras.php";
    },
  });
}

function AgregarDetalleCompra() {
  var id_donador = $("#id").val();
  var articulo = $("#producto").val();
  var cantidad = $("#cantidad").val();
  var precioc = $("#precioc").val();
  var preciov = $("#preciov").val();

  var datos =
    "id=" +
    id_donador +
    "&articulo=" +
    articulo +
    "&cantidad=" +
    cantidad +
    "&precioc=" +
    precioc +
    "&preciov=" +
    preciov;
  console.log(datos);

  $.ajax({
    type: "POST",
    url: "procesos/compras/compras_adddetalle.php",
    data: datos,
    success: function (r) {
      cargar(id_donador);
      $("#total").val(r);
      alert_success();
    },
  });
}

function EliminarCompra() {
  var id = $("#id").val();
  var datos = "id=" + id;
  $.ajax({
    type: "POST",
    url: "procesos/compras/compras_delete.php",
    data: datos,
    success: function () {
      $("#id").val("");
      location.href = "compras.php";
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
      var datos = "idp=" + idp + "&id=" + id;
      $.ajax({
        type: "POST",
        url: "procesos/compras/detallecompras_delete.php",
        data: datos,
        success: function (r) {
          Swal.fire("Eliminado correctamente", "", "success");
          $("#total").val(r);
          cargar(id);
        },
      });
    }
  });
}
