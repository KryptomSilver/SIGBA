function hola(){
    var a=$('#ids').val()
    cargar(a)
    }

function cargar(id) {
    $('#tab').load("procesos/compras/abonos_listar.php?id=" + id)
}

function agregarabono(id){
    var abono = $('#abono').val()
    var fecha = $('#fecha').val()

    var datos = "id=" + id + "&abono=" + abono + "&fecha=" + fecha 
    console.log(datos)

    $.ajax({
        type: "POST",
        url: "procesos/compras/abonar.php",
        data: datos,
        success: function (r) {
            $('#abono').val("")
            $('#fecha').val("")
            $('#saldo').val(r)
            cargarabonos(id)
        }
    });
}
    

function cargarabonos(id) {
    $('#tab').load("procesos/compras/abonar_listar.php?id=" + id)
}

function ir(id){
    location.href="abono.php?id="+id
}