<!DOCTYPE html>
<html lang="en">
<?php 
$id = $_GET['idfamilia'];
require('procesos/conexion.php');
$sql = "
SELECT viv.*,eg.*,fam.calle,fam.calle_col1,fam.calle_col2,fam.colonia,
fam.ingresototal,fam.integrantes,fam.municipio,fam.num_Externo,fam.num_Interno,fam.telefono as telfam
from familias fam
INNER JOIN vivienda viv ON fam.id = viv.fk_familia
INNER JOIN egresos eg ON viv.fk_familia = eg.fk_familia
where fam.id = '$id' ";
$resultado = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($resultado);
?>
<input value="<?php echo $id;?>" id="id" type="text" hidden>

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
    <h1 class="titulo">Familias</h1>
    <hr>
    <div class="tabla-lg">
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
                                <!--<li><a href="#tab3"><span class="fa fa-briefcase"></span><span class="tab-text">Ingresos
                                        </span></a></li>-->
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
                                    <?php include('procesos/conexion.php');
                                    $query = "SELECT * FROM municipios";
                                    $resultado = mysqli_query($conn,$query);
                                   
                                    ?>
                                    <select id="municipio" class="form-control" onchange="cambiarcolonias()" required>
                                        <?php  while ($municipios = mysqli_fetch_array($resultado)) { ?>
                                        <option value="<?=$municipios['id']?>" <?php if ($rows['municipio'] == $municipios['id']) { echo "selected";}?>>
                                            <?=$municipios['nombre']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input id="coloniaid"type="hidden" value="<?=$rows['colonia']?>">
                                    <label for="">Colonia:</label>
                                    <?php include('procesos/conexion.php');
                                    $idcol = $rows['municipio'];
                                    $queryc = "SELECT * FROM colonias where fk_municipio ='$idcol'";
                                    $resultadoc = mysqli_query($conn,$queryc);
                                    
                                    ?>
                                    <select id="colonia" class="form-control" required>
                                    <?php  while ($colonias = mysqli_fetch_array($resultadoc)) { ?>
                                        <option value="<?=$colonias['id']?>" <?php if ($rows['colonia'] == $colonias['id']) { echo "selected";}?>>
                                            <?=$colonias['nombre']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="">Calle:</label>
                                    <input type="text" id="calle" class="form-control"
                                        value="<?php echo $rows['calle'];?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="">Nº exterior:</label>
                                    <input type="text" id="numext" value="<?php echo $rows['num_Externo'];?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="">Nº interior:</label>
                                    <input type="text" id="numint" value="<?php echo $rows['num_Interno'];?>"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Calles colindante 1:</label>
                                    <input type="text" id="callecol1" value="<?php echo $rows['calle_col1'];?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Calles colindante 1:</label>
                                    <input type="text" id="callecol2" value="<?php echo $rows['calle_col2'];?>"
                                        class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="">Teléfono:</label>
                                    <input type="text" id="telefono" value="<?php echo $rows['telfam'];?>"
                                        class="form-control" required>
                                </div>

                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="">Nº integrantes:</label>
                                    <input type="number" min="1" max="10" id="integrantes"
                                        value="<?php echo $rows['integrantes'];?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="">Ingreso total familiar:</label>
                                    <input type="text" id="ingreso" value="<?php echo $rows['ingresototal'];?>"
                                        class="form-control" placeholder="$" required>
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
                                        <option value="Propia" <?php if ($tenencia == 'Propia') {echo "selected";}?>>
                                            Propia</option>
                                        <option value="Prestada"
                                            <?php if ($tenencia  == 'Prestada') {echo "selected" ;}?>>Prestada</option>
                                        <option value="Pagándose"
                                            <?php if ($tenencia  == 'Pagándose') {echo "selected" ;}?>>Pagándose
                                        </option>
                                        <option value="Rentada"
                                            <?php if ($tenencia  == 'Rentada') {echo "selected" ;}?>>Rentada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Nº Cuartos</label>
                                    <input type="number" min="1" max="10" id="cuartos"
                                        value="<?php echo $rows['num_Cuartos'];?>"" class=" form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Nº Familias Habitándola</label>
                                    <input type="number" min="1" max="10" id="numfamilias"
                                        value="<?php echo $rows['num_Familias'];?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ingresos familiares -->

                    <!--egresos-->
                    <div class="hide" id="tab4">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Vivienda:</label>
                                    <input type="text" id="vivienda" placeholder="$"
                                        value="<?php echo $rows['vivienda'];?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Alimentación:</label>
                                    <input type="text" id="alimentacion" placeholder="$"
                                        value="<?php echo $rows['alimentacion'];?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Luz:</label>
                                    <input type="text" id="luz" placeholder="$" value="<?php echo $rows['luz'];?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Gas:</label>
                                    <input type="text" id="gas" placeholder="$" value="<?php echo $rows['gas'];?>"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Agua:</label>
                                    <input type="text" id="agua" placeholder="$" value="<?php echo $rows['agua'];?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Atención medica:</label>
                                    <input type="text" id="atencionM" placeholder="$"
                                        value="<?php echo $rows['atencion_medica'];?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Teléfono:</label>
                                    <input type="text" id="telefonoE" placeholder="$"
                                        value="<?php echo $rows['telefono'];?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Transporte:</label>
                                    <input type="text" id="transporte" placeholder="$"
                                        value="<?php echo $rows['transporte'];?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Otros gastos:</label>
                                    <input type="text" id="otrosE" placeholder="$"
                                        value="<?php echo $rows['otros_gastos'];?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Celular:</label>
                                    <input type="text" id="celular" placeholder="$"
                                        value="<?php echo $rows['celular'];?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Educación:</label>
                                    <input type="text" id="educacion" placeholder="$"
                                        value="<?php echo $rows['educacion'];?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Total semanal:</label>
                                    <input type="text" id="totalsemanalE" placeholder="$"
                                        value="<?php echo $rows['total_semanal'];?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Total mensual:</label>
                                    <input type="text" id="totalmensualE" placeholder="$"
                                        value="<?php echo $rows['total_mensual'];?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-3">
                                <a href="familias.php" class="btn btn-lg btn-primary"
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
    </div>

    <?php
    require('footer.html');
    ?>
</body>


</html>