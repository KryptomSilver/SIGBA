<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/datatables.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <script src="../Frameworks/js/alert.js"></script>
    <script src="../Frameworks/jQuery/jquery.js"></script>
    <script src="../Frameworks/js/integrantes/integrantesproceso.js"></script>
    <title>Document</title>
</head>
<?php 
$id = $_GET['id'];
$idf = $_GET['idfamilia'];
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
    <h1 class="titulo">Agregar integrante</h1>
    <hr>
    <div class="tabla-lg">
        <form id="integrantesupdate" method="post">
            <input type="hidden" id="id" value="<?=$id?>">
            <input type="hidden" id="idfamilia" value="<?=$idf?>">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <div class="form-check-inline">
                            <label for="">Titular de familia:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="titular" id="titular"
                                    <?php if($gefe=='SI') print "checked=true"?> value="SI" required>
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="titular" id="titular"
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
                        <input type="text" id="apellido1"value="<?=$rows['apellido1']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Apellido materno:</label>
                        <input type="text" id="apellido2"value="<?=$rows['apellido2']?>" class="form-control" required>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="">CURP:</label>
                        <input type="text" id="curp"value="<?=$rows['curp']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Estado civil:</label>
                        <select name="" id="estado_civil" class="form-control" required>
                            <option value="soltero" <?php if($rows['estado_civil']=='soltero') print "selected"?>>Soltero/a</option>
                            <option value="comprometido" <?php if($rows['estado_civil']=='comprometido') print "selected"?>>comprometido/a</option>
                            <option value="casado" <?php if($rows['estado_civil']=='casado') print "selected"?>>casado</option>
                            <option value="union libre" <?php if($rows['estado_civil']=='union libre') print "selected"?>>Union libre</option>
                            <option value="separado" <?php if($rows['estado_civil']=='separado') print "selected"?>>separado/a</option>
                            <option value="divorciado" <?php if($rows['estado_civil']=='divorciado') print "selected"?>>divorciado/a</option>
                            <option value="viudo" <?php if($rows['estado_civil']=='viudo') print "selected"?>>viudo/a</option>

                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Ocupación:</label>
                        <select name="" id="ocupacion" class="form-control" required>
                            <option value="rr">Opción 1</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Parentesco:</label>
                        <select name="" id="parentesco" class="form-control" required>
                            <option value="Padre" <?php if($rows['parentesco']=='Padre') print "selected"?>>Padre</option>
                            <option value="Madre" <?php if($rows['parentesco']=='Madre') print "selected"?>>Madre</option>
                            <option value="Conyuge" <?php if($rows['parentesco']=='Conyuge') print "selected"?>>Cónyuge</option>
                            <option value="Hijo" <?php if($rows['parentesco']=='Hijo') print "selected"?>>Hijo</option>
                            <option value="Primo" <?php if($rows['parentesco']=='Primo') print "selected"?>>Primo</option>
                            <option value="Hermano" <?php if($rows['parentesco']=='Hermano') print "selected"?>>Hermano</option>
                            <option value="Sobrino" <?php if($rows['parentesco']=='Sobrino') print "selected"?>>Sobrino</option>
                            <option value="Nieto" <?php if($rows['parentesco']=='Nieto') print "selected"?>>Nieto</option>
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
                        <input type="text" id="entidad"value="<?=$rows['entidad']?>"  class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Padre:</label>
                        <input type="text" placeholder="$"value="<?=$rows['padre']?>"  id="padre" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Madre:</label>
                        <input type="text" id="madre" placeholder="$"value="<?=$rows['madre']?>"  class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Hijos:</label>
                        <input type="text" id="hijos" placeholder="$"value="<?=$rows['hijos']?>"  class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Becas:</label>
                        <input type="text" id="becas" placeholder="$"value="<?=$rows['becas']?>"  class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Pensión:</label>
                        <input type="text" id="pension" placeholder="$" value="<?=$rows['pension']?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Adultos mayores:</label>
                        <input type="text" id="adultos" placeholder="$" value="<?=$rows['adultos']?>"class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Talla:</label>
                        <input type="text" id="talla" value="<?=$rows['talla']?>"class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Peso:</label>
                        <input type="text" id="peso" value="<?=$rows['peso']?>" class="form-control" required>
                    </div>
                </div>

                <div class="col-6">
                    <div class="formulario z">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nivel de estudios:</label>
                                    <select name="" id="nivel_estudios" class="form-control" required>
                                        <option value="Kinder" <?php if($rows['nivel_estudios']=='Kinder') print "selected"?>>Kinder</option>
                                        <option value="Primaria" <?php if($rows['nivel_estudios']=='Primaria') print "selected"?>>Primaria</option>
                                        <option value="Secundaria" <?php if($rows['nivel_estudios']=='Secundaria') print "selected"?>>Secundaria</option>
                                        <option value="Bachillerato" <?php if($rows['nivel_estudios']=='Bachillerato') print "selected"?>>Bachillerato</option>
                                        <option value="Profesional" <?php if($rows['nivel_estudios']=='Profesional') print "selected"?>>Profesional</option>
                                        <option value="Maestria" <?php if($rows['nivel_estudios']=='Maestria') print "selected"?>>Maestria</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Grado:</label>
                                <select name="" id="grado" class="form-control" required>
                                    <option value="hola">Opción 1</option>
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
                                                value="TRUNCO" <?php if($estado=='TRUNCO') print "checked=true"?>  required>
                                            <label class="form-check-label" for="inlineRadio1">Trunco</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="estado" id="estado"
                                                value="TERMINADO" <?php if($estado=='TERMINADO') print "checked=true"?>required>
                                            <label class="form-check-label" for="inlineRadio2">Terminado</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="estado" id="estado"
                                                value="PROCESO" <?php if($estado=='PROCESO') print "checked=true"?>required>
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
            <br>
            <div class="row">
                <div class="col-5"></div>
                <div class="col-3">
                    <a href="integrantes.php?idfamilia=<?php echo $idfamilia; ?>" class="btn btn-lg btn-primary"
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