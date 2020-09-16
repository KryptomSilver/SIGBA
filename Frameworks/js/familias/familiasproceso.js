$(document).ready(function () {
    // Menu secciones
    listarintegrantes();
    $('.secciones .hide').hide();
    $('ul.tabs li a:first').addClass('active');

    $('.secciones .hide:first').show();

    $('ul.tabs li a').click(function () {
        $('ul.tabs li a').removeClass('active');
        $(this).addClass('active');
        $('.secciones .hide').hide();

        var activeTab = $(this).attr('href');
        $(activeTab).show();
        return false;
    });
    // Agregar familia
    $('#familias').submit(e => {
        e.preventDefault();
        var estatus = $('#estatus').val();
        if (estatus > 0) {

            const postData = {
                municipio: $('#municipio').val(),
                colonia: $('#colonia').val(),
                calle: $('#calle').val(),
                numext: $('#numext').val(),
                numint: $('#numint').val(),
                callecol1: $('#callecol1').val(),
                callecol2: $('#callecol2').val(),
                telefono: $('#telefono').val(),
                integrantes: $('#integrantes').val()

            };
            const url = 'procesos/familias/familias_add.php';
            console.log(postData, url);
            $.post(url, postData, (response) => {
                console.log(response);
                var parsedData = JSON.parse(response);
                var mensaje = parsedData.mns;
                var id = parsedData.id;
                if (mensaje == 'Familia Registrada') {
                    alert_success(mensaje);
                    setTimeout(function () {
                        window.location.href = 'familiasadd.php';
                    }, 1000);
                    listarintegrantes();
                } else {
                    alert_warning(response);
                }
            });
        } else {

            const postData = {
                id: $('#idv').val(),
                municipio: $('#municipio').val(),
                colonia: $('#colonia').val(),
                calle: $('#calle').val(),
                numext: $('#numext').val(),
                numint: $('#numint').val(),
                callecol1: $('#callecol1').val(),
                callecol2: $('#callecol2').val(),
                telefono: $('#telefono').val(),
                integrantes: $('#integrantes').val()
            };
            const url = 'procesos/familias/familias_update.php';
            console.log(postData, url);
            $.post(url, postData, (response) => {
                console.log(response);
                var parsedData = JSON.parse(response);
                var mensaje = parsedData.mns;
                var id = parsedData.id;
                if (mensaje == 'Familia Actualizada') {
                    alert_success(mensaje);
                    setTimeout(function () {
                        window.location.href = 'familiasadd.php';
                    }, 1000);
                    listarintegrantes();
                } else {
                    alert_warning(response);
                }
            });

        }

    });
    $('#vivienda').submit(e => {
        e.preventDefault();
        var estatus = $('#estatus').val();
        if (estatus > 0) {

            const postData = {
                tenencia: $('#tenencia').val(),
                cuartos: $('#cuartos').val(),
                numfamilias: $('#numfamilias').val(),
                id: $('#idv').val()

            };
            const url = 'procesos/familias/vivienda_add.php';
            console.log(postData, url);
            $.post(url, postData, (response) => {
                if (response == 'Vivienda Registrada') {
                    alert_success(mensaje);
                    setTimeout(function () {
                        window.location.href = 'familiasadd.php';
                    }, 1000);
                    listarintegrantes();
                } else {
                    alert_warning(response);
                }
            });
        } else {
            const postData = {
                tenencia: $('#tenencia').val(),
                cuartos: $('#cuartos').val(),
                numfamilias: $('#numfamilias').val(),
                id: $('#idv').val()

            };
            const url = 'procesos/familias/vivienda_update.php';
            console.log(postData, url);
            $.post(url, postData, (response) => {
                console.log(response);
                if (response == 'Vivienda Actualizada') {
                   
                    alert_success(response);
                    setTimeout(function () {
                        window.location.href = 'familiasadd.php';
                    }, 1000);
                    listarintegrantes();
                } else {
                    alert_warning(response);
                }
            });

        }

    });
    
    $("#formdelete").submit((e) => {
        e.preventDefault();
        var id = $("#formdelete #iddelete").val();
        console.log(id);
        const postData = {
            id: $("#iddelete").val(),
        };
        const url = "procesos/integrantes/integrantes_delete.php";
        console.log(postData, url);
        $.post(url, postData, (response) => {
            if (response == "Integrante Eliminado") {
                $("#delete").modal("hide");
                alert_success(response);
                listarintegrantes();
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
        timer: 1000
    })
}

function eliminar(id) {
    var idintegrante = id;
    $('#delete').modal('show');
    $('#iddelete').val(idintegrante);
}

function cambiarcolonias() {
    var id = $('#municipio').val()
    $('#colonia').load("procesos/cargarcolonias.php?id=" + id)
}

function listarintegrantes() {
    var id = $('#idv').val()
    $('#tab').load("procesos/integrantes/integrantes_listar.php?idfamlia=" + id)
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