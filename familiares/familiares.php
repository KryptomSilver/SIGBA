<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Familiares</title>
    <link rel="stylesheet" href="../Frameworks/css/menu.css">
</head>

<body>
    <div>
        <h1 class="titulo"><span><img src="../img/logo.webp" class="logo"></span>BANCO DE ALIMENTOS DE COLIMA</h1>
    </div>
    <?php 
        require('header.html');
    ?>
    <div class="formulario z">
        <h1 class="titulo">Agregar Familiar</h1>
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
                            <input name="sexo"class="form-check-input" value="SI" id="recibo" type="radio" id="inlineCheckbox1"
                                required>
                            <label class="form-check-label" for="inlineCheckbox1">Hombre</label>
                        </div>
                        <div class="form-check ">
                            <input name="sexo"class="form-check-input" value="NO" id="recibo" type="radio" id="inlineCheckbox2"
                                required>
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
                    <input class="form-control" id="fecha" type="date"  required>
                </div>
            </div>
            <div class="col-3">
                
                    <div class="form-group">
                        <label class="">Edad:</label>
                        <div class="row">
                            <div class="col-4">
                                <input class="form-control " id="edad" type="text" disabled  required>
                            </div>
                        </div>
                    </div>
            
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-8">
                        <label class="controls-label">Jefe de Familia:</label>
                        <div class="form-check ">
                            <input name="jefe"class="form-check-input" value="SI" id="recibo" type="radio" id="inlineCheckbox1"
                                required>
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                        </div>
                        <div class="form-check ">
                            <input name="jefe"class="form-check-input" value="NO" id="recibo" type="radio" id="inlineCheckbox2"
                                required>
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="">Ocupacion:</label>
                    <select name="" class="form-control"id="ocupacion">
                        <option value="">Ocupacion 1</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-9 formulario_borde">
                        <div class="row">
                        <div class="col-11">
                            <div class="form-group">
                                <label class="controls-label">Grado:</label>
                                <select name="" class="form-control mx-3"id="ocupacion">
                                    <option value="">Grado 1</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                            <div class="form-check form-check-inline">
                            <div class="form-check">
                                <input name="grado"class="form-check-input" value="SI" id="recibo" type="radio" id="inlineCheckbox1"
                                    required>
                                    <label class="form-check-label" for="inlineCheckbox1">Terminado</label>
                            </div>
                            <div class="form-check">
                                <input name="grado"class="form-check-input" value="SI" id="recibo" type="radio" id="inlineCheckbox1"
                                    required>
                                    <label class="form-check-label" for="inlineCheckbox1">Trunco</label>
                            </div>
                            <div class="form-check">
                                <input name="grado"class="form-check-input" value="SI" id="recibo" type="radio" id="inlineCheckbox1"
                                    required>
                                    <label class="form-check-label" for="inlineCheckbox1">Proceso</label>
                            </div> 
                        </div>
                        <div class="form-check">
                                <input name="sexo"class="form-check-input" value="SI" id="recibo" type="checkbox" id="inlineCheckbox1"
                                    required>
                                    <label class="form-check-label" for="inlineCheckbox1">Desea Seguir Estudiando</label>
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
                    <label class="">Servicios Medicos:</label>
                    <select name="" class="form-control"id="ocupacion">
                        <option value="">Servicio 1</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <?php
    require('footer.html');
    ?>
</body>

</html>