<!DOCTYPE html>
<html lang="en">

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
        <form action="" id="familias_add">
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
                                        </span></a>
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
                                    <select id="municipio"  class="form-control" onchange="cambiarcolonias()"
                                        required>
                                        <?php  while ($municipios = mysqli_fetch_array($resultado)) { ?>
                                        <option value="<?php echo $municipios['id'];?>">
                                            <?php echo $municipios['nombre'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Colonia:</label>

                                    <select id="colonia" class="form-control" required>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="">Calle:</label>
                                    <input type="text" id="calle" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="">Nº exterior:</label>
                                    <input type="text" id="numext" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="">Nº interior:</label>
                                    <input type="text" id="numint" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Calle colindante 1:</label>
                                    <input type="text" id="callecol1" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Calle colindante 2:</label>
                                    <input type="text" id="callecol2" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="">Teléfono:</label>
                                    <input type="text" id="telefono" class="form-control" required>
                                </div>

                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="">Nº integrantes:</label>
                                    <input type="number" min="1" max="10" id="integrantes" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="">Ingreso total familiar:</label>
                                    <input type="text" id="ingreso" class="form-control" placeholder="$" required>
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
                                    <select id="tenencia" class="form-control" required>
                                        <option value="Propia">Propia</option>
                                        <option value="Prestada">Prestada</option>
                                        <option value="Pagándose">Pagándose</option>
                                        <option value="Rentada">Rentada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Nº Cuartos</label>
                                    <input type="number" min="1" max="10" id="cuartos" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Nº Familias Habitándola</label>
                                    <input type="number"  min="1" max="10"id="numfamilias" class="form-control" required>
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
                                    <input type="text" id="vivienda" placeholder="$" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Alimentación:</label>
                                    <input type="text" id="alimentacion" placeholder="$" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Luz:</label>
                                    <input type="text" id="luz" placeholder="$" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Gas:</label>
                                    <input type="text" id="gas" placeholder="$" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Agua:</label>
                                    <input type="text" id="agua" placeholder="$" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Atención medica:</label>
                                    <input type="text" id="atencionM" placeholder="$" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Teléfono:</label>
                                    <input type="text" id="telefonoE" placeholder="$" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Transporte:</label>
                                    <input type="text" id="transporte" placeholder="$" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Otros gastos:</label>
                                    <input type="text" id="otrosE" placeholder="$" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Celular:</label>
                                    <input type="text" id="celular" placeholder="$" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Educación:</label>
                                    <input type="text" id="educacion" placeholder="$" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Total semanal:</label>
                                    <input type="text" id="totalsemanalE" placeholder="$" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Total mensual:</label>
                                    <input type="text" id="totalmensualE" placeholder="$" class="form-control" required>
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