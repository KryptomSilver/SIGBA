<?php 
    $i = $_GET['i'];
    switch ($i):

        case 2: // PROVEEDORES
        require('conexion.php');
        $id = $_GET['idpersona'];
        $sql = " SELECT  * from personas WHERE idpersona = $id ";
        $resultado = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($resultado);

        ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../img/logo.webp" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../../Frameworks/css/estilo.css">
    <link rel="shortcut icon" href="../img/logo.webp" type="image/x-icon">
    <title>SIGBA</title>
</head>


<body>
    <div>
        <h1 class="titulo"><span><img src="../../img/logo.webp" class="logo"></span>BANCO DE ALIMENTOS DE COLIMA</h1>
    </div>
    <?php
            require('header.html');
            ?>

    <br>
    <main>
        <section>
            <div class="formulario">
                <h1 class="titulo">Proveedores</h1>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label class="">Razon social:</label>
                            <input class="form-control" value="<?php echo $rows['razon_Social'];?>" name="razon"
                                type="text" disabled>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="">RFC:</label>
                            <input type="text"
                                pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$"
                                title="Introduzca un RFC valido" name="rfc" value="<?php echo $rows['rfc'];?>"
                                class="form-control"disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Calle:</label>
                            <input type="text" disabled name="calle" value="<?php echo $rows['calle'];?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="">Num Ext:</label>
                            <input type="text" disabled name="numext" value="<?php echo $rows['num_Exterior'];?>"
                                class="form-control">

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="">Num Int:</label>
                            <input type="text" disabled name="numint" value="<?php echo $rows['num_Interior'];?>"
                                class="form-control ">

                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label class="">Codigo Postal:</label>
                            <input type="text"disabled name="codpostal" pattern="[0-9]{5}"
                                title="Introduzca un codigo postal valido" value="<?php echo $rows['codPostal'];?>"
                                class="form-control ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Colonia:</label>
                            <input type="text"disabled value="<?php echo $rows['colonia'];?>" name="colonia"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Nombre de contacto:</label>
                            <input type="text"disabled name="contacto" value="<?php echo $rows['nombre_Contacto'];?>"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="">Telefono:</label>
                            <input type="text" disabled name="telefono" value="<?php echo $rows['telefono'];?>"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="">Celular:</label>
                            <input type="text"disabled name="celular" pattern="[0-9]{10}" title="Introduzca un celular valido"
                                value="<?php echo $rows['celular'];?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="">Correo:</label>
                            <input type="email"disabled name="correo" value="<?php echo $rows['correo'];?>"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-3"> </div>
                    <div class="col-2"></div>
                    <div class="col-3">
                        <a href="javascript:history.back(-1);" class="btn btn-lg btn-primary"
                            title="Ir la página anterior">Regresar</a>

                    </div>

                </div>
            </div>
        </section>
    </main>
    <?php
            require('footer.html');
            ?>
</body>

</html>
<?php mysqli_close($conn);
        break;
        ?>




<?php  
        case 3: //DONADORES
        require('conexion.php');
        $id = $_GET['idpersona'];
        $sql = " SELECT  * from personas WHERE idpersona = $id ";
        $resultado = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($resultado);
        $recibo=$rows['recibo'];
        ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../img/logo.webp" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../../Frameworks/css/estilo.css">
    <link rel="shortcut icon" href="../img/logo.webp" type="image/x-icon">
    <title>SIGBA</title>
</head>


