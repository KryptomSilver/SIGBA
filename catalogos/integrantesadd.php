<!DOCTYPE html>
<html lang="en">
<?php
$idfamilia = $_GET['idfamilia'];

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/datatables.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <script src="../Frameworks/js/alert.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    require('header.html');
    ?>
    <h1 class="titulo">Integrante</h1>
    <hr>
    <div class="tabla-lg">
        <form id="integrantesadd" method="post">
            <input type="hidden" id="idfamilia" name="">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <div class="form-check-inline">
                            <label for="">Titular de familia:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="titular" id="titular" value="Si"
                                    required>
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="titular" id="titular" value="No"
                                    required>
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
                        <input type="text" id="curp" class="form-control" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Estado civil:</label>
                        <select name="" id="estado_civil" class="form-control" required>
                            <option value="soltero">Soltero/a</option>
                            <option value="comprometido">comprometido/a</option>
                            <option value="casado">casado</option>
                            <option value="union libre">Union libre</option>
                            <option value="separado">separado/a</option>
                            <option value="divorciado">divorciado/a</option>
                            <option value="viudo">viudo/a</option>

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
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Padre:</label>
                        <input type="text" placeholder="$" id="padre" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Madre:</label>
                        <input type="text" id="madre" placeholder="$" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Hijos:</label>
                        <input type="text" id="hijos" placeholder="$" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Becas:</label>
                        <input type="text" id="becas" placeholder="$" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Pensión:</label>
                        <input type="text" id="pension" placeholder="$" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Otros:</label>
                        <input type="text" id="otros" placeholder="$" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Talla:</label>
                        <input type="text" id="entidad" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Peso:</label>
                        <input type="text" id="entidad" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Adultos mayores:</label>
                        <input type="text" id="adultos" placeholder="$" class="form-control" required>
                    </div>
                </div>

                <div class="col-6">
                    <div class="formulario z">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nivel de estudios:</label>
                                    <select name="" id="nivel_estudios" class="form-control" required>
                                        <option value="">Kinder</option>
                                        <option value="">Primaria</option>
                                        <option value="">Secundaria</option>
                                        <option value="">Bachillerato</option>
                                        <option value="">Profesional</option>
                                        <option value="">Maestria</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Grado:</label>
                                <select name="" id="grado" class="form-control" required>
                                    <option value="">Opción 1</option>
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