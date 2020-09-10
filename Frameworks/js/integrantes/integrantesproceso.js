$(document).ready(function () {
    $('#agregarintegrante').submit(e => {
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
            estado: $('#estado').val()
        };
        const url = 'procesos/integrantes/integrantes_add.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            if (response == 'Integrante Registrado') {
                alert_success(response);
                
            } else {
                alert_warning(response);
            }
        });
    });


});