<body>
    <div>
        <h1 class="titulo"><span><img src="../../img/logo.webp" class="logo"></span>BANCO DE ALIMENTOS DE COLIMA</h1>
    </div>
    <?php
            require('header.html');
            ?>

    <br>
    <main>
        <section>
            <div class="formulario">
                <h1 class="titulo">Donadores</h1>
                <div class="row">
                        <div class="col-6">
                            <label class="controls-label">Recibo:</label>
                        </div>
                        <div class="col-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" value="SI" name="recibo"
                                    <?php if($recibo=='SI') print "checked=true"?> type="radio" id="inlineCheckbox1"
                                    disabled>
                                <label class="form-check-label" for="inlineCheckbox1">SI</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" value="NO" name="recibo"
                                    <?php if($recibo=='NO') print "checked=true"?> type="radio" id="inlineCheckbox2"
                                    disabled>
                                <label class="form-check-label" for="inlineCheckbox2">NO</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label class="">Razon social:</label>
                            <input class="form-control" value="<?php echo $rows['razon_Social'];?>" name="razon"
                                type="text" disabled>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="">RFC:</label>
                            <input type="text"
                                pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$"
                                title="Introduzca un RFC valido" name="rfc" value="<?php echo $rows['rfc'];?>"
                                class="form-control"disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Calle:</label>
                            <input type="text" disabled name="calle" value="<?php echo $rows['calle'];?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="">Num Ext:</label>
                            <input type="text" disabled name="numext" value="<?php echo $rows['num_Exterior'];?>"
                                class="form-control">

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="">Num Int:</label>
                            <input type="text" disabled name="numint" value="<?php echo $rows['num_Interior'];?>"
                                class="form-control ">

                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label class="">Codigo Postal:</label>
                            <input type="text"disabled name="codpostal" pattern="[0-9]{5}"
                                title="Introduzca un codigo postal valido" value="<?php echo $rows['codPostal'];?>"
                                class="form-control ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Colonia:</label>
                            <input type="text"disabled value="<?php echo $rows['colonia'];?>" name="colonia"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Nombre de contacto:</label>
                            <input type="text"disabled name="contacto" value="<?php echo $rows['nombre_Contacto'];?>"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="">Telefono:</label>
                            <input type="text" disabled name="telefono" value="<?php echo $rows['telefono'];?>"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="">Celular:</label>
                            <input type="text"disabled name="celular" pattern="[0-9]{10}" title="Introduzca un celular valido"
                                value="<?php echo $rows['celular'];?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="">Correo:</label>
                            <input type="email"disabled name="correo" value="<?php echo $rows['correo'];?>"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-3"> </div>
                    <div class="col-2"></div>
                    <div class="col-3">
                        <a href="javascript:history.back(-1);" class="btn btn-lg btn-primary"
                            title="Ir la página anterior">Regresar</a>

                    </div>

                </div>
            </div>
        </section>
    </main>
    <?php
            require('footer.html');
            ?>
</body>

</html>
<?php mysqli_close($conn); 
        break;
        ?>


<?php  
        case 4: //BANCO DE ALIMENTOS
        require('conexion.php');
        $id = $_GET['idpersona'];
        $sql = " SELECT  * from personas WHERE idpersona = $id ";
        $resultado = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($resultado);
        ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../img/logo.webp" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../../Frameworks/css/estilo.css">
    <link rel="shortcut icon" href="../img/logo.webp" type="image/x-icon">
    <title>SIGBA</title>
</head>


<body>
    <div>
        <h1 class="titulo"><span><img src="../../img/logo.webp" class="logo"></span>BANCO DE ALIMENTOS DE COLIMA</h1>
    </div>
    <?php
            require('header.html');
            ?>

    <br>
    <main>
        <section>
            <div class="formulario">
                <h1 class="titulo">Banco de alimentos</h1>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label class="">Razon social:</label>
                            <input class="form-control" value="<?php echo $rows['razon_Social'];?>" name="razon"
                                type="text" disabled>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="">RFC:</label>
                            <input type="text"
                                pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$"
                                title="Introduzca un RFC valido" name="rfc" value="<?php echo $rows['rfc'];?>"
                                class="form-control"disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Calle:</label>
                            <input type="text" disabled name="calle" value="<?php echo $rows['calle'];?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="">Num Ext:</label>
                            <input type="text" disabled name="numext" value="<?php echo $rows['num_Exterior'];?>"
                                class="form-control">

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="">Num Int:</label>
                            <input type="text" disabled name="numint" value="<?php echo $rows['num_Interior'];?>"
                                class="form-control ">

                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label class="">Codigo Postal:</label>
                            <input type="text"disabled name="codpostal" pattern="[0-9]{5}"
                                title="Introduzca un codigo postal valido" value="<?php echo $rows['codPostal'];?>"
                                class="form-control ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Colonia:</label>
                            <input type="text"disabled value="<?php echo $rows['colonia'];?>" name="colonia"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Nombre de contacto:</label>
                            <input type="text"disabled name="contacto" value="<?php echo $rows['nombre_Contacto'];?>"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="">Telefono:</label>
                            <input type="text" disabled name="telefono" value="<?php echo $rows['telefono'];?>"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="">Celular:</label>
                            <input type="text"disabled name="celular" pattern="[0-9]{10}" title="Introduzca un celular valido"
                                value="<?php echo $rows['celular'];?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="">Correo:</label>
                            <input type="email"disabled name="correo" value="<?php echo $rows['correo'];?>"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-3"> </div>
                    <div class="col-2"></div>
                    <div class="col-3">
                        <a href="javascript:history.back(-1);" class="btn btn-lg btn-primary"
                            title="Ir la página anterior">Regresar</a>

                    </div>

                </div>
            </div>
        </section>
    </main>
    <?php
            require('footer.html');
            ?>
