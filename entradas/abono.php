<?php
require("conexion.php");
require('header.html');
$id = $_GET['id'];
$query = "SELECT p.nombre_Contacto,c.* FROM `compras` c INNER JOIN personas p ON c.`fk_vendedor` = p.idpersona WHERE c.id='$id'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($res);

?>
<!DOCTYPE html>
<html lang="es">

<body>
    <br>
    <main>
        <h1 class="titulo">Abono</h1>
        <hr>
        <div class="container">
            <form action="" method="post">
                <br>
                <div class="form-group row">
                    <label class=" col-form-label">No. Factura:</label>
                    <div class="col-2">
                        <input type="text" class="form-control" value="<?= $row['factura'] ?>" disabled>
                    </div>
                    <div class="col-2"></div>
                    <label class=" col-form-label">Proveedor:</label>
                    <div class="col-4">
                        <input type="text" class="form-control" value="<?= $row['nombre_Contacto'] ?>" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label class="titulo">Importe:</label>
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control" value="$ <?= $row['total'] ?>" type="text" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-4">
                        <label class="titulo">Saldo:</label>
                        <div class="row">
                            <div class="col-12">
                                <?php
                                $sql = "SELECT MIN(`restante`) as res FROM `abonos` where`fk_compra`= '$id'";
                                $res = mysqli_query($conn, $sql);
                                $xx = mysqli_fetch_assoc($res);

                                $numrow = mysqli_num_rows($res);
                                if ($xx['res'] != "") {
                                    $restante = $xx['res'];
                                } else {
                                    $restante = $row['total'];
                                }
                                ?>
                                <input class="form-control" id="saldo" value="$ <?= $restante ?>" type="text" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label class="titulo">Abono:</label>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                    </div>
                                    <input id="abono" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-4">
                        <label class="titulo">Fecha:</label>
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control" type="date" id="fecha">
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-11"></div>
                    <div class="col-1">
                        <button type="button" onclick="agregarabono(<?= $row['id'] ?>)" class="btn">Abonar</button>
                    </div>
                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Abono</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody id="tab">
                    <tbody>
                </table>


            </form>

        </div>
    </main>
    <?php
    require('footer.html');
    ?>
    <script src="../Frameworks/js/entradas/abonos.js"></script>
    <script>
    cargarabonos(<?= $row['id'] ?>)
    </script>
</body>

</html>