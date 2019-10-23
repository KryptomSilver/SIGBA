//menu pegajoso scroll
$(document).ready(function () {
  var altura = $('.menu').offset().top;

  listar();

  $(window).on('scroll', function () {
    if ($(window).scrollTop() > altura) {
      $('.menu').addClass('menu-pegajoso');
    } else {
      $('.menu').removeClass('menu-pegajoso');
    }
  });



  // ajax 
  $('#formulario').submit(e => {
    e.preventDefault();
    const postData = {
      name: $('#nombre').val()
    };
    const url = 'procesos/ajax_agregar_articulo.php';
    console.log(postData, url);
    $.post(url, postData, (response) => {
      $('#formulario').trigger('reset');
      listar();
      if (response == 'Articulo Registrado') {
        alert_success(response);
        listar();
      } else {
        alert_warning(response);
        listar();
      }

    });
  });
  //ajax actualizar 
  $('#form').submit(e => {
    e.preventDefault();
    const postData = {
      name: $('#name').val(),
      id: $('#id').val()
    };
    const url = 'procesos/ajax_editar_articulo.php';
    console.log(postData, url);
    $.post(url, postData, (response) => {
      $('#form').trigger('reset');
      if (response == 'Articulo Actualizado') {
        $('#editar').modal('hide');
        alert_success(response);
      } else {
        alert_warning(response);
      }

    });
  });
  $('#formdelete').submit(e => {
    e.preventDefault();
    var id = $('#formdelete #iddelete').val();
    console.log(id);
    const postData = {
      id: $('#iddelete').val()
    };
    const url = 'procesos/ajax_eliminar_articulo.php';
    console.log(postData, url);
    $.post(url, postData, (response) => {
      if (response == 'Articulo Eliminado') {
        listar();
        $('#delete').modal('hide');
        alert_success(response);
      } else {
        alert_warning(response);
      }
    });
  });


});

var alert_success = function (msg) {
  var respuesta = msg
  Swal.fire({
    type: 'success',
    title: respuesta,
    showConfirmButton: false,
    timer: 800
  })
}
var alert_warning = function (msg) {
  var respuesta = msg
  Swal.fire({
    type: 'warning',
    title: respuesta,
    showConfirmButton: false,
    timer: 800
  })
}
var listar = function () {
  var table = $('#articulos').DataTable({
    "destroy": true,
    "ajax": {
      "method": "POST",
      "url": "procesos/ajax_listar_articulos.php"
    },
    "columns": [{
        "data": "id"
      },
      {
        "data": "nombre"
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
  edit_data("#articulos tbody", table);
  delete_data("#articulos tbody", table);
}
var edit_data = function (tbody, table) {
  $(tbody).off("click", "a.editar");
  $(tbody).on("click", "a.editar", function () {
    var data = table.row($(this).parents("tr")).data();
    var idarticulo = $("#form #id").val(data.id);
    var nombre = $("#form #name").val(data.nombre);
  });
}
var delete_data = function (tbody, table) {
  $(tbody).off('click', 'a.eliminar');
  $(tbody).on("click", "a.eliminar", function () {
    var data = table.row($(this).parents("tr")).data();
    var idarticulo = $("#formdelete #iddelete").val(data.id);
  });
}