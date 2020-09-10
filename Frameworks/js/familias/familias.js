//menu pegajoso scroll
$(document).ready(function () {
  //var altura = $('.menu').offset().top;
  //console.log(altura);
  listar();

  //$(window).on('scroll', function () {
  //if ($(window).scrollTop() <= altura) {
  // $('.menu').removeClass('menu-pegajoso');

  // } else {

  //$('.menu').addClass('menu-pegajoso');
  //  }
  // });
  $('#formdelete').submit(e => {
    e.preventDefault();
    var id = $('#formdelete #iddelete').val();
    console.log(id);
    const postData = {
      id: $('#iddelete').val()
    };
    const url = 'procesos/familias/familias_delete.php';
    console.log(postData, url);
    $.post(url, postData, (response) => {
      if (response == 'Familia Eliminada') {
        listar();
        $('#delete').modal('hide');
        alert_success(response);
      } else {
        alert_warning(response);
      }
    });
  });
});



var listar = function () {
  var table = $('#familias').DataTable({
    "destroy": true,
    "ajax": {
      "method": "POST",
      "url": "procesos/familias/familias_listar.php"
    },
    "columns": [{
        "data": "id"
      },
      {
        "data": "calle"
      },
      {
        "data": "municipio"
      },
      {
        "data": "colonia"
      },
      {
        "data": "integrantes"
      },
      {
        "data": "telefono"
      },
      {
        "data": "ingresototal"
      },
      {
        "defaultContent": "<a  class='eliminar'data-toggle='modal' data-target='#delete'><img src='../img/eliminar.ico' width='30' height='30'class='d-inline-block align-top'></a><a  data-toggle='modal'class='editar'data-target='#editar' ><img src='../img/editar.ico' width='30' height='30'class=d-inline-block align-top'></a>"
      }
    ],
    "language": {
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      },
      "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
      }
    }
  });
  edit_data("#familias tbody", table);
  delete_data("#familias tbody", table);
}
var edit_data = function (tbody, table) {
  $(tbody).off("click", "a.editar");
  $(tbody).on("click", "a.editar", function () {
    var data = table.row($(this).parents("tr")).data();
    var idfamilia = data.id;
    window.location.href = '../catalogos/familiasupdate.php?idfamilia=' + idfamilia;
  });
}
var delete_data = function (tbody, table) {
  $(tbody).off('click', 'a.eliminar');
  $(tbody).on("click", "a.eliminar", function () {
    var data = table.row($(this).parents("tr")).data();
    console.log(data.id);
    var idarticulo = $("#formdelete #iddelete").val(data.id);
  });
}
var alert_success = function (msg) {
  var respuesta = msg
  Swal.fire({
    type: 'success',
    title: respuesta,
    showConfirmButton: false,
    timer: 1000
  })
}



//alerta
var alert_warning = function (msg) {
  var respuesta = msg
  Swal.fire({
    type: 'warning',
    title: respuesta,
    showConfirmButton: false,
    timer: 800
  })
}