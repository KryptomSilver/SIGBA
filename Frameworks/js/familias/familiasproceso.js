$(document).ready(function () {
    // Menu secciones
    
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
    $('#familias_add').submit(e => {
        e.preventDefault();
        const postData = {
            municipio: $('#municipio').val(),
            colonia: $('#colonia').val(),
            calle: $('#calle').val(),
            numext: $('#numext').val(),
            numint: $('#numint').val(),
            callecol1: $('#callecol1').val(),
            callecol2: $('#callecol2').val(),
            telefono: $('#telefono').val(),
            integrantes: $('#integrantes').val(),
            ingreso: $('#ingreso').val(),
            tenencia: $('#tenencia').val(),
            cuartos: $('#cuartos').val(),
            numfamilias: $('#numfamilias').val(),
            vivienda: $('#vivienda').val(),
            alimentacion: $('#alimentacion').val(),
            luz: $('#luz').val(),
            gas: $('#gas').val(),
            agua: $('#agua').val(),
            atencionM: $('#atencionM').val(),
            telefonoE: $('#telefonoE').val(),
            transporte: $('#transporte').val(),
            otrosE: $('#otrosE').val(),
            celular: $('#celular').val(),
            educacion: $('#educacion').val(),
            totalsemanalE: $('#totalsemanalE').val(),
            totalmensualE: $('#totalmensualE').val()

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
                    window.location.href='integrantes.php?idfamilia='+id;
                }, 1000);  
            } else {
                alert_warning(response);
            }
        });
    });
    $('#familias_update').submit(e => {
        e.preventDefault();
        const postData = {
            id: $('#id').val(),
            municipio: $('#municipio').val(),
            colonia: $('#colonia').val(),
            calle: $('#calle').val(),
            numext: $('#numext').val(),
            numint: $('#numint').val(),
            callecol1: $('#callecol1').val(),
            callecol2: $('#callecol2').val(),
            telefono: $('#telefono').val(),
            integrantes: $('#integrantes').val(),
            ingreso: $('#ingreso').val(),
            tenencia: $('#tenencia').val(),
            cuartos: $('#cuartos').val(),
            numfamilias: $('#numfamilias').val(),
            vivienda: $('#vivienda').val(),
            alimentacion: $('#alimentacion').val(),
            luz: $('#luz').val(),
            gas: $('#gas').val(),
            agua: $('#agua').val(),
            atencionM: $('#atencionM').val(),
            telefonoE: $('#telefonoE').val(),
            transporte: $('#transporte').val(),
            otrosE: $('#otrosE').val(),
            celular: $('#celular').val(),
            educacion: $('#educacion').val(),
            totalsemanalE: $('#totalsemanalE').val(),
            totalmensualE: $('#totalmensualE').val()
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
                    window.location.href='integrantes.php?idfamilia='+ id;
                }, 1000);  
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

function cambiarcolonias() {
    var id = $('#municipio').val()
    $('#colonia').load("procesos/cargarcolonias.php?id=" + id)
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


