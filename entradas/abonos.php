<?php
require("conexion.php");
require('header.html');
?>

<!DOCTYPE html>
<html lang="es">

<body>
    <br>
    <h1 class="titulo">Abonos</h1>
    <hr>
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-3">
                    <select class="form-control" name="" id="ids" onchange="hola()">
                        <option value="0">Todas</option>
                        <?php
                        $query = "SELECT * FROM personas";
                        $res = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($res)) {

                        ?>
                        <option value="<?= $row['idpersona'] ?>"><?= $row['nombre_Contacto'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <br>

            <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Proveedor</th>
                        <th>Tipo pago</th>
                        <th>Total</th>
                        <th>Estatus
                        <th>
                    </tr>
                </thead>
                <tbody id="tab">
                </tbody>
            </table>

        </form>

    </div>

</body>

<script src="../Frameworks/js/tablas.js"></script>
<script src="../Frameworks/js/entradas/abonos.js"></script>
<script>
cargar(0)
</script>
<?php
require('footer.html');
?>


</html>