<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/logo.webp" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <link rel="shortcut icon" href="img/logo.webp" type="image/x-icon">
    <title>SIGBA</title>
</head>


<body>
    <div>
        <h1 class="titulo"><span><img src="../img/logo.webp" class="logo"></span>BANCO DE ALIMENTOS DE COLIMA</h1>
    </div>
    <?php
    require('header.html');
    ?>
   
    <br>
    <main>
        <section>
            <div class="formulario z">
                <h1 class="titulo">Proveedores</h1>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-12">
                            <select name="" id="" hidden>
                                <option value="">Provedores</option>
                                <option value="">Donadores</option>
                                <option value="">Proyecto</option>
                                <option value="">Banco de Alimentos</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label class="z">Razon social:</label>
                                <input class="form-control z" type="text">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="">RFC:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="">Calle:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="">Num Int:</label>
                                <input type="text" class="form-control ">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="">Num Ext:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-9">
                            <div class="form-group">
                                <label class="">Colonia:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="">Codigo Postal:</label>
                                <input type="text" class="form-control ">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label class="">Nombre de contacto:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="">Telefono:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="">Celular:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="">Correo:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-3">
                            <button class="btn btn-lg btn-primary"type="submit">Cancelar</button>
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