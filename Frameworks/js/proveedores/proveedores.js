//menu pegajoso scroll
$(document).ready(function () {
    var altura = $('.menu').offset().top;

    listar();
    $(window).on('scroll', function () {
        console.log(altura);
        if ($(window).scrollTop() > altura) {
            $('.menu').addClass('menu-pegajoso');
        } else {
            $('.menu').removeClass('menu-pegajoso');
        }
    });
    //ELIMINAR PROVEEDOR
    $('#formdelete').submit(e => {
        e.preventDefault();
        var id = $('#formdelete #iddelete').val();
        console.log(id);
        const postData = {
            id: $('#formdelete #iddelete').val()
        };
        const url = 'procesos/proveedor/proveedor_delete.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            if (response == 'PROVEEDOR ELIMINADO') {
                listar();
                $('#delete').modal('hide');
                alert_success(response);
            } else {
                alert_warning(response);
            }
        });
    });


});
// alerta 
var alert_success = function (msg) {
    var respuesta = msg
    Swal.fire({
        type: 'success',
        title: respuesta,
        showConfirmButton: false,
        timer: 800
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
// LISTAR PROVEEDORES
var listar = function () {
    var table = $('#proveedores').DataTable({
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "procesos/proveedor/proveedor_listar.php"
        },
        "columnDefs": [{
             //"width": "82px", "targets": 7 
        }],
        "columns": [{
                "data": "idpersona"
            },
            {
                "data": "rfc"
            },
            {
                "data": "razon_Social"
            },
            {
                "data": "nombre_Contacto"
            },
            {
                "data": "telefono"
            },
            {
                "data": "celular"
            },
            {
                "data": "colonia"
            },
            {
                "defaultContent": "<div class='btn-group' role='group' aria-label='Basic example'><a  class='eliminar ' style='cursor: pointer;'data-toggle='modal' data-target='#delete'><img src='../img/eliminar.ico' width='30' height='30'class='d-inline-block align-top'></a><a id='editar'class='editar 'style='cursor: pointer;'><img src='../img/editar.ico' width='30' height='30'class=d-inline-block align-top'></a><a class='ver'style='cursor: pointer;'><img src = '../img/see.svg'width='30'height='30'class='d-inline-block align-top' ></a></div>"
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
    table.columns([0]).visible(false);
    edit_data("#proveedores tbody", table);
    delete_data("#proveedores tbody", table);
    see_data("#proveedores tbody", table);
}
var edit_data = function (tbody, table) {
    $(tbody).off('click', 'a.editar');
    $(tbody).on("click", "a.editar", function name() {
        var data = table.row($(this).parents("tr")).data();
        var rfc = data.rfc;
        window.location.href = 'proveedoresupdate.php?rfc=' + rfc;
    });
}
var delete_data = function (tbody, table) {
    $(tbody).off('click', 'a.eliminar');
    $(tbody).on("click", "a.eliminar", function () {
        var data = table.row($(this).parents("tr")).data();
        var idarticulo = $("#formdelete #iddelete").val(data.idpersona);
    });
}
var see_data = function (tbody, table) {
    $(tbody).off('click', 'a.ver');
    $(tbody).on("click", "a.ver", function () {
        var data = table.row($(this).parents("tr")).data();
        var idpersona= data.idpersona;
        window.location.href = 'procesos/seeall.php?idpersona=' + idpersona+'&i=2';
    });
}