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
    <br>
    <main>
        <section>
            <div class="formulario">
                <h1 class="titulo">Proveedores</h1>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-12">
                            <select name="" id="" hidden>
                                <option value="">Provedore</option>
                                <option value="">Donadore</option>
                                <option value="">Proyecto</option>
                                <option value="">Banco de Alimentos</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <label class="controls-label">Razon social:</label>
                            <input class="controls " type="text">
                        </div>

                        <div class="col-4">
                            <label class="controls-label">RFC:</label>
                            <input type="text" class="controls">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="controls-label">Calle:</label>
                            <input type="text" class="controls">
                        </div>
                        <div class="col-3">
                            <label class="controls-label">Num Int:</label>
                            <input type="text" class="controls ">
                        </div>
                        <div class="col-3">
                            <label class="controls-label">Num Ext:</label>
                            <input type="text" class="controls">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-9">
                            <label class="controls-label">Colonia:</label>
                            <input type="text" class="controls">
                        </div>
                        <div class="col-3">
                            <label class="controls-label">Codigo Postal:</label>
                            <input type="text" class="controls ">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12">
                            <label class="controls-label">Nombre de contacto:</label>
                            <input type="text" class="controls">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="controls-label">Telefono:</label>
                            <input type="text" class="controls">
                        </div>
                        <div class="col-6">
                            <label class="controls-label">Celular:</label>
                            <input type="text" class="controls">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="controls-label">Correo:</label>
                            <input type="text" class="controls">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-3">
                            <button type="submit">Cancelar</button>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-3">
                            <button type="submit">Guardar</button>
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