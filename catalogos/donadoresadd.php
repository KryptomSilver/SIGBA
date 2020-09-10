<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <script src="../Frameworks/jQuery/jquery.js"></script>
    <script src="../Frameworks/js/alert.js"></script>
    <script src="../Frameworks/js/donadores/donadoresproceso.js" type="text/javascript"></script>

    <title>SIGBA</title>
</head>
<?php 
$rfc = $_GET['rfc'];
?>

<body>

    <?php
    require('header.html');
    ?>
    <h1 class="titulo">Donadores</h1>
    <hr>
    <div class="tabla-lg">

        <form id="donadores_add" method="post">
            <input type="hidden" id="donador" value="1">
            <div class="row">
                <div class="col-1">
                    <label class="controls-label">Recibo:</label>
                </div>
                <div class="col-11">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" value="SI" type="radio" name="recibo" id="recibo" required>
                        <label class="form-check-label" for="inlineCheckbox1">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" value="NO" name="recibo" type="radio" id="recibo" required>
                        <label class="form-check-label" for="inlineCheckbox2">NO</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label class="">Razon social:</label>
                        <input class="form-control" id="razon" type="text" minlength="1" maxlength="50" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="">RFC:</label>
                        <input type="text"
                            pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$"
                            title="introduzca un RFC valido" value="<?php echo $rfc;?>" id="rfc" class="form-control"
                            required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="">Calle:</label>
                        <input type="text" minlength="1" maxlength="50" id="calle" class="form-control" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="">Num Ext:</label>
                        <input type="text" id="numext" class="form-control">

                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="">Num Int:</label>
                        <input type="text" id="numint" class="form-control ">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="">Codigo Postal:</label>
                        <input type="text" pattern="[0-9]{5}" title="Introduzca un codigo postal valido" id="codpostal"
                            class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <div class="form-group">
                        <label class="">Colonia:</label>
                        <input type="text" id="colonia" minlength="1" maxlength="50" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="">Nombre de contacto:</label>
                        <input type="text" minlength="1" maxlength="50" id="contacto" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="">Telefono:</label>
                        <input type="text" id="telefono" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="">Celular:</label>
                        <input type="text" id="celular" pattern="[0-9]{10}" title="Introduzca un celular valido"
                            class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="">Correo:</label>
                        <input type="email" id="correo" maxlength="50" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-3">
                    <a href="donadores.php" class="btn btn-lg btn-primary" title="Ir la página anterior">Cancelar</a>
                </div>
                <div class="col-2"></div>
                <div class="col-3">
                    <button class="btn btn-lg btn-primary" type="submit">Guardar</button>
                </div>

            </div>
        </form>
    </div>
    
    <br>
    <?php
    require('footer.html');
    ?>
</body>

</html>
