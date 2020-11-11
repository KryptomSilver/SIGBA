<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/datatables.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <script src="../Frameworks/js/alert.js"></script>
    <script src="../Frameworks/js/alerts.js"></script>
    <script src="../Frameworks/jQuery/jquery.js"></script>
    <script src="../Frameworks/js/integrantes/integrantesproceso.js"></script>
    <title>Document</title>
</head>
<?php 
$id

 = $_GET['id'];
$pag = $_GET['pag'];
require('procesos/conexion.php');
$sql = " SELECT  * from integrantes WHERE id = '$id' ";
$resultado = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($resultado);
$gefe=$rows['gefe_familia'];
$estado=$rows['estado_estudio'];
?>

<body>
    <?php
    require('header.html');
    ?>
    <h1 class="titulo">Actualizar integrante</h1>
    <hr>
    <div class="tabla-lg">
        <form id="integrantesupdate" method="post">
            <input type="hidden" id="id" value="<?=$id?>">
            <input type="hidden" id="idfam" value="<?=$pag?>">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <div class="form-check-inline">
                            <label for="">Titular de familia:</label>
                            <div class="form-check">
                                <input class="form-check-input" value="SI" type="radio" name="titular"
                                    <?php if($gefe=='SI') print "checked=true"?> required>
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="NO" type="radio" name="titular"
                                    <?php if($gefe=='NO') print "checked=true"?> value="NO" required>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-9"></div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Nombre:</label>
                        <input type="text" id="nombre" class="form-control" value="<?=$rows['nombre']?>" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Apellido paterno:</label>
                        <input type="text" id="apellido1" value="<?=$rows['apellido1']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Apellido materno:</label>
                        <input type="text" id="apellido2" value="<?=$rows['apellido2']?>" class="form-control" required>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="">CURP:</label>
                        <input type="text" id="curp" value="<?=$rows['curp']?>"
                            pattern="^([A-Z&]|[a-z&]{1})([AEIOU]|[aeiou]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9]{2})$"
                            class="form-control" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Estado civil:</label>
                        <select name="" id="estado_civil" class="form-control" required>
                            <option value="soltero" <?php if($rows['estado_civil']=='soltero') print "selected"?>>
                                Soltero/a</option>
                            <option value="comprometido"
                                <?php if($rows['estado_civil']=='comprometido') print "selected"?>>Comprometido/a
                            </option>
                            <option value="casado" <?php if($rows['estado_civil']=='casado') print "selected"?>>Casado
                            </option>
                            <option value="union libre"
                                <?php if($rows['estado_civil']=='union libre') print "selected"?>>Union libre</option>
                            <option value="separado" <?php if($rows['estado_civil']=='separado') print "selected"?>>
                                Separado/a</option>
                            <option value="divorciado" <?php if($rows['estado_civil']=='divorciado') print "selected"?>>
                                Divorciado/a</option>
                            <option value="viudo" <?php if($rows['estado_civil']=='viudo') print "selected"?>>Viudo/a
                            </option>

                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Ocupación:</label>
                        <select name="" id="ocupacion" class="form-control" required>
                            <option value="Trabajador/a"
                                <?php if($rows['ocupacion']=='Trabajador/a') print "selected"?>>Trabajador/a</option>
                            <option value="Ama de casa" <?php if($rows['ocupacion']=='Ama de casa') print "selected"?>>
                                Ama de casa</option>
                            <option value="Estudiante" <?php if($rows['ocupacion']=='Estudiante') print "selected"?>>
                                Estudiante</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Parentesco:</label>
                        <select name="" id="parentesco" class="form-control" required>
                            <option value="Padre" <?php if($rows['parentesco']=='Padre') print "selected"?>>Padre
                            </option>
                            <option value="Madre" <?php if($rows['parentesco']=='Madre') print "selected"?>>Madre
                            </option>
                            <option value="Conyuge" <?php if($rows['parentesco']=='Conyuge') print "selected"?>>Cónyuge
                            </option>
                            <option value="Hijo" <?php if($rows['parentesco']=='Hijo') print "selected"?>>Hijo</option>
                            <option value="Primo" <?php if($rows['parentesco']=='Primo') print "selected"?>>Primo
                            </option>
                            <option value="Hermano" <?php if($rows['parentesco']=='Hermano') print "selected"?>>Hermano
                            </option>
                            <option value="Sobrino" <?php if($rows['parentesco']=='Sobrino') print "selected"?>>Sobrino
                            </option>
                            <option value="Nieto" <?php if($rows['parentesco']=='Nieto') print "selected"?>>Nieto
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Sexo:</label>
                        <select name="" id="sexo" class="form-control" required>
                            <option value="H" <?php if($rows['sexo']=='H') print "selected"?>>Hombre</option>
                            <option value="M" <?php if($rows['sexo']=='M') print "selected"?>>Mujer</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Fecha de nacimiento:</label>
                        <input type="date" id="fecha" class="form-control" value="<?=$rows['fecha_nac']?>" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Entidad de nacimiento:</label>
                        <select name="" id="entidad" class="form-control">
                        <?php 
                        $query = "SELECT * FROM  estados";
                        $rowsi = mysqli_query($conn,$query);
                        while($rowi = mysqli_fetch_assoc($rowsi)){
                        ?>
                        <option value="<?=$rowi['id']?>"  <?php if ($rowi['id']== $rows['fk_estado']) {echo "selected";} ?>><?=$rowi['estado']?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Talla:</label>
                        <input type="text" id="talla" value="<?=$rows['talla']?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Peso:</label>
                        <input type="text" id="peso" value="<?=$rows['peso']?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Ingresos:</label>
                        <input type="text" id="ingresos" value="<?=$rows['ingresos']?>" class="form-control" required>
                    </div>

                </div>

                <div class="col-6">
                    <div class="formulario z">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nivel de estudios:</label>
                                    <?php include('procesos/conexion.php');
                                    $queryf = "SELECT * FROM nivel_estudios";
                                    $resultadof = mysqli_query($conn,$queryf);
                                    ?>
                                    <select name="" id="nivel_estudios" class="form-control" onchange="cargargrados()"
                                        required>
                                        <?php  while ($nivel = mysqli_fetch_array($resultadof)) { ?>
                                        <option value="<?=$nivel['id']?>"
                                            <?php if ($rows['nivel_estudios'] == $nivel['id']) { echo "selected";}?>>
                                            <?=$nivel['nombre']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Grado:</label>
                                <?php include('procesos/conexion.php');
                                    $idnivel = $rows['nivel_estudios'];
                                    $queryc = "SELECT * FROM grado where fk_nivel_estudios ='$idnivel'";
                                    $resultadoc = mysqli_query($conn,$queryc);
                                    ?>

                                <select id="grado" class="form-control" required>
                                    <?php  while ($grados = mysqli_fetch_array($resultadoc)) { ?>
                                    <option value="<?=$grados['id']?>"
                                        <?php if ($rows['grado'] == $grados['id']) { echo "selected";}?>>
                                        <?=$grados['grado']?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Estado:</label>
                                    <div class="form-check-inline">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="estado" id="estado"
                                                value="TRUNCO" <?php if($estado=='TRUNCO') print "checked=true"?>
                                                required>
                                            <label class="form-check-label" for="inlineRadio1">Trunco</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="estado" id="estado"
                                                value="TERMINADO"
                                                <?php if($estado=='TERMINADO') print "checked=true"?>required>
                                            <label class="form-check-label" for="inlineRadio2">Terminado</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="estado" id="estado"
                                                value="PROCESO"
                                                <?php if($estado=='PROCESO') print "checked=true"?>required>
                                            <label class="form-check-label" for="inlineRadio2">Proceso</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <br>
            <div class="row">
                <div class="col-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input " type="checkbox" onchange="checkinput();" id="pension"<?php if ($rows['pension']>0) {echo "checked";}?>>
                        <label class="form-check-label " for="">Pensión</label>
                    </div>
                    <div class="form-group">
                        <input type="text" id="pensioni" value="<?=$rows['pension']?>" class="form-control"<?php if ($rows['pension']<=0) {echo "disabled";}?> >
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input " type="checkbox" id="adultos"onchange="checkinput();"  <?php if ($rows['adultos']>0) {echo "checked";}?>>
                        <label class="form-check-label" for="adultos">Adultos mayores</label>
                    </div>
                    <div class="form-group">
                        <input type="text" id="adultosi" value="<?=$rows['adultos']?>" class="form-control"<?php if ($rows['adultos']<=0) {echo "disabled";}?>>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input " type="checkbox" id="becas" onchange="checkinput();" <?php if ($rows['becas']>0) {echo "checked";}?>>
                        <label class="form-check-label" for="becas">Becas</label>
                    </div>
                    <div class="form-group">
                        <input type="text" id="becasi" value="<?=$rows['becas']?>" class="form-control" <?php if ($rows['becas']<=0) {echo "disabled";}?>>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input " type="checkbox" id="otros"onchange="checkinput();"  <?php if ($rows['otros']>0) {echo "checked";}?>>
                        <label class="form-check-label" for="otros">Otros</label>
                    </div>
                    <div class="form-group">
                        <input type="text" id="otrosi" value="<?=$rows['otros']?>" class="form-control" <?php if ($rows['otros']<=0) {echo "disabled";}?>>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-5"></div>
                <div class="col-3">
                    <a href="familiasupdate.php?idfamilia=<?=$pag?>" class="btn btn-lg btn-primary"
                        title="Ir la página anterior">Cancelar</a>

                </div>
                <div class="col-1"></div>
                <div class="col-3">
                    <button class="btn btn-lg btn-primary" type="submit">Guardar</button>
                </div>
            </div>
        </form>
    </div>

    <?php
    require('footer.html');
    ?>
</body>

</html>