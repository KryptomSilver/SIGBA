<!DOCTYPE html>
<html lang="es">
<?php 
$idpersona = $_GET['idpersona'];
require('procesos/conexion.php');
$sql = " SELECT  * from persona WHERE idpersona = '$idpersona' ";
$resultado = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($resultado);
?>
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
                <form action="procesos/proveedorproceso.php?i=3" method="post">   
                <input type="hidden" name="id" value="<?php echo $idpersona;?>">                 
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label class="">Razon social:</label>
                                <input class="form-control" value="<?php echo $rows['razon_Social'];?>" name="razon" type="text"required>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="">RFC:</label>
                                <input type="text" pattern = "^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$" title = "Introduzca un RFC valido" name="rfc"value="<?php echo $rows['rfc'];?>"class="form-control"required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="">Calle:</label>
                                <input type="text" name="calle" value="<?php echo $rows['calle'];?>" class="form-control"required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="">Num Ext:</label>
                                <input type="text" name="numext" value="<?php echo $rows['num_Exterior'];?>" class="form-control "required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="">Num Int:</label>
                                <input type="text" name="numint" value="<?php echo $rows['num_Interior'];?>" class="form-control"required>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-9">
                            <div class="form-group">
                                <label class="">Colonia:</label>
                                <input type="text" value="<?php echo $rows['colonia'];?>" name="colonia"class="form-control"required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="">Codigo Postal:</label>
                                <input type="text" name="codpostal" value="<?php echo $rows['codPostal'];?>"  class="form-control "required>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label class="">Nombre de contacto:</label>
                                <input type="text" name="contacto" value="<?php echo $rows['nombre_Contacto'];?>" class="form-control"required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="">Telefono:</label>
                                <input type="text" name="telefono" value="<?php echo $rows['telefono'];?>" class="form-control"required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="">Celular:</label>
                                <input type="text" name="celular" value="<?php echo $rows['celular'];?>"class="form-control"required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="">Correo:</label>
                                <input type="text" name="correo" value="<?php echo $rows['correo'];?>" class="form-control"required>
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