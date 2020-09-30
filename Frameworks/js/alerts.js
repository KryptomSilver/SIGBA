
function alert_success (msg) {
    var respuesta = msg
    Swal.fire({
        type: 'success',
        title: respuesta,
        showConfirmButton: false,
        timer: 800
    })
}
function alert_warning(msg) {
    var respuesta = msg
    Swal.fire({
        type: 'warning',
        title: respuesta,
        showConfirmButton: false,
        timer: 800
    })
}
function alert_info(msg) {
    var respuesta = msg
    Swal.fire({
        type: 'info',
        title: respuesta,
        showConfirmButton: false,
        timer: 800
    })
}

