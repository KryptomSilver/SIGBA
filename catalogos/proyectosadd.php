<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">

    <script   src="../Frameworks/jQuery/jquery.js"></script>

    <title>SIGBA</title>
</head>
<?php
$rfc = $_GET['rfc'];
?>

<body>

    <?php
    require('header.html');
    ?>

    <br>
    <main>
        <section>
            <div class="formulario z">
                <h1 class="titulo">Proyectos</h1>
                <form action="procesos/proyectoproceso.php?i=1" method="post">
                <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label class="">Razon social:</label>
                                <input class="form-control" name="razon" type="text"required>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="">RFC:</label>
                                <input type="text" pattern = "^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$" title = "introduzca un RFC valido" value="<?php echo $rfc;?>" name="rfc" class="form-control"required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="">Calle:</label>
                                <input type="text" name="calle" class="form-control"required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="">Num Ext:</label>
                                <input type="text" name="numext" class="form-control">

                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="">Num Int:</label>
                                <input type="text" name="numint" class="form-control ">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="">Codigo Postal:</label>
                                <input type="text" pattern="[0-9]{5}" title="Introduzca un codigo postal valido"name="codpostal" class="form-control "required>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label class="">Colonia:</label>
                                <input type="text" name="colonia"class="form-control"required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="">Nombre de contacto:</label>
                                <input type="text" name="contacto" class="form-control"required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="">Telefono:</label>
                                <input type="text" name="telefono" class="form-control"required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="">Celular:</label>
                                <input type="text" name="celular" pattern="[0-9]{10}" title="Introduzca un celular valido"class="form-control"required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="">Correo:</label>
                                <input type="email" name="correo" class="form-control"required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-3">
                        <a href="javascript:history.back(-1);" class="btn btn-lg btn-primary" title="Ir la página anterior">Cancelar</a>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-3">
                            <button  class="btn btn-lg btn-primary" type="submit">Guardar</button>
                        </div>

                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php
    require('footer.html');
    ?>
</body>

</html>