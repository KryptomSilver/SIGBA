
<?php 
    $i = $_GET['i'];
    switch ($i):
        case 1: // agreagar banco de alimentos
        $razon = $_POST['razon'];
        $rfc = $_POST['rfc'];
        $calle = $_POST['calle'];
        $numint = $_POST['numint'];
        $numext = $_POST['numext'];
        $colonia = $_POST['colonia'];
        $codpostal = $_POST['codpostal'];
        $contacto = $_POST['contacto'];
        $telefono = $_POST['telefono'];
        $celular = $_POST['celular'];
        $correo = $_POST['correo'];
        $tipo = 3;
        $recibo = '';
        require('conexion.php');
        $sql = "CALL sp_Registro('".$razon."', '".$rfc."', '".$calle."', '".$numint."', '".$numext."', '".$colonia."', '".$codpostal."', '".$contacto."', '".$telefono."', '".$celular."', '".$correo."','".$recibo."','".$tipo."');";
        $resultado = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($resultado);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="../../Frameworks/Bootstrap/css/bootstrap.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <title></title>
        </head>
        <body>
        <div id="modal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="padding-right: 17px; display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Registro Guardado</h5>
                
            </div>
            <div class="modal-body">
                <p><?php echo $row['msg']?></p>
            </div>
            <div class="modal-footer">
            <a type="button" href="../banco_alimentos.php" class="btn btn-primary">Aceptar</a>
            </div>
            </div>
        </div>
        </div>
        <script>
                $('#modal').modal("show");
        </script>
        </body>
        </html>
        <?php mysqli_close($conn); 
        break;
        ?>
        <?php
        case 2: // ELIMINAR BANCO DE ALIMENTOS
        $id = $_GET['id'];
        require('conexion.php');
        $sql = "CALL sp_EliminarBanco('".$id."');";
        
        $resultado = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($resultado);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="../../Frameworks/Bootstrap/css/bootstrap.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <title></title>
        </head>
        <body>
        <div id="modal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="padding-right: 17px; display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Registro Eliminado</h5>
                
            </div>
            <div class="modal-body">
                <p><?php echo $row['msg']?></p>
            </div>
            <div class="modal-footer">
            <a type="button" href="../banco_alimentos.php" class="btn btn-primary">Aceptar</a>
            </div>
            </div>
        </div>
        </div>
        <script>
                $('#modal').modal("show");
        </script>
        </body>
        </html>
        <?php mysqli_close($conn);
        break;
        ?>  
        <?php  
        case 3:
        $id = $_POST['id'];
        $razon = $_POST['razon'];
        $rfc = $_POST['rfc'];
        $calle = $_POST['calle'];
        $numint = $_POST['numint'];
        $numext = $_POST['numext'];
        $colonia = $_POST['colonia'];
        $codpostal = $_POST['codpostal'];
        $contacto = $_POST['contacto'];
        $telefono = $_POST['telefono'];
        $celular = $_POST['celular'];
        $correo = $_POST['correo'];
        $recibo = '';
        require('conexion.php');
        $sql = "CALL sp_Actualizar('".$id."','".$razon."', '".$rfc."', '".$calle."', '".$numint."', '".$numext."', '".$colonia."', '".$codpostal."', '".$contacto."', '".$telefono."', '".$celular."', '".$correo."','".$recibo."');";
        $resultado = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($resultado);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="../../Frameworks/Bootstrap/css/bootstrap.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <title></title>
        </head>
        <body>
        <div id="modal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="padding-right: 17px; display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Registro Actualizado</h5>
                
            </div>
            <div class="modal-body">
                <p><?php echo $row['msg']?></p>
            </div>
            <div class="modal-footer">
            <a type="button" href="../banco_alimentos.php" class="btn btn-primary">Aceptar</a>
            </div>
            </div>
        </div>
        </div>
        <script>
                $('#modal').modal("show");
        </script>
        </body>
        </html>
        <?php mysqli_close($conn); 
        break;
        ?>
        <?php
        default:
            echo "i no es igual a 0, 1 ni 2";
    endswitch;
    
?>

