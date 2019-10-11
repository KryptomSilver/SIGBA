<?php 
    $i = $_GET['i'];
    switch ($i):
        case 1:
        $nombre = $_POST['nombre'];
        $medida = $_POST['medida'];
        require('conexion.php');
        $sql = "CALL sp_AgregarArticulo('".$nombre."','".$medida."');";

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
            <a type="button" href="../articulos.php" class="btn btn-primary">Aceptar</a>
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
        case 2:
        $id = $_GET['id'];
        require('conexion.php');
        $sql = "CALL sp_EliminarArticulo('".$id."');";
        
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
            <a type="button" href="../articulos.php" class="btn btn-primary">Aceptar</a>
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
        $nombre = $_POST['nombre'];
        $medida = $_POST['medida'];
        require('conexion.php');
        $sql = "CALL sp_EditarArticulo('".$id."','".$nombre."','".$medida."');";

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
            <a type="button" href="../articulos.php" class="btn btn-primary">Aceptar</a>
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

