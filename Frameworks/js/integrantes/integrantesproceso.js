$(document).ready(function () {
    $('#integrantesadd').submit(e => {
        e.preventDefault();
        var titular
        if (document.getElementById('titular').checked==true) {
            titular = 'NO';
        } else {
            titular = 'SI';
        }
        const postData = {
            id: $('#idfamilia').val(),
            titular: titular,
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
            peso: $('#peso').val()

        };
        const url = 'procesos/integrantes/integrantes_add.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            if (response == 'Integrante Registrado') {                   
                alert_success(response);
                setTimeout(function () {
                    window.location.href='familiasadd.php';
                }, 1000);  
            } else {
                alert_warning(response);
            }
        });
    });
    $('#integrantesupdate').submit(e => {
        e.preventDefault();
        var titular
        if (document.getElementById('titular').checked==true) {
            titular = 'SI';
        } else {
            titular = 'NO';
        }
        const postData = {
            id: $('#id').val(),
            titular: titular,
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
            peso: $('#peso').val()

        };
        const url = 'procesos/integrantes/integrantes_update.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            if (response == 'Integrante Actualizado') {                   
                alert_success(response);
                setTimeout(function () {
                    window.location.href='familiasadd.php';
                }, 1000);  
            } else {
                alert_warning(response);
            }
        });
    });


});

function cargargrados(){
    var nivel = $('#nivel_estudios').val()
    $('#grado').load("procesos/integrantes/cargargrados.php?nivel=" + nivel)
}
