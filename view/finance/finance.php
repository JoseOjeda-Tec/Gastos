<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finanzas</title>

    <link href="../../config/css/finance.css" rel="stylesheet" >
    <link href="../../config/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="../../config/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="../../config/fontawesome/css/solid.css" rel="stylesheet" />

    <script src="../../config/js/ajax.js"></script>
    <script src="../../config/js/static-pays.js"></script>
    <script src="../../config/js/finance.js"></script>

</head>
<body>

    <div class="container-all">

        <div class="container-descktop">

            <div class="menu-nav">
                <button id="btn-menu-home" type="button" class="menu-btn-dark menu-btn">Home</button>
                <button id="btn-menu-finance" type="button" class="menu-btn-dark menu-btn menu-btn-active">Finanzas</button>
            </div>

            <div class="title-finance-active">
                <h1 id="title-finace-id" class="title-finance">Finanzas generales</h1>
            </div>

            <div class="finance-type-buttons">
                <input type="hidden" id="type-btn-active">
                <button type="button" id="btn-grl" class="type-btn btn-clear">Finanzas Generales</button>
                <button type="button" id="btn-dtl" class="type-btn btn-dark">Finanzas Detalladas</button>
                <button type="button" id="btn-pgs" class="type-btn btn-clear">Pagos Fijos</button>
                <button type="button" id="btn-gst" class="type-btn btn-dark">Registro Gastos</button>
                <button type="button" id="btn-ing" class="type-btn btn-clear">Registro Ingresos</button>
            </div>


            <div class="contenedor-combio">

                

            </div>

        </div>

    </div>

</body>
</html>