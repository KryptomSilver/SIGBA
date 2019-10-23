<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/logo.webp" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/datatables.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
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
            <div class="formulario articulos">
                <h1 class="titulo">Artículos</h1>
                    <div class="row">
                        <div class="col-12">
                            <input type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="">Nombre:</label>
                                <input name="nombre" id="nombre"class="form-control" type="text" required>
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-3">
                            <div class="form-group">
                                <a href="javascript:history.back(-1);" class="btn btn-lg btn-primary"
                                    title="Ir la página anterior">Cancelar</a>
                            </div>
                        </div>
                        <p id="resultado"></p>
                        <div class="col-2"></div>
                        <div class="col-3">
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary" type="submit" onclick="ajax_post();">Guardar</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php
    require('footer.html');
    ?>
    
    <script type="text/javascript">
        var resultado = document.getElementById("resultado");

        function ajax_post() {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            var nombre = document.getElementById("nombre").value;
            var infoss = "nombre="+nombre;
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var mensaje = xmlhttp.responseText;
                    resultado.innerHTML = mensaje;
                }
            };
            xmlhttp.open("POST", "proceso.php", true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded")
            xmlhttp.send(infoss);
        }
    </script>
</body>

</html>