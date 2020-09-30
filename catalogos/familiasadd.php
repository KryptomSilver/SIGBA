<?php error_reporting(0)   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Frameworks/jQuery/jquery.js"></script>
    <script src="../Frameworks/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <script src="../Frameworks/js/alert.js" type="text/javascript"></script>
    <script src="../Frameworks/js/alerts.js" type="text/javascript"></script>
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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="navmenu">
                        <ul class="tabs">
                            <li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Datos
                                        generales</span></a>
                            </li>
                            <li><a href="#tab2"><span class="fa fa-briefcase"></span><span
                                        class="tab-text">Integrantes</span></a>
                            </li>
                            <li><a href="#tab3"><span class="fa fa-group"></span><span
                                        class="tab-text">Vivienda</span></a>
                            </li>
                            <li><a href="#tab4"><span class="fa fa-bookmark"></span><span
                                        class="tab-text">Egresos</span></a>
                            </li>
                            <li><a href="#tab5"><span class="fa fa-briefcase"></span><span
                                        class="tab-text">Ingresos</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="secciones">
                <!-- datos generales-->
                <?php
                include('procesos/conexion.php');
                $sql = "SELECT * FROM familias where estatus = 0";
                $resultado = mysqli_query($conn,$sql);
                $rows = mysqli_fetch_array($resultado);
                ?>
                <div class="hide" id="tab1">
                    <form action="" id="familias">
                        <input type="hidden" id="idv" value="<?=$rows['id']?>">
                        <input type="hidden" id="estatus"
                            value="<?php if(isset( $rows['estatus'])){echo  $rows['estatus'];}else{echo 1;}?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Municipio:</label>
                                    <?php include('procesos/conexion.php');
                                    $query = "SELECT * FROM municipios";
                                    $resultado = mysqli_query($conn,$query);
                                    
                                    ?>
                                    <select id="municipio" class="form-control" onchange="cambiarcolonias()" required>
                                        <option selected>Seleccione un opcion</option>
                                        <?php  while ($municipios = mysqli_fetch_array($resultado)) { ?>
                                        <option value="<?=$municipios['id']?>"
                                            <?php if ($rows['municipio'] == $municipios['id']) { echo "selected";}?>>
                                            <?=$municipios['nombre']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">

                                    <label for="">Colonia:</label>
                                    <?php include('procesos/conexion.php');
                                    $idcol = $rows['municipio'];
                                    $queryc = "SELECT * FROM colonias where fk_municipio ='$idcol'";
                                    $resultadoc = mysqli_query($conn,$queryc);
                                    
                                    ?>
                                    <select id="colonia" class="form-control" required>
                                        <option selected>Seleccione un opcion</option>
                                        <?php  while ($colonias = mysqli_fetch_array($resultadoc)) { ?>
                                        <option value="<?=$colonias['id']?>"
                                            <?php if ($rows['colonia'] == $colonias['id']) { echo "selected";}?>>
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
                                    <input type="text" id="calle" value="<?=$rows['calle']?>" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="">Nº exterior:</label>
                                    <input type="text" id="numext" value="<?=$rows['num_Externo']?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="">Nº interior:</label>
                                    <input type="text" id="numint" value="<?=$rows['num_Interno']?>"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Calle colindante 1:</label>
                                    <input type="text" id="callecol1" value="<?=$rows['calle_col1']?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Calle colindante 2:</label>
                                    <input type="text" id="callecol2" value="<?=$rows['calle_col2']?>"
                                        class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="">Teléfono:</label>
                                    <input type="text" id="telefono" value="<?=$rows['telefono']?>" class="form-control"
                                        required>
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nº integrantes:</label>
                                    <input type="number" min="1" max="10" id="integrantes"
                                        value="<?=$rows['integrantes']?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-2" hidden>
                                <div class="form-group">
                                    <label for="">Ingreso total familiar:</label>
                                    <input type="text" id="ingreso" class="form-control" placeholder="$">
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
                    </form>
                </div>
                <!-- integrantes --->
                <div class="hide" id="tab2">
                    <div class="tabla-lg">
                        <div class="row">
                            <div class="col-9"></div>
                            <div class="col-3">
                                <button class="btn btn-md btn-primary" onclick="verificar();">Agregar</button>
                            </div>
                        </div>
                        <table id="integrantes" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Jefe de familia</th>
                                    <th>Nombre</th>
                                    <th>Sexo</th>
                                    <th>CURP</th>
                                    <th>Fecha nacimiento</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tab">
                            </tbody>
                        </table>

                    </div>
                </div>
                <!--- vivienda --->
                <?php
                include('procesos/conexion.php');
                $idfam = $rows['id'];
                $sql = "SELECT * FROM vivienda where fk_familia = $idfam";
                $resultado = mysqli_query($conn,$sql);
                $rowsv= mysqli_fetch_array($resultado);
                ?>
                <div class="hide" id="tab3">
                    <input type="hidden" id="idvivenda" value="<?=$rowsv['id']?>">
                    <form action="" id="vivienda">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Tenencia:</label>
                                    <select id="tenencia" class="form-control" required>
                                        <option value="Propia"
                                            <?php if ($rowsv['tenencia'] == 'Propia') { echo "selected";} ?>>Propia
                                        </option>
                                        <option value="Prestada"
                                            <?php if ($rowsv['tenencia'] == 'Prestada') { echo "selected";} ?>>Prestada
                                        </option>
                                        <option value="Pagándose"
                                            <?php if ($rowsv['tenencia'] == 'Pagándose') { echo "selected";} ?>>
                                            Pagándose</option>
                                        <option value="Rentada"
                                            <?php if ($rowsv['tenencia'] == 'Rentada') { echo "selected";} ?>>Rentada
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Nº Cuartos</label>
                                    <input type="number" value="<?=$rowsv['num_Cuartos']?>" min="1" max="10"
                                        id="cuartos" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Nº Familias Habitándola</label>
                                    <input type="number" value="<?=$rowsv['num_Familias']?>" min="1" max="10"
                                        id="numfamilias" class="form-control" required>
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
                    </form>
                </div>


                <!--egresos-->
                <?php
                include('procesos/conexion.php');
                $sql = "SELECT * FROM egresos where fk_familia = $idfam";
                $resultado = mysqli_query($conn,$sql);
                $rowse= mysqli_fetch_array($resultado);
               
                ?>
                <div class="hide" id="tab4">
                    <input type="hidden" id="idegresos" value="<?=$rowse['id']?>">
                    <form id="egresos">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Vivienda:</label>
                                    <input type="text" id="v" placeholder="$" value="<?=$rowse['vivienda']?>"
                                        class="form-control sumar" onchange="sumar();" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Alimentación:</label>
                                    <input type="text" id="alimentacion" placeholder="$"
                                        value="<?=$rowse['alimentacion']?>" onchange="sumar();"
                                        class="form-control sumar" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Luz:</label>
                                    <input type="text" id="luz" placeholder="$" value="<?=$rowse['luz']?>"
                                        class="form-control sumar" onchange="sumar();" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Gas:</label>
                                    <input type="text" id="gas" placeholder="$" value="<?=$rowse['gas']?>"
                                        class="form-control sumar" onchange="sumar();" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Agua:</label>
                                    <input type="text" id="agua" placeholder="$" value="<?=$rowse['agua']?>"
                                        class="form-control sumar" onchange="sumar();" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Atención medica:</label>
                                    <input type="text" id="atencionM" placeholder="$"
                                        value="<?=$rowse['atencion_medica']?>" onchange="sumar();"
                                        class="form-control sumar" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Teléfono:</label>
                                    <input type="text" id="telefonoE" placeholder="$" onchange="sumar();"
                                        value="<?=$rowse['telefono']?>" class="form-control sumar" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Transporte:</label>
                                    <input type="text" id="transporte" placeholder="$" onchange="sumar();"
                                        value="<?=$rowse['transporte']?>" class="form-control sumar" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Otros gastos:</label>
                                    <input type="text" id="otrosE" placeholder="$" onchange="sumar();"
                                        value="<?=$rowse['otros_gastos']?>" class="form-control sumar" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Celular:</label>
                                    <input type="text" id="celular" placeholder="$" onchange="sumar();"
                                        value="<?=$rowse['celular']?>" class="form-control sumar" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Educación:</label>
                                    <input type="text" id="educacion" placeholder="$" onchange="sumar();"
                                        value="<?=$rowse['educacion']?>" class="form-control sumar" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Total semanal:</label>
                                    <input type="text" id="totalsemanalE" placeholder="$"
                                        value="<?=$rowse['total_mensual']?>" class="form-control" disabled required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Total mensual:</label>
                                    <input type="text" id="totalmensualE" placeholder="$"
                                        value="<?=$rowse['total_semanal']?>" class="form-control" disabled required>
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
                    </form>
                </div>
                <div class="hide" id="tab5">
                    <form id="ingresos">
                        <input type="hidden" id="estatusf" value="1">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <?php
                                include('procesos/conexion.php');
                                $sql = "select ingresos from integrantes WHERE fk_familia = $idfam and parentesco = 'Padre'";
                                $resultado = mysqli_query($conn,$sql);
                                $rowsi= mysqli_fetch_array($resultado);
                                ?>
                                    <label for="">Padre:</label>
                                    <input type="text" placeholder="$" value="<?=$rowsi['ingresos']?>" id="padre"
                                        class="form-control ingresos" disabled >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <?php
                                include('procesos/conexion.php');
                                $sql = "select ingresos from integrantes WHERE fk_familia = $idfam and parentesco = 'Madre'";
                                $resultado = mysqli_query($conn,$sql);
                                $rowsi= mysqli_fetch_array($resultado);
                                ?>
                                    <label for="">Madre:</label>
                                    <input type="text" id="madre" placeholder="$" value="<?=$rowsi['ingresos']?>"
                                        class="form-control ingresos" disabled >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <?php
                                include('procesos/conexion.php');
                                $sql = "select ingresos from integrantes WHERE fk_familia = $idfam and parentesco = 'Hijo'";
                                $resultado = mysqli_query($conn,$sql);
                                $rowsi= mysqli_fetch_array($resultado);
                                ?>
                                    <label for="">Hijos:</label>
                                    <input type="text" id="hijos" placeholder="$" value="<?=$rowsi['ingresos']?>"
                                        class="form-control ingresos" disabled >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Becas:</label>
                                    <input type="text" id="becas" placeholder="$" value="<?=$rowsi['becas']?>"
                                        class="form-control ingresos" disabled >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Otros:</label>
                                    <input type="text" id="otros" placeholder="$" value="<?=$rowsi['otros']?>"
                                        class="form-control ingresos" disabled >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Pensión:</label>
                                    <input type="text" id="pension" placeholder="$" value="<?=$rowsi['pension']?>"
                                        class="form-control ingresos" disabled >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Adultos mayores:</label>
                                    <input type="text" id="adultos" placeholder="$"
                                        value="<?=$rowsi['adultos_Mayores']?>" class="form-control ingresos" disabled
                                        >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Ingreso semanal:</label>
                                    <input type="text" id="ingresosem" placeholder="$"
                                        value="<?=$rowsi['total_Semanal']?>" class="form-control" disabled >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Ingreso mensual:</label>
                                    <input type="text" id="ingresomen" placeholder="$"
                                        value="<?=$rowsi['total_Mensual']?>" class="form-control" disabled >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9"></div>
                            <div class="col-3">
                                <button class="btn btn-lg btn-primary" type="submit">Terminar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <form id="formdelete" method="post">
        <input type="hidden" id="iddelete">
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        ¿Desea eliminar este registro?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
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