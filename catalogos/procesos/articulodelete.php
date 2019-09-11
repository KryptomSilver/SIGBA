<?php 
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
    <link rel="stylesheet" href="../../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../../Frameworks/Bootstrap/bootstrap.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="../../Frameworks/Bootstrap/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
        
        <button type="button" class="btn btn-lg btn-primary"></button>
      </div>
    </div>
  </div>
</div>
<script>
        $('#modal').modal("show");
</script>
</body>
</html>
<?php mysqli_close($conn);?>


    