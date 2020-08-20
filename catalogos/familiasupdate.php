<!DOCTYPE html>
<html lang="en">
<?php 
$id = $_GET['idfamilia'];
require('procesos/conexion.php');
$sql = "
SELECT familias.*,vivienda.*,ingresos.*,egresos.vivienda,egresos.alimentacion,egresos.luz,egresos.agua,egresos.telefono as telefonoe,egresos.transporte,egresos.atencion_medica,egresos.otros_gastos,egresos.celular,egresos.educacion, egresos.total_mensual as total_mensuale, egresos.total_semanal as total_semanale,egresos.gas
FROM familias
INNER JOIN vivienda ON familias.id = vivienda.fk_familia
INNER JOIN ingresos ON vivienda.fk_familia = ingresos.fk_familia
INNER JOIN egresos ON ingresos.fk_familia = egresos.fk_familia
WHERE familias.id = '$id' ";
$resultado = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($resultado);
?>
<input value="<?php echo $id;?>"id="id" type="text"hidden>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Frameworks/jQuery/jquery.js"></script>
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <script src="../Frameworks/js/alert.js" type="text/javascript"></script>
    <script src="../Frameworks/js/familias/familiasproceso.js"></script>
    <title>Familiares</title>

</head>


<body>
    <?php 
        require('header.html');
    ?>
    <br>
    <h1 class="titulo">Familias</h1>
    <br>
    <form action="" id="familias_update">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="navmenu">
                        <ul class="tabs">
                            <li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Datos
                                        generales</span></a>
                            </li>
                            <li><a href="#tab2"><span class="fa fa-group"></span><span
                                        class="tab-text">Vivienda</span></a>
                            </li>
                            <li><a href="#tab3"><span class="fa fa-briefcase"></span><span class="tab-text">Ingresos
                                        familiares</span></a></li>
                            <li><a href="#tab4"><span class="fa fa-bookmark"></span><span class="tab-text">Egresos
                                        familiares</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="secciones">
                <!-- datos generales-->
                <div class="hide" id="tab1">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Municipio:</label>
                                <select id="municipio" id="" class="form-control" required>
                                    <option value="Colima">Colima</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Colonia:</label>
                                <select id="colonia" id="" class="form-control" required>
                                    <option value="Colima">Ejemplo1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="">Calle:</label>
                                <input type="text" id="calle" class="form-control" value="<?php echo $rows['calle'];?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Nº exterior:</label>
                                <input type="text" id="numext" value="<?php echo $rows['num_Externo'];?>"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Nº interior:</label>
                                <input type="text" id="numint" value="<?php echo $rows['num_Interno'];?>"class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Calles colindante 1:</label>
                                <input type="text" id="callecol1"value="<?php echo $rows['calle_col1'];?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Calles colindante 1:</label>
                                <input type="text" id="callecol2" value="<?php echo $rows['calle_col2'];?>"class="form-control" required>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="">Teléfono:</label>
                                <input type="text" id="telefono" value="<?php echo $rows['telefono'];?>"class="form-control" required>
                            </div>

                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Nº integrantes:</label>
                                <input type="text" id="integrantes" value="<?php echo $rows['integrantes'];?>"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Ingreso total familiar:</label>
                                <input type="text" id="ingreso" value="<?php echo $rows['ingresototal'];?>"class="form-control" placeholder="$" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- vivienda --->
                <div class="hide" id="tab2">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Tenencia:</label>
                                <select name="" id="tenencia" class="form-control" required>
                                    <?php $tenencia= $rows['tenencia'];?>
                                    <option  value="Propia" <?php if ($tenencia == 'Propia') {echo "selected";}?>>Propia</option>
                                    <option  value="Prestada" <?php if ($tenencia  == 'Prestada') {echo "selected" ;}?>>Prestada</option>
                                    <option value="Pagándose"  <?php if ($tenencia  == 'Pagándose') {echo "selected" ;}?>>Pagándose</option>
                                    <option  value="Rentada" <?php if ($tenencia  == 'Rentada') {echo "selected" ;}?>>Rentada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Nº Cuartos</label>
                                <input type="text" id="cuartos"value="<?php echo $rows['num_Cuartos'];?>"" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Nº Familias Habitándola</label>
                                <input type="text" id="numfamilias"value="<?php echo $rows['num_Familias'];?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ingresos familiares -->
                <div class="hide" id="tab3">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Padre:</label>
                                <input type="text" placeholder="$"id="padre"value="<?php echo $rows['padre'];?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Madre:</label>
                                <input type="text" id="madre"placeholder="$"value="<?php echo $rows['madre'];?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Hijos:</label>
                                <input type="text"id="hijos" placeholder="$"value="<?php echo $rows['hijos'];?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Becas:</label>
                                <input type="text"id="becas" placeholder="$" value="<?php echo $rows['becas'];?>"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Pensión:</label>
                                <input type="text"id="pension" placeholder="$" value="<?php echo $rows['pension'];?>"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Otros:</label>
                                <input type="text"id="otros" placeholder="$"value="<?php echo $rows['otros'];?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Adultos mayores:</label>
                                <input type="text"id="adultos" placeholder="$" value="<?php echo $rows['adultos_Mayores'];?>"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Total semanal:</label>
                                <input type="text"id="totalsemanal" placeholder="$"value="<?php echo $rows['total_Semanal'];?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Total mensual:</label>
                                <input type="text"id="totalmensual" placeholder="$" value="<?php echo $rows['total_Mensual'];?>"class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--egresos-->
                <div class="hide" id="tab4">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Vivienda:</label>
                                <input type="text"id="vivienda" placeholder="$" value="<?php echo $rows['vivienda'];?>"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Alimentación:</label>
                                <input type="text" id="alimentacion"placeholder="$" value="<?php echo $rows['alimentacion'];?>"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Luz:</label>
                                <input type="text"id="luz" placeholder="$"value="<?php echo $rows['luz'];?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Gas:</label>
                                <input type="text"id="gas" placeholder="$" value="<?php echo $rows['gas'];?>"class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Agua:</label>
                                <input type="text"id="agua" placeholder="$"value="<?php echo $rows['agua'];?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Atención medica:</label>
                                <input type="text" id="atencionM"placeholder="$" value="<?php echo $rows['atencion_medica'];?>"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Teléfono:</label>
                                <input type="text"id="telefonoE" placeholder="$" value="<?php echo $rows['telefonoe'];?>"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Transporte:</label>
                                <input type="text" id="transporte"placeholder="$"value="<?php echo $rows['transporte'];?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Otros gastos:</label>
                                <input type="text"id="otrosE" placeholder="$" value="<?php echo $rows['otros_gastos'];?>"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Celular:</label>
                                <input type="text"id="celular" placeholder="$" value="<?php echo $rows['celular'];?>"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Educación:</label>
                                <input type="text"id="educacion" placeholder="$" value="<?php echo $rows['educacion'];?>"class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Total semanal:</label>
                                <input type="text"id="totalsemanalE" placeholder="$"value="<?php echo $rows['total_semanale'];?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Total mensual:</label>
                                <input type="text" id="totalmensualE"placeholder="$" value="<?php echo $rows['total_mensuale'];?>"class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-3">
                            <a href="familiaslista.php" class="btn btn-lg btn-primary"
                                title="Ir la página anterior">Cancelar</a>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-3">
                            <button class="btn btn-lg btn-primary" type="submit">Guardar</button>
                            <!--<a class="btn btn-lg btn-primary" href="integrantes.php">Guardar</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    require('footer.html');
    ?>
</body>


</html>