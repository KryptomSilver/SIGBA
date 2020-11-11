$(document).ready(function () {
    listargrupos();
    $('#formulario').submit(e => {
        e.preventDefault();
        const postData = {
            nombre: $('#nombre').val(),
            colonia: $('#colonia').val(),
            municipio: $('#municipio').val()
        };
        const url = 'procesos/grupos/grupos_add.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            $('#formulario').trigger('reset');
            if (response == 'Grupo Registrado') {
                alert_success(response);
                listargrupos();
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
        const url = 'procesos/grupos/grupos_delete.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            if (response == 'Grupo Eliminado') {
                $('#update').trigger('reset');
                $('#delete').modal('hide');
                alert_success(response);
            } else {
                alert_warning(response);
            }
        });
    });
    $('#update').submit(e => {
        e.preventDefault();
        const postData = {
            id: $('#id').val(),
            colonia: $('#colonia-editar').val(),
            municipio: $('#municipio-editar').val(),
            nombre: $('#nombre-editar').val()
        };
        const url = 'procesos/grupos/grupos_update.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
            console.log(response);
            if (response == 'Grupo Actualizado') {
                listargrupos();
                alert_success(response);
                $('#editar').modal('hide');
            } else {
                alert_warning(response);
            }
        });
    });

});

function updategrupo(id) {
    datos = "id=" + id;
    $.ajax({
        type: "POST",
        url: "procesos/grupos/form.php",
        data: datos,
        success: function (r) {
            var datos = JSON.parse(r);
            municipios(datos.municipio);
            cambiarcoloniaseditar(datos.municipio, datos.colonia);
            $('#nombre-editar').val(datos.nombre);
            $('#id').val(datos.id);
            $('#editar').modal('show');
        }
    });
}

function cambiarcoloniaseditar(idmunicipio, idcolonia) {
    $('#colonia-editar').load("procesos/cargarcoloniaseditar.php?id=" + idmunicipio + "&idcolonia=" + idcolonia);
}

function municipios(idmunicipio) {
    $('#municipio-editar').load("procesos/cargarmunicipios.php?id=" + idmunicipio);
}

function cambiarcolonias() {
    var id = $('#municipio').val()
    $('#colonia').load("procesos/cargarcolonias.php?id=" + id)
}

function cambiarcoloniasE() {
    var id = $('#municipio-editar').val()
    $('#colonia-editar').load("procesos/cargarcolonias.php?id=" + id)
}

function listargrupos() {
    $('#tab').load("procesos/grupos/grupos_listar.php")
}

function eliminargrupo(id) {
    Swal.fire({
        title: '¿Estas seguro?',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        console.log(result);
        if (result.value) {
            console.log("hola");
            datos = "id=" + id;
            $.ajax({
                type: "POST",
                url: "procesos/grupos/grupos_delete.php",
                data: datos,
                success: function (r) {
                    alert_success(r);
                    console.log("hola" + r);
                    listargrupos();
                }
            });
        }
    })
}