</body>

</html>
<?php mysqli_close($conn); 
        break;
        ?>

<?php  
        case 5: //PROYECTOS
                require('conexion.php');
        $id = $_GET['idpersona'];
        $sql = " SELECT  * from personas WHERE idpersona = $id ";
        $resultado = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($resultado);
        ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../img/logo.webp" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../../Frameworks/css/estilo.css">
    <link rel="shortcut icon" href="../img/logo.webp" type="image/x-icon">
    <title>SIGBA</title>
</head>


<body>
    <div>
        <h1 class="titulo"><span><img src="../../img/logo.webp" class="logo"></span>BANCO DE ALIMENTOS DE COLIMA</h1>
    </div>
    <?php
            require('header.html');
            ?>

    <br>
    <main>
        <section>
            <div class="formulario">
                <h1 class="titulo">Proyectos</h1>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label class="">Razon social:</label>
                            <input class="form-control" value="<?php echo $rows['razon_Social'];?>" name="razon"
                                type="text" disabled>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="">RFC:</label>
                            <input type="text"
                                pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$"
                                title="Introduzca un RFC valido" name="rfc" value="<?php echo $rows['rfc'];?>"
                                class="form-control"disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Calle:</label>
                            <input type="text" disabled name="calle" value="<?php echo $rows['calle'];?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="">Num Ext:</label>
                            <input type="text" disabled name="numext" value="<?php echo $rows['num_Exterior'];?>"
                                class="form-control">

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="">Num Int:</label>
                            <input type="text" disabled name="numint" value="<?php echo $rows['num_Interior'];?>"
                                class="form-control ">

                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label class="">Codigo Postal:</label>
                            <input type="text"disabled name="codpostal" pattern="[0-9]{5}"
                                title="Introduzca un codigo postal valido" value="<?php echo $rows['codPostal'];?>"
                                class="form-control ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Colonia:</label>
                            <input type="text"disabled value="<?php echo $rows['colonia'];?>" name="colonia"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">Nombre de contacto:</label>
                            <input type="text"disabled name="contacto" value="<?php echo $rows['nombre_Contacto'];?>"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="">Telefono:</label>
                            <input type="text" disabled name="telefono" value="<?php echo $rows['telefono'];?>"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="">Celular:</label>
                            <input type="text"disabled name="celular" pattern="[0-9]{10}" title="Introduzca un celular valido"
                                value="<?php echo $rows['celular'];?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="">Correo:</label>
                            <input type="email"disabled name="correo" value="<?php echo $rows['correo'];?>"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-3"> </div>
                    <div class="col-2"></div>
                    <div class="col-3">
                        <a href="javascript:history.back(-1);" class="btn btn-lg btn-primary"
                            title="Ir la página anterior">Regresar</a>

                    </div>

                </div>
            </div>
        </section>
    </main>
    <?php
            require('footer.html');
            ?>
</body>

</html>

<?php mysqli_close($conn); 
        break;
        ?>
<?php
        default:
            echo "error";
    endswitch;
    
?>