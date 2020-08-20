//menu pegajoso scroll
$(document).ready(function () {
    //var altura = $('.menu').offset().top;

   // $(window).on('scroll', function () {
     //   if ($(window).scrollTop() > altura) {
    //        $('.menu').addClass('menu-pegajoso');
     //   } else {
     //       $('.menu').removeClass('menu-pegajoso');
    //    }
   // });

    // AJAX PROVEEDORES AGREGAR
    $('#donadores_add').submit(e => {
        e.preventDefault();
        const postData = {
            razon: $('#razon').val(),
            rfc: $('#rfc').val(),
            calle: $('#calle').val(),
            numext: $('#numext').val(),
            numint: $('#numint').val(),
            codpostal: $('#codpostal').val(),
            colonia: $('#colonia').val(),
            contacto: $('#contacto').val(),
            telefono: $('#telefono').val(),
            celular: $('#celular').val(),
            correo: $('#correo').val(),
            recibo: $('#recibo').val()
        };
        const url = 'procesos/donadores/donadores_add.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            if (response == 'DONADOR REGISTRADO') {
                window.location.href='donadores.php';
                alert_success(response);
            } else {
                alert_warning(response);
            }
        });
    });
    $('#donadores_update').submit(e => {
        e.preventDefault();
        const postData = {
            razon: $('#razon').val(),
            rfc: $('#rfc').val(),
            calle: $('#calle').val(),
            numext: $('#numext').val(),
            numint: $('#numint').val(),
            codpostal: $('#codpostal').val(),
            colonia: $('#colonia').val(),
            contacto: $('#contacto').val(),
            telefono: $('#telefono').val(),
            celular: $('#celular').val(),
            correo: $('#correo').val(),
            idpersona: $('#id').val(),
            recibo: $('#recibo').val()
        };
        const url = 'procesos/donadores/donadores_update.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            if (response == 'REGISTRO ACTUALIZADO') {
                window.location.href='donadores.php';
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
