<!DOCTYPE html>
<html lang="en">
<?php
$idfamilia = $_GET['idfamilia'];

require('procesos/conexion.php');
$sql = " SELECT  gefe_familia from integrantes WHERE fk_familia = '$idfamilia' ";
$resultado = mysqli_query($conn, $sql);
$gefe = 0;
while ($rows = mysqli_fetch_assoc($resultado)) {
    if ($rows['gefe_familia'] == 'SI') {
        $gefe = 1;
       
    }
}
?>

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
    <title>SIGBA</title>
</head>

<body>
    <?php
    require('header.html');
    ?>
    <h1 class="titulo">Integrante</h1>
    <hr>
    <div class="tabla-lg">
        <form id="integrantesadd" method="post">
            <input type="hidden" id="idfamilia" value="<?php echo $idfamilia;?>"name="">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <div class="form-check-inline">
                            <label for="">Titular de familia:</label>
                            <?php 
                            if ($gefe == 1) {
                            ?>
                             <div class="form-check">
                                <input class="form-check-input" type="radio" name="titular" id="titular" value="SI"
                                    required disabled>
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input"checked="true" type="radio" name="titular" id="titular" value="NO"
                                    required disabled>
                                <label class="form-check-label"  for="inlineRadio2">No</label>
                            </div>
                            <?php
                            } else {
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="titular" id="titular" value="SI"
                                    required>
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="titular" id="titular" value="NO"
                                    required>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <?php }?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-9"></div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Nombre:</label>
                        <input type="text" id="nombre" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Apellido paterno:</label>
                        <input type="text" id="apellido1" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Apellido materno:</label>
                        <input type="text" id="apellido2" class="form-control" required>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="">CURP:</label>
                        <input type="text" title="Introducir valor valido" id="curp" pattern="^([A-Z&]|[a-z&]{1})([AEIOU]|[aeiou]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9]{2})$" class="form-control" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Estado civil:</label>
                        <select name="" id="estado_civil" class="form-control" required>
                            <option value="soltero">Soltero/a</option>
                            <option value="comprometido">Comprometido/a</option>
                            <option value="casado">Casado</option>
                            <option value="union libre">Union libre</option>
                            <option value="separado">Separado/a</option>
                            <option value="divorciado">Divorciado/a</option>
                            <option value="viudo">Viudo/a</option>

                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Ocupación:</label>
                        <select name="" id="ocupacion" class="form-control" required>
                            <option value="Trabajador/a">Trabajador/a</option>
                            <option value="Ama de casa">Ama de casa</option>
                            <option value="Estudiante">Estudiante</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Parentesco:</label>
                        <select name="" id="parentesco" class="form-control" required>
                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Conyuge">Cónyuge</option>
                            <option value="Hijo">Hijo</option>
                            <option value="Primo">Primo</option>
                            <option value="Hermano">Hermano</option>
                            <option value="Sobrino">Sobrino</option>
                            <option value="Nieto">Nieto</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Sexo:</label>
                        <select name="" id="sexo" class="form-control" required>
                            <option value="H">Hombre</option>
                            <option value="M">Mujer</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Fecha de nacimiento:</label>
                        <input type="date" id="fecha" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Entidad de nacimiento:</label>
                        <input type="text" id="entidad" class="form-control" required>
                    </div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Talla:</label>
                        <input type="text" id="talla" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Peso:</label>
                        <input type="text" id="peso" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Ingresos:</label>
                        <input type="text" id="ingresos" class="form-control" required>
                    </div>
                </div>

                <div class="col-6">
                    <div class="formulario z">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nivel de estudios:</label>
                                    <?php include('procesos/conexion.php');
                                    $query = "SELECT * FROM nivel_estudios";
                                    $resultado = mysqli_query($conn,$query);
                                    
                                    ?>
                                    <select name="" id="nivel_estudios" onchange="cargargrados()" class="form-control" required>
                                        <option selected>Seleccione un opcion</option>
                                        <?php  while ($nivel = mysqli_fetch_array($resultado)) { ?>
                                        <option value="<?=$nivel['id']?>"><?=$nivel['nombre']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Grado:</label>
                                <select name="" id="grado" class="form-control" required>

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
                                                value="TRUNCO" required>
                                            <label class="form-check-label" for="inlineRadio1">Trunco</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="estado" id="estado"
                                                value="TERMINADO" required>
                                            <label class="form-check-label" for="inlineRadio2">Terminado</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="estado" id="estado"
                                                value="PROCESO" required>
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
                    <a href="familiasadd.php" class="btn btn-lg btn-primary"
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
