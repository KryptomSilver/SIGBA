$(document).ready(function () {
    $('#integrantesadd').submit(e => {
        e.preventDefault();
        const postData = {
            id: $('#idfamilia').val(),
            titular: $('#titular').val(),
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
            padre: $('#padre').val(),
            madre: $('#madre').val(),
            hijos: $('#hijos').val(),
            becas: $('#becas').val(),
            pension: $('#pension').val(),
            talla: $('#talla').val(),
            peso: $('#peso').val(),
            adultos: $('#adultos').val()

        };
        const url = 'procesos/integrantes/integrantes_add.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            var parsedData = JSON.parse(response);
            var mensaje = parsedData.mns;
            var id = parsedData.id;
            if (mensaje == 'Integrante Registrado') {                   
                alert_success(mensaje);
                setTimeout(function () {
                    window.location.href='integrantes.php?idfamilia='+id;
                }, 1000);  
            } else {
                alert_warning(response);
            }
        });
    });
    $('#integrantesupdate').submit(e => {
        e.preventDefault();
        const postData = {
            id: $('#id').val(),
            idfamilia: $('#idfamilia').val(),
            titular: $('#titular').val(),
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
            padre: $('#padre').val(),
            madre: $('#madre').val(),
            hijos: $('#hijos').val(),
            becas: $('#becas').val(),
            pension: $('#pension').val(),
            talla: $('#talla').val(),
            peso: $('#peso').val(),
            adultos: $('#adultos').val()

        };
        const url = 'procesos/integrantes/integrantes_update.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            var parsedData = JSON.parse(response);
            var mensaje = parsedData.mns;
            var id = parsedData.id;
            if (mensaje == 'Integrante Actualizado') {                   
                alert_success(mensaje);
                setTimeout(function () {
                    window.location.href='integrantes.php?idfamilia='+id;
                }, 1000);  
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
