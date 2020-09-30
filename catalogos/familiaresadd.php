<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Familiares</title>
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/datatables.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <script type="text/javascript" src="../../../Frameworks/js/alerts.js"></script>
</head>

<body>
    <div>
        <h1 class="titulo"><span><img src="../img/logo.webp" class="logo"></span>BANCO DE ALIMENTOS DE COLIMA</h1>
    </div>
    <?php 
        require('header.html');
    ?>
    <h1 class="titulo">Registro de Familiares</h1>
    <hr>
    <div class="tabla-lg">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="">Nombre:</label>
                    <input class="form-control" id="nombre" type="text" minlength="1" maxlength="50" required>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-3">
                        <label class="controls-label">Sexo:</label>
                        <div class="form-check ">
                            <input name="sexo" class="form-check-input" value="SI" id="recibo" type="radio"
                                id="inlineCheckbox1" required>
                            <label class="form-check-label" for="inlineCheckbox1">Hombre</label>
                        </div>
                        <div class="form-check ">
                            <input name="sexo" class="form-check-input" value="NO" id="recibo" type="radio"
                                id="inlineCheckbox2" required>
                            <label class="form-check-label" for="inlineCheckbox2">Mujer</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="">Fecha de Nacimiento:</label>
                    <input class="form-control" id="fecha" type="date" required>
                </div>
            </div>
            <div class="col-3">

                <div class="form-group">
                    <label class="">Edad:</label>
                    <div class="row">
                        <div class="col-6">
                            <div class=" form-check-inline ">
                                <input class="form-control " id="edad" type="text" disabled required>Años
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-8">
                        <label class="controls-label">Jefe de Familia:</label>
                        <div class="form-check ">
                            <input name="jefe" class="form-check-input" value="SI" id="recibo" type="radio"
                                id="inlineCheckbox1" required>
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                        </div>
                        <div class="form-check ">
                            <input name="jefe" class="form-check-input" value="NO" id="recibo" type="radio"
                                id="inlineCheckbox2" required>
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="">Ocupación:</label>
                    <select name="" class="form-control" id="ocupacion">
                        <option value="">Ocupación 1</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="controls-label">Estudios:</label>
                            <select name="" class="form-control " id="ocupacion">
                                <option value="">Primaria</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 formulario_borde">
                        <div class="row">
                            <div class="col-11">
                                <div class="form-group">
                                    <label class="controls-label">Grado:</label>
                                    <select name="" class="form-control mx-3" id="ocupacion">
                                        <option value="">Grado 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <div class=" form-check-inline ">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input name="grado" class="form-check-input" value="SI" id="recibo"
                                                    type="radio" id="inlineCheckbox1" required>
                                                <label class="form-check-label" for="inlineCheckbox1">Terminado</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input name="grado" class="form-check-input" value="SI" id="recibo"
                                                    type="radio" id="inlineCheckbox1" required>
                                                <label class="form-check-label" for="inlineCheckbox1">Trunco</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input name="grado" class="form-check-input" value="SI" id="recibo"
                                                    type="radio" id="inlineCheckbox1" required>
                                                <label class="form-check-label" for="inlineCheckbox1">Proceso</label>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-check" id="seguircheck">
                                    <input name="sexo" class="form-check-input" value="SI" id="recibo" type="checkbox"
                                        id="inlineCheckbox1" required>
                                    <label class="form-check-label" for="inlineCheckbox1">Desea seguir
                                        estudiando</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="">Servicios Médicos:</label>
                    <select name="" class="form-control" id="ocupacion">
                        <option value="">Servicio 1</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-3">
                <a href="familiaslista.php" class="btn btn-lg btn-primary" title="Ir la página anterior">Cancelar</a>
            </div>
            <div class="col-2"></div>
            <div class="col-3">
                <button class="btn btn-lg btn-primary" type="submit">Guardar</button>
            </div>

        </div>
    </div>
    <?php
    require('footer.html');
    ?>
</body>

</html>