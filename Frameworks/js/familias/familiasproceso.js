$(document).ready(function () {
    sumaringresos();
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
    // familia
    $('#familias_update').submit(e => {
        e.preventDefault();
        var id = $('#idv').val()
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
                    window.location.href = 'familiasupdate.php?idfamilia=' + id;
                }, 1000);
                listarintegrantes();
            } else {
                alert_warning(response);
            }
        });
    });
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
    //Vivienda
    $('#vivienda_update').submit(e => {
        e.preventDefault();
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
                listarintegrantes();
            } else {
                alert_warning(response);
            }
        });
    });
    $('#vivienda').submit(e => {
        e.preventDefault();
        var estatus = $('#idvivenda').val();
        console.log(estatus);
        if (estatus > 0) {
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
            const url = 'procesos/familias/vivienda_add.php';
            console.log(postData, url);
            $.post(url, postData, (response) => {
                console.log(response);
                if (response == 'Vivienda Registrada') {
                    alert_success(response);
                    listarintegrantes();
                } else {
                    alert_warning(response);
                }
            });
        }

    });
    //Egresos
    $('#egresos_update').submit(e => {
        e.preventDefault();
        const postData = {
            v: $('#v').val(),
            alimentacion: $('#alimentacion').val(),
            luz: $('#luz').val(),
            gas: $('#gas').val(),
            agua: $('#agua').val(),
            atencionM: $('#atencionM').val(),
            telefono: $('#telefono').val(),
            transporte: $('#transporte').val(),
            otrosE: $('#otrosE').val(),
            celular: $('#celular').val(),
            educacion: $('#educacion').val(),
            totalsemanalE: $('#totalsemanalE').val(),
            totalmensualE: $('#totalmensualE').val(),
            id: $('#idv').val()

        };
        const url = 'procesos/familias/egresos_update.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            if (response == 'Egresos Actualizados') {

                alert_success(response);

                listarintegrantes();
            } else {
                alert_warning(response);
            }
        });
    });
    $('#egresos').submit(e => {
        e.preventDefault();
        var estatus = $('#idegresos').val();
        console.log(estatus);
        if (estatus > 0) {
            const postData = {
                v: $('#v').val(),
                alimentacion: $('#alimentacion').val(),
                luz: $('#luz').val(),
                gas: $('#gas').val(),
                agua: $('#agua').val(),
                atencionM: $('#atencionM').val(),
                telefono: $('#telefono').val(),
                transporte: $('#transporte').val(),
                otrosE: $('#otrosE').val(),
                celular: $('#celular').val(),
                educacion: $('#educacion').val(),
                totalsemanalE: $('#totalsemanalE').val(),
                totalmensualE: $('#totalmensualE').val(),
                id: $('#idv').val()

            };
            const url = 'procesos/familias/egresos_update.php';
            console.log(postData, url);
            $.post(url, postData, (response) => {
                console.log(response);
                if (response == 'Egresos Actualizados') {

                    alert_success(response);

                    listarintegrantes();
                } else {
                    alert_warning(response);
                }
            });
        } else {
            const postData = {
                vivienda: $('#v').val(),
                alimentacion: $('#alimentacion').val(),
                luz: $('#luz').val(),
                gas: $('#gas').val(),
                agua: $('#agua').val(),
                atencionM: $('#atencionM').val(),
                telefono: $('#telefonoE').val(),
                transporte: $('#transporte').val(),
                otrosE: $('#otrosE').val(),
                celular: $('#celular').val(),
                educacion: $('#educacion').val(),
                totalsemanalE: $('#totalsemanalE').val(),
                totalmensualE: $('#totalmensualE').val(),
                idf: $('#idv').val()

            }
            const url = 'procesos/familias/egresos_add.php';
            console.log(postData, url);
            $.post(url, postData, (response) => {
                console.log(response);
                if (response == 'Egresos Registrados') {
                    alert_success(response);
                    listarintegrantes();
                } else {
                    alert_warning(response);
                }
            });
        }

    });

    //integrantes eliminar
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
    $('#ingresos').submit(e => {
        e.preventDefault();
        const postData = {
            estatus: $("#estatusf").val(),
            idf: $('#idv').val()
        };
        const url = 'procesos/familias/familia_estatus.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            if (response == 'Familia Registrada') {
                alert_success(response);
                setTimeout(function () {
                    window.location.href='familias.php';
                }, 1000);
            } else {
                alert_warning(response);
            }
        });

    });


});

function verificar() {
    var idf = $('#idv').val();
    const postData = {
        idf: $('#idv').val()
        
    };
    const url = "procesos/integrantes/integrantes_count.php";
    console.log(postData, url);
    $.post(url, postData, (response) => {
        console.log(response);
        if (response == 0) {
            window.location.href = 'integrantesadd.php?idfamilia=' + idf;
        } else {
            alert_info("No se puede registrar mas integrantes");
        }
    });
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


function sumar() {
    var sum = 0;
    $(".sumar").each(function () {
        sum += +$(this).val();
    });
    $("#totalsemanalE").val(sum);
    $("#totalmensualE").val(sum * 4);
}

function sumaringresos() {
    var sum = 0;
    $(".ingresos").each(function () {
        sum += +$(this).val();
    });
    $("#ingresosem").val(sum);
    $("#ingresomen").val(sum * 4);

}