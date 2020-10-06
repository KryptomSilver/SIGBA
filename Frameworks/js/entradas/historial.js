function hola(){
    var a=$('#ids').val()
    cargar(a)
    }

function cargar(id) {
    $('#tab').load("procesos/compras/historial_listar.php?id=" + id)
}

function ir(id){
    location.href="detallecompra.php?id="+id
}