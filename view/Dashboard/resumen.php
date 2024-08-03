<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen</title>

    <link href="../../config/css/resumen.css" rel="stylesheet" >
    <link href="../../config/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="../../config/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="../../config/fontawesome/css/solid.css" rel="stylesheet" />

    <script src="../../config/js/ajax.js"></script>
    <script src="../../config/js/resumen.js"></script>

</head>
<body>

    <div class="container-all">

        <div class="container-descktop">

            <div class="menu-nav">
                <button id="btn-menu-home" type="button" class="menu-btn-dark menu-btn menu-btn-active">Home</button>
                <button id="btn-menu-finance" type="button" class="menu-btn-dark menu-btn">Finanzas</button>
            </div>

            <div class="title-summary-active">
                <h1 id="title-summary-id" class="title-summary"></h1>
            </div>

            <div class="month-buttons">
                <input type="hidden" id="month-btn-active">
                <button type="button" id="btn-ene" class="month-btn btn-clear">ENE</button>
                <button type="button" id="btn-feb" class="month-btn btn-dark">FEB</button>
                <button type="button" id="btn-mar" class="month-btn btn-clear">MAR</button>
                <button type="button" id="btn-abr" class="month-btn btn-dark">ABR</button>
                <button type="button" id="btn-may" class="month-btn btn-clear">MAY</button>
                <button type="button" id="btn-jun" class="month-btn btn-dark">JUN</button>
                <button type="button" id="btn-jul" class="month-btn btn-clear">JUL</button>
                <button type="button" id="btn-ago" class="month-btn btn-dark">AGO</button>
                <button type="button" id="btn-sep" class="month-btn btn-clear">SEP</button>
                <button type="button" id="btn-oct" class="month-btn btn-dark">OCT</button>
                <button type="button" id="btn-nov" class="month-btn btn-clear">NOV</button>
                <button type="button" id="btn-dic" class="month-btn btn-dark">DIC</button>
            </div>
            
            <div class="seleccions-year-bank">
                <select id="anios" class="select-anios"> </select>
                <select name="" id="bank" class="select-bank">
                    <option value="Itau">Itau</option>
                    <option value="Estado">Estado</option>
                </select>
                <button type="button" id="btn-reload-summary" class="reload-btn btn-dark-reload">ACTUALIZAR <i class="fa-solid fa-arrows-rotate"></i></button>
            </div>

            <div class="summarys">
                <div class="summary-card summary-income">
                    <a href="#" class="value-summary value-income" id="id-expenses">$900000</a> <i class="fa-solid fa-arrow-up value-income"></i>
                    <p class="desc-summary desc-income">Ingresos</p>
                </div>
                <div class="summary-card summary-expenses">
                    <a href="#" class="value-summary value-expenses" id="id-expenses">$600000</a> <i class="fa-solid fa-arrow-down value-expenses"></i>
                    <p class="desc-summary desc-expenses">Egresos</p>
                </div>
                <div class="summary-card summary-rest">
                    <a href="#" class="value-summary value-rest" id="id-expenses">$300000</a> <i class="fa-solid fa-wallet value-rest"></i>
                    <p class="desc-summary desc-rest">Resto</p>
                </div>
            </div>

            <div class="bank-accounts">
                <!-- <div class="title-accounts-div"><h3 class="title-acounts">Cuentas Bancarias</h3></div> -->
                <div class="table-accounts-div">
                    <table class="table-accounts" cellspacing="0">
                        <thead>
                        <tr>
                                <th colspan="5">Cuentas Bancarias</th>
                            </tr>
                            <tr>
                                <th>Banco</th>
                                <th>Tipo Cuenta</th>
                                <th>Saldo</th>
                                <th>Prioridad</th>
                                <th>Opc</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Itau</td>
                                <td>Corriente</td>
                                <td>300000</td>
                                <td>Si</td>
                                <td><button type="button" class="detail-btn" id="detail-btn-id"><i class="fa-solid fa-circle-info"></i></button></td>
                            </tr>
                            <tr>
                                <td>Estado</td>
                                <td>Rut/vista</td>
                                <td>30000</td>
                                <td>No</td>
                                <td><button type="button" class="detail-btn" id="detail-btn-id"><i class="fa-solid fa-circle-info"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="div-comments-alerts">
                <div class="card-all card-comments">
                    <div class="title-comments"><h6>Comentarios</h6> <i class="fa-solid fa-comment"></i></div>
                    <div class="comments"> </div>
                </div>
                <div class="card-all card-alerts">
                    <div class="title-alerts"><h6>Alertas</h6> <i class="fa-solid fa-triangle-exclamation"></i></div>
                    <div class="alerts"> </div>
                </div>
            </div>

        </div>

    </div>

</body>
</html>