<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Frameworks/jQuery/jquery.js"></script>

    <title>Familiares</title>

    <style>
        ul.tabs {
            width: 100%;
            background: #004445;
            list-style: none;
            display: flex;
        }

        .navmenu>ul {
            justify-content: space-around;
        }

        ul.tabs li {
            width: 100%;
            height: 42.5px
        }

        ul.tabs li a {
            color: #fff;
            text-decoration: none;
            font-size: 15px;
            text-align: center;

            display: block;
            padding: 10px 0px;
        }

        .active {
            background: #2C7873;
        }

        ul.tabs li a .tab-text {
            margin-left: 8px;
        }

        .secciones {
            width: 100%;
            background: #fff;
        }
    </style>
</head>
<script>
    $(document).ready(function () {
        $('.secciones .hide').hide();
        $('ul.tabs li a:first').addClass('active');

        $('.secciones .hide:first').show();

        $('ul.tabs li a').click(function () {
            $('ul.tabs li a').removeClass('active');
            $(this).addClass('active');
            $('.secciones .hide').hide();

            var activeTab = $(this).attr('href');
            $(activeTab).show();
            return false;
        });
    });
</script>

<body>
    <?php 
        require('header.html');
    ?>
    <br>
    <h1 class="titulo">Familias</h1>
    <br>
    <form action="" id="familia">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="navmenu">
                        <ul class="tabs">
                            <li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Datos
                                        generales</span></a>
                            </li>
                            <li><a href="#tab2"><span class="fa fa-group"></span><span
                                        class="tab-text">Vivienda</span></a>
                            </li>
                            <li><a href="#tab3"><span class="fa fa-briefcase"></span><span class="tab-text">Ingresos
                                        familiares</span></a></li>
                            <li><a href="#tab4"><span class="fa fa-bookmark"></span><span class="tab-text">Egresos
                                        familiares</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="secciones">
                <!-- datos generales-->
                <div class="hide" id="tab1">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Municipio:</label>
                                <select name="" id="" class="form-control" required>
                                    <option value="">1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Colonia:</label>
                                <select name="" id="" class="form-control" required>
                                    <option value="">1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="">Calle:</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Nº exterior:</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Nº interior:</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Calles colindante 1:</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Calles colindante 1:</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="">Teléfono:</label>
                                <input type="text" class="form-control" required>
                            </div>

                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Nº integrantes:</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Ingreso total familiar:</label>
                                <input type="text" class="form-control" placeholder="$" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- vivienda --->
                <div class="hide" id="tab2">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Tenencia:</label>
                                <select name="" id="" class="form-control" required>
                                    <option value="">Propia</option>
                                    <option value="">Prestada</option>
                                    <option value="">Pagándose</option>
                                    <option value="">Rentada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Nº Cuartos</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Nº Familias Habitándola</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hide" id="tab3">
                    <!-- ingresos familiares -->
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Padre:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Madre:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Hijos:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Becas:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Pensión:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Otros:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Adultos mayores:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Total semanal:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Total mensual:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hide" id="tab4">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Vivienda:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Alimentación:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Luz:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Gas:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Agua:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Alimentación medica:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Teléfono:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Transporte:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Otros gastos:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Celular:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Educación:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Total semanal:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Total mensual:</label>
                                <input type="text" placeholder="$" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-3">
                            <a href="familiaslista.php" class="btn btn-lg btn-primary"
                                title="Ir la página anterior">Cancelar</a>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-3">
                            <!--<button class="btn btn-lg btn-primary" type="submit">Guardar</button>-->
                            <a class="btn btn-lg btn-primary" href="integrantes.php">Guardar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    require('footer.html');
    ?>
</body>


</html>