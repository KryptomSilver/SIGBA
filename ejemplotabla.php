<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/logo.webp" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="Frameworks/datatables.js" type="text/javascript"></script>
    <link rel="stylesheet" href="Frameworks/datatables.css">
    <link rel="stylesheet" href="Frameworks/Bootstrap/css/bootstrap.css.map">
    <link rel="stylesheet" href="/Frameworks/css/normalize.css">
    <link rel="stylesheet" href="/Frameworks/css/estilo.css">

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
            <div  class="formulario articulos">
            <br>
                <h1 class="titulo">Artículos</h1>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3">
                         <a href="articulosadd.php">Agregar</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Unidad de medida</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                       
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>Nombre</th>
                            <th>Unidad de medida</th>
                        </tr>
                    </tfoot>
                </table>
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
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

</html>