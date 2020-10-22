$(document).ready(function () {
    $('#integrantesadd').submit(e => {
        e.preventDefault();
        const postData = {
            id: $('#idfamilia').val(),
            titular: $('input:radio[name=titular]:checked').val(),
            nombre: $('#nombre').val(),
            apellido1: $('#apellido1').val(),
            apellido2: $('#apellido2').val(),
            sexo: $('#sexo').val(),
            fecha: $('#fecha').val(),
            entidad: $('#entidad').val(),
            curp: $('#curp').val(),
            estado_civil: $('#estado_civil').val(),
            ocupacion: $('#ocupacion').val(),
            parentesco: $('#parentesco').val(),
            nivel_estudios: $('#nivel_estudios').val(),
            grado: $('#grado').val(),
            estado: $('#estado').val(),
            ingresos: $('#ingresos').val(),
            talla: $('#talla').val(),
            peso: $('#peso').val(),
            becas: $('#becasi').val(),
            pension: $('#pensioni').val(),
            otros: $('#otrosi').val(),
            adultos: $('#adultosi').val()

        };
        const url = 'procesos/integrantes/integrantes_add.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            if (response == 'Integrante Registrado') {
                alert_success(response);
                var pag = $('#pag').val();
                var idfam = $('#idfamilia').val();
                if (pag == 1) {
                    setTimeout(function () {
                        window.location.href = 'familiasadd.php';
                    }, 1000);
                } else {
                    setTimeout(function () {
                        window.location.href = 'familiasupdate.php?idfamilia=' + idfam;
                    }, 1000);
                }

            } else {
                alert_warning(response);
            }
        });
    });
    $('#integrantesupdate').submit(e => {
        e.preventDefault();
        const postData = {
            id: $('#id').val(),
            titular: $('input:radio[name=titular]:checked').val(),
            nombre: $('#nombre').val(),
            apellido1: $('#apellido1').val(),
            apellido2: $('#apellido2').val(),
            sexo: $('#sexo').val(),
            fecha: $('#fecha').val(),
            entidad: $('#entidad').val(),
            curp: $('#curp').val(),
            estado_civil: $('#estado_civil').val(),
            ocupacion: $('#ocupacion').val(),
            parentesco: $('#parentesco').val(),
            nivel_estudios: $('#nivel_estudios').val(),
            grado: $('#grado').val(),
            estado: $('#estado').val(),
            ingresos: $('#ingresos').val(),
            talla: $('#talla').val(),
            peso: $('#peso').val(),
            becas: $('#becasi').val(),
            pension: $('#pensioni').val(),
            otros: $('#otrosi').val(),
            adultos: $('#adultosi').val()

        };
        const url = 'procesos/integrantes/integrantes_update.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            if (response == 'Integrante Actualizado') {
                alert_success(response);
                var pag = $('#pag').val();
                var idfam = $('#idfam').val();
                if (pag == 1) {
                    setTimeout(function () {
                        window.location.href = 'familiasadd.php';
                    }, 1000);
                } else {
                    setTimeout(function () {
                        window.location.href = 'familiasupdate.php?idfamilia=' + idfam;
                    }, 1000);
                }
            } else {
                alert_warning(response);
            }
        });
    });


});

function cargargrados() {
    var nivel = $('#nivel_estudios').val()
    $('#grado').load("procesos/integrantes/cargargrados.php?nivel=" + nivel)
}

function checkinput() {
    if ($('#pension').prop('checked')) {
        $("#pensioni").prop("disabled", false);

    } else {
        $("#pensioni").prop("disabled", true);
        $("#pensioni").val("");
    }
    if ($('#otros').prop('checked')) {
        $("#otrosi").prop("disabled", false);

    } else {
        $("#otrosi").prop("disabled", true);
        $("#otrosi").val("");
    }
    if ($('#becas').prop('checked')) {
        $("#becasi").prop("disabled", false);

    } else {
        $("#becasi").prop("disabled", true);
        $("#becasi").val("");
    }
    if ($('#adultos').prop('checked')) {
        $("#adultosi").prop("disabled", false);
    } else {
        $("#adultosi").prop("disabled", true);
        $("#adultosi").val("");
    }
}