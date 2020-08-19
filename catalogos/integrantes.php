<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integrantes</title>
</head>

<body>
    <?php 
        require('header.html');
    ?>
    <br>
    <h1 class="titulo">Integrante</h1>
    <hr>
    <br>
    <div class="container">
        <form action="" id="integrantes">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <div class="form-check-inline">
                            <label for="">Titular de familia:</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1" required>
                                <label class="form-check-label" for="inlineRadio1">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2" required>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9"></div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Nombre completo:</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Sexo:</label>
                        <select name="" id="" class="form-control" required>
                            <option value="">Hombre</option>
                            <option value="">Mujer</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Entidad de nacimiento:</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="">CURP:</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Estado civil:</label>
                        <select name="" id="" class="form-control" required>
                            <option value="">Soltero</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Ocupación:</label>
                        <select name="" id="" class="form-control" required>
                            <option value="">Opción 1</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Parentesco:</label>
                        <select name="" id="" class="form-control" required>
                            <option value="">Opción 1</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Nivel de estudios:</label>
                        <select name="" id="" class="form-control" required>
                            <option value="">Opción 1</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <label for="">Grado:</label>
                    <select name="" id="" class="form-control" required>
                        <option value="">Opción 1</option>
                    </select>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="">Estado:</label>
                        <div class="form-check-inline">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1" required>
                                <label class="form-check-label" for="inlineRadio1">Trunco</label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2" required>
                                <label class="form-check-label" for="inlineRadio2">Terminado</label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2" required>
                                <label class="form-check-label" for="inlineRadio2">Proceso</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-5"></div>
                <div class="col-2">
                    <button href="" type="reset"class="btn btn-mg btn-primary" title="Ir la página anterior">Limpiar</button>
                </div>
                <div class="col-2"></div>
                <div class="col-3">
                    <button class="btn btn-md btn-primary" type="submit">Guardar</button>
                </div>
            </div>
        </form>
        <br>
        <hr>
        <h3 class="titulo">Integrantes</h3>
        <br>
        <div class="row">
            <div class="col-12">
                <table id="familiares" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
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
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Si</td>
                            <td>Abel Romero</td>

                            <td>Hombre</td>
                            <td>CURP</td>
                            <td>08/01/1998</td>
                            <td>Acciones</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Si</td>
                            <td>Abel Romero</td>

                            <td>Hombre</td>
                            <td>CURP</td>
                            <td>08/01/1998</td>
                            <td>Acciones</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Si</td>
                            <td>Abel Romero</td>

                            <td>Hombre</td>
                            <td>CURP</td>
                            <td>08/01/1998</td>
                            <td>Acciones</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    include('footer.html');
    ?>
</body>

</